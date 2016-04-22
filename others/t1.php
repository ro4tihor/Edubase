

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>
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
  <style>
  body{
	background-image:url("1.jpg");

}
.vertical-center {
  min-height: 75vh;
  display: flex;
  align-items: center;
}
  </style>
  <body >
	<?php
	include("nav2.php");
	?>
		<div class="container well">
		<form action="t2.php" enctype="multipart/form-data" method="post">
		
			<label>Username: </label>
		<input type="text"  class="form-control" placeholder="username" name="username" autofocus>
		<center><button type=submit name="submit" value="upload" style="width:190px; height:42px" class="btn btn-lg btn-primary"> Sign-Up </button></center>		
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