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
    <title>Sign-Up Teacher</title>
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
		if (isset($_SESSION["loggedIn"]))
			include("nav2.php");
		else
		include("nav1.php");
		?>
  
  	<div class="lead text-center"> <center>Teacher Registration</center></div>
		<form action="teacher_insert.php"  enctype="multipart/form-data"onsubmit="return validate()" method="post">
	    <div class="vertical-center" >
		<div class=" container well  col-lg-7" >
		<div style="text-align:left">
	      <label>Full Name: </label>
		<input type="text"  class="form-control" placeholder="Enter Your Name" name="name" required autofocus data-validation-required-message="Please enter only alphabets">
		 <label>Username: </label>
		<input type="text"  class="form-control" placeholder="username" name="username" required autofocus>

		<label>Email :</label>
		<input class="form-control" type="email" name="email" placeholder="Enter your Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"required data-validation-required-message="Please enter your email.">	
		<label>Address:</label>
		<textarea class="form-control" rows="2" name="address" placeholder="Enter your Address" required data-validation-required-message="Please enter your address."></textarea>		
		
		<label>Mobile No: </label>
		<input type="text"  class="form-control" placeholder="Mobile Number" name="mob" required autofocus data-validation-required-message="Enter 10-digitt Mobile no." pattern="[0-9]{10}">
		<label>Date of Birth: </label>
		<input type="date"  class="form-control" placeholder="DD-MM-YYYY" name="bday" required autofocus data-validation-required-message="Enter correct date of birth" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}">
		
		
		<label>Profile Image : </label>

		<input type="file"  onchange="document.uploadattachments.submit();" accept=".jpg" id="pic" name="pic" required autofocus>
		<br>	
	    <label>Qualification: </label>
		<input type="text" class="form-control" placeholder="Your Qualification" name="qualification" required autofocus>
		<label>Experience: </label>
		<input type="text" class="form-control" placeholder="Enter your experience in year" name="experience" pattern="[0-9]{02}" required autofocus>
		
		<label>Subject 1: </label>
		<input type="text" class="form-control"  placeholder="Enter your subject name" name="sub1" required autofocus>
		<label>Subject 2: </label>
		<input type="text" class="form-control" value="" placeholder="Enter your subject name" name="sub2"  autofocus>
		<label>Subject 3: </label>
		<input type="text" class="form-control" value=""placeholder="Enter your subject name" name="sub3" autofocus>
		<label>Subject 4: </label>
		<input type="text" class="form-control" value=""placeholder="Enter your subject name" name="sub4" autofocus>
		<label>Subject 5: </label>
		<input type="text" class="form-control" value="" placeholder="Enter your subject name" name="sub5" autofocus>
		
		<label>Password : </label>
		<input type="password" id="pass1" class="form-control" placeholder="Password" name="pass" required autofocus>
		<label>Confirm Password : </label>
		<input type="password"  id="pass2" class="form-control" placeholder="Enter your Password again" name="c_pass" required autofocus>
		
		<br>
		<center><button type=submit name="submit" value="submit" style="width:190px; height:42px" class="btn btn-lg btn-primary"> Sign-Up </button></center>

		</div>
		</div>
		</div>
		</form>
		

		<?php
		include("footer.php");
		?>
		

<script>
	function validate() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        //alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "#E34234";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    return ok;
}
</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js">"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>