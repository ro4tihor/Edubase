
<?php
session_start();
if ($_SESSION["loggedIn"]!=1) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Send Message</title>
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
		<form action="send_sms.php" method="post">
		<label>To :</label>
		<input type="text" class="form-control" placeholder="Enter Reciept's correct username" name="reciept" value="<?php if(isset($_SESSION['temp']))echo $_SESSION['temp'];?>" required autofocus>
		<label>Subject :</label>
		<input type="text" class="form-control" placeholder="Enter Subject" name="sub" required autofocus>
		<label>Message	:</label>
		<textarea class="form-control" placeholder="Enter your message" name="message" required autofocus></textarea>
		<br>
		<button type=submit name="submit" value="submit" class="btn btn-primary btn-block"> Send Message</button>
		<button type=button onclick="location.href='contacts.php' " class="btn btn-success btn-block"> Username Directory</button>
		</form>
		</div>
		</div>
		
		
		
	<?php
	include("footer.php");
		unset($_SESSION['temp']);
	?>
	

	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js">"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>