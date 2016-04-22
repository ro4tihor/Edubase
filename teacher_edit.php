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
    <title>Edit Profile Teacher</title>
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
	include("nav2.php");
	?>
		
  	<?php
		$connection = new MongoClient();
        $db = $connection->selectDB('test1');
        $coll= $db->collection;

		$res = $coll->findOne(array('teacher.username' =>$_SESSION['username']));
		
		$name=$res['teacher']['name'];
		$dob=$res['teacher']['DOB'];
		$address=$res['teacher']['address'];
		$email=$res['teacher']['email'];
		$mob=$res['teacher']['mobile'];
		$qualification=$res['teacher']['qualification'];
		$experience=$res['teacher']['experience'];
		
		?>
		
  	<div class="lead text-center"> <center>Edit Profile Details</center></div>
		<form action="teacher_replace.php"  method="post">
	    <div class="vertical-center" >
		<div class=" container well  col-lg-7" >
		<div style="text-align:left">
		 <label>Full Name: </label>
		<input type="text"  class="form-control" placeholder="Enter Your Name" value="<?php echo $name;?>" value ="rohit" name="name" required autofocus data-validation-required-message="Please enter only alphabets">
		 <label>Username: </label>
		<input type="text"  class="form-control" placeholder="username" name="username" value="<?php echo $_SESSION['username'];?>" required autofocus>

		<label>Email :</label>
		<input class="form-control" type="email" name="email" placeholder="Enter your Email" " value="<?php echo $email;?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"required data-validation-required-message="Please enter your email.">	
	
		<label>Profile Image : </label>

		<input type="file"  onchange="document.uploadattachments.submit();" id="pic" name="pic" autofocus>
		<br>	
		<label>Mobile No: </label>
		<input type="text"  class="form-control" placeholder="Mobile Number" name="mob" value="<?php echo $mob;?>" required autofocus data-validation-required-message="Enter 10-digitt Mobile no." pattern="[0-9]{10}">
		<label>Date of Birth: </label>
		<input type="date"  class="form-control" placeholder="DD-MM-YYYY" name="bday" value="<?php echo $dob;?>" required autofocus data-validation-required-message="Enter correct date of birth" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
		
	    <h4>Qualification: </h4>
		<input type="text" class="form-control" placeholder="Your Qualification" value="<?php echo $qualification;?>" name="qualification" required autofocus>
		<h4>Experiecne: </h4>
		<input type="text" class="form-control" placeholder="Your Qualification" value="<?php echo $experience;?>" name="experience" pattern="[0-9]{2}" required autofocus>
		
		<br>
		<center><button type=submit name="submit" value="submit" style="width:190px; height:42px" class="btn btn-lg btn-primary"> Sign-Up </button></center>

		</div>
		</div>
		</div>
		</form>
		
		<?php
		include("footer.php");
		?>
		
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js">"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>