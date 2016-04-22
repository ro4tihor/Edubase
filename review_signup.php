
<?php
session_start();
if ($_SESSION["loggedIn"]!=1) {
    header("location:login.php");
}

$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

$res2 = $coll->findOne(array('student.username' =>$_SESSION['username']));

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Review Board</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">	
	  <link rel="stylesheet" href="css/custom.css" type="text/css">	

	  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
  </head>
  <body >
	<?php
	include("nav2.php");
	?>
	
		<div class="row">
		<div class=" container well col-lg-offset-1 col-lg-10" >
		<div class="row">
		<div class="col-lg-6">
		 <div class="lead "> Review Messages :</div></div>
		 <div class="col-lg-5">
			<button type=submit onclick="location.href='#id1'" class="pull-right page-scroll btn btn-primary"> Give Review</button></div>
			</div>
		<div style="tex	t-align:left">
			<?php
	
			$res1 = $coll->aggregateCursor(array(array('$project'=>array('review'=>1))));
			foreach($res1 as $res)
			{
			if(isset($res['review']['course_year']) && isset($res['review']['student_name']) && isset($res['review']['course']) && isset($res['review']['timestamp']['date']) && isset($res['review']['subject']) && isset($res['review']['review']))
			{
			?>
			<p></p>
				<hr class="divider">
				<div class="row">
                <div class="col-lg-10 col-lg-offset-1">
				<div class="row">
                  <div class="col-lg-6">
				 
				  <label>From :</label>
				  <?php echo $res['review']['student_name'];?>
				  <div class="col-lg-offset-0"><label>Roll no :</label>
				  
				  <?php  echo $res['review']['rollno'];echo "  (".$res['review']['course_year'].")";?>
					</div>
					<label>Course :</label>
				<?php  echo $res['review']['course'];?>
				  
				<label>Timestamp :</label>
			<?php	echo $res['review']['timestamp']['date'];?>
				  
				  </div>
				<div class="col-lg-6" style="width:50%;">
				<label>Subject :</label>
				<?php echo $res['review']['subject'];?><br>
				<label>review Message:</label>
				
				<p><?php	echo $res['review']['review'];?></p>
				  </div>
						</div>
						
                </div>
            </div>
			<?php
			}}
			?>
			</div>
			</div>
        </div>
	
		<?php
		if($_SESSION['role']=="student")
		{
		?>
		<div id="id1" class="row col-lg-offset-1">
		<div class="container row well col-lg-11">
		<div class="row col-lg-6">
		<form action="review_insert.php" method="post">
		<label>Teacher Name :</label>
		<input type="text" class="form-control" placeholder="Teacher Name" name="tn"s>
		<input type="hidden" class="form-control" name="sn" placeholder="Student Name" value="<?php echo $res2['student']['name'];?>">
		<label>Subject :</label>
		<input type="text" class="form-control" name="subject" placeholder="Subject Name" >
		</div>
		<div class="col-lg-6">
		<label>Review:</label>
		<textarea class="form-control" rows=4 placeholder="Enter your message" name="review" required autofocus></textarea>
		<input type="hidden" name="course" value="<?php echo $res2['student']['course'];?>">
		<input type="hidden" name="course_year" value="<?php echo $res2['student']['course_year'];?>">
		<input type="hidden" name="rollno" value="<?php echo $res2['student']['rollno'];?>">
		<br>
		</div>
		<button type=submit name="submit" value="submit" class="btn btn-primary btn-block"> Send Review</button>
		<!--<button type=button onclick="location.href='feedback_selection.php' " class="btn btn-success btn-block">Give another review</button>-->
		</form>
		</div>
		</div>
		<?php
		}
		?>
		
		
	<?php
	include("footer.php");
	?>
	

	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js">"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>