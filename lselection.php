<?php

session_start();
if (isset($_SESSION["loggedIn"]))	 {
    header("location:Dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SignUp Selection</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
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
   include("nav1.php");
   ?>
  

	    <div class="vertical-center col-lg-offset-4" >
		<center><div class=" container " style="width:40%;margin-top:-48px;">
		<div style="text-align:center">
		<a href="student_signup.php">
		<button type=button onclick="student_signup.php" style="width:220px; height:42px" class="btn btn-lg btn-primary"> Student Registration</button></a>
		<br>
		<br>
		<a href="teacher_signup.php"><button type=button  onclick="teacher_signup.php" style="width:220px; height:42px" class="btn btn-lg btn-success"> Teacher Registration</button></a>
		</div>
		</div></center>
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