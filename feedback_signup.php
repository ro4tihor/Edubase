
<?php
session_start();
if ($_SESSION["loggedIn"]!=1) {
    header("location:login.php");
}

$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;
if($_SESSION['role']=="teacher")
header("location:feedback_display.php");
if(!isset($_SESSION['temp']))
header("location:feedback_selection.php");
$res = $coll->findOne(array('teacher.username' =>$_SESSION['temp']));
unset($_SESSION['temp']);
$res1 = $coll->findOne(array('student.username' =>$_SESSION['username']));
$a=count($res['teacher']['subjects']);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Give Feedback </title>
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
		<div class="vertical-center">
		<div class="container well col-lg-6">
		<form action="feedback_insert.php" method="post">
		<label>Teacher Name :</label>
		<div class="form-control"><?php echo $res['teacher']['name'];?></div>
		<input type="hidden" class="form-control" placeholder="Teacher Name" name="tn" value="<?php echo $res['teacher']['name'];?>">
	
		
		<label>Student Name:</label>
		<div class="form-control"><?php echo $res1['student']['name'];?></div>
			<label>Subject :</label>
		<select class="form-control" name="subject" >
                   <?php
				   $i=0;
				   while($i<$a)
				   {
				   echo "<option>".$res['teacher']['subjects'][$i]."</option>";
				   $i++;
				   }
				   ?>
               </select>
		<input type="hidden" class="form-control" name="sn" placeholder="Student Name" value="<?php echo $res1['student']['name'];?>">
		<label>Feedback:</label>
		<textarea class="form-control" placeholder="Enter your message" name="feedback" required autofocus></textarea>
		<label>Teaching skill :</label>
		<select class="form-control" name="ts" >
		<?php
				   $i=10;
				   while($i>0)
				   {
					   if($i==7)
						    echo "<option selected>".$i."</option>";
						else
				   echo "<option>".$i."</option>";
				   $i--;
				   }
		?>
		</select>
		
		<label>Understanding level:</label>
		<select class="form-control" name="ul" >
		<?php
				   $i=10;
				   while($i>0)
				   {
					   if($i==7)
						    echo "<option selected>".$i."</option>";
						else
				   echo "<option>".$i."</option>";
				   $i--;
				   }
		?>
		</select>
		
		<label>Content Delivery:</label>
		<select class="form-control" name="cd" >
		<?php
				   $i=10;
				   while($i>0)
				   {
					   if($i==7)
						    echo "<option selected>".$i."</option>";
						else
				   echo "<option>".$i."</option>";
				   $i--;
				   }
		?>
		</select>
		
		<input type="hidden" name="t_username" value="<?php echo $res['teacher']['username'];?>">
		<input type="hidden" name="course" value="<?php echo $res1['student']['course'];?>">
		<input type="hidden" name="course_year" value="<?php echo $res1['student']['course_year'];?>">
		<input type="hidden" name="rollno" value="<?php echo $res1['student']['rollno'];?>">
		<br>
		<button type=submit name="submit" value="submit" class="btn btn-primary btn-block"> Send Feedback</button>
		<button type=button onclick="location.href='feedback_selection.php' " class="btn btn-success btn-block">Give another feedback</button>
		</form>
		</div>
		</div>
		
		
		
	<?php
	include("footer.php");
	?>
	

	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js">"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>