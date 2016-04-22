<?php
session_start();
if ($_SESSION["loggedIn"]!=1) {
    header("location:login.php");
}
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Review Display</title>
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

	if(isset($_SESSION["loggedIn"]))
	{
    include("nav2.php");
	}
	else
	{include("nav1.php");}
 ?>
	
      
	
	    <div class="vertical-center" >
		<div class=" container well col-lg-9" >
		 <div class="lead text-center"> <center>Review Messages :</center></div>

		<div style="tex	t-align:left">
			<?php
	
			$res1 = $coll->aggregateCursor(array(array('$project'=>array('review'=>1))));
			foreach($res1 as $res)
			{
				if(isset($res['review']['course_year']) && isset($res['review']['student_name']) && isset($res['review']['course']) && isset($res['review']['timestamp']['date']) && isset($res['review']['subject']))
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
		include("footer.php");
		?>

   <!-- <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script> -->
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js">"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>