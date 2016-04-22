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
    <title>Login Page</title>
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
		
		<form action="lcheck.php" method="post">
	    <div class="vertical-center" >
		<div class=" container well  col-lg-offset-4 col-lg-4" >
		<div style="text-align:center">
		<center><h3 class="lead"></h3></center>
		<label>Username : </label>
		<input type="text" size=64 id="inputUname"class="form-control" placeholder="username" name="username" required autofocus>
		<br>
		<label>Password : </label>
		<input type="password" size=64 id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
		<br>
		<br>
		<button type=submit name="submit" value="submit" class="btn btn-primary btn-block"> login </button>
		<button type=button onclick="location.href='lselection.php' " class="btn btn-success btn-block"> sign-up</button>
		
		<br>
		<center>
		<a href="#">forgot password ?</a>
		</center>
		</div>
		</div>
		</div>
		</form>
		
		<?php
		include("footer.php");
		?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>