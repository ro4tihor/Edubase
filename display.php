<?php
session_start();
if ($_SESSION["loggedIn"]!=1) {
    header("location:login.php");
}

$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;
		
		$res = $coll->findOne(array('student.username' =>$_SESSION['username']));
		$res1 = $coll->findOne(array('teacher.username' =>$_SESSION['username']));
		
		if($res)
		{
		$name=$res['student']['name'];
		$course=$res['student']['course'];
		$course_year=$res['student']['course_year'];
		$dob=$res['student']['DOB'];
		$address=$res['student']['address'];
		$email=$res['student']['email'];
		$mob=$res['student']['mobile'];
		$rollno=$res['student']['rollno'];
		}
		elseif($res1)
		{
		$name=$res1['teacher']['name'];
		$dob=$res1['teacher']['DOB'];
		$address=$res1['teacher']['address'];
		$email=$res1['teacher']['email'];
		$mob=$res1['teacher']['mobile'];
		$qualification=$res1['teacher']['qualification'];
		$subjects=$res1['teacher']['subjects'];
		$experience=$res1['teacher']['experience'];
		$address=$res1['teacher']['address'];
		}	

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile details</title>
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
	

	
	    <div class="vertical-center" >
		<div class=" container well col-lg-7" >
	  	<div class="lead text-muted col-lg-offset-1">Profile Details :</div>
			<hr class="divider">
		<div style="tex	t-align:left">
		<div class="row">
		<div  class="col-lg-offset-1 col-lg-5">
		
		<h4>Profile Picture</h4>
		<p></p>
		<img src="profile_pic/<?php echo $_SESSION['username'].".jpg";?>" height=" 230" width="200"><br>
		<br><div class="col-lg-offset-2">
		 <h4>Full Name: </h4>
		<?php echo $name;?>
		 <h4>Username: </h4></div>
			<div class="col-lg-offset-3">' <?php echo $_SESSION['username'];?> '</div>
			
		
		</div>
		
		<div class="col-lg-5">
		<?php
		if($_SESSION['role']=='student')
		{
	    echo "<h4>Course: </h4>";
		echo $course;
		echo "<h4>Course Year: </h4>";
		echo $course_year;
		echo "<h4>Roll No: </h4>";
		echo $rollno;
		}
		else{
		echo "<h4>Qualification: </h4>";
	    echo $qualification;	
		echo "<h4>Experience: </h4>";
	    echo $experience;		
		}		
		?>
		<h4>Mobile No: </h4>
		<?php echo $mob;?>
		<h4>Date of Birth: </h4>
		<?php echo $dob;?>
			<h4>Email :</h4>
	<?php echo $email;?>
		
		<h4>Address : </h4>
		<?php echo $address;?>
		<?php
		
		if($_SESSION['role']!='student')
		{
		echo "<h4>Subjects Taught: </h4>";
		$i=0;
		echo "<h5>";
		while($i<count($subjects))
		{
			echo ++$i.".";
			echo $subjects[--$i];
			echo "<br>";
			$i++;
		}
		echo "</h5>";
		}
		?>
		
		</div>
		</div>	
<br>
		</div>
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