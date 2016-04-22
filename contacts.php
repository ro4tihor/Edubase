<?php
session_start();
if ($_SESSION["loggedIn"]!=1) {
    header("location:login.php");
}
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

if(isset($_POST['submit']))
{
	$_SESSION['temp']=$_POST['submit'];
	header("location:send_message.php");
}

?>

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
	<body>
	<?php
	include("nav2.php");
	?>
	<?php
	
	$ops = array(array('$project'=>array("student"=>1)));
			$res=$coll->aggregateCursor($ops);
	$ops1 = array(array('$project'=>array("teacher"=>1)));
			$res1=$coll->aggregateCursor($ops1);
	?>
		
		<div class="vertical-center">
		<div class=" container well col-lg-8">
		<div class="lead "><center>Student Username Directory :</center></div>
		<hr class="divider">
		<div class="row">
		<div class="col-lg-2"><center><h4>No.</h4></center></div>
		<div class="col-lg-4"><h4>Name</h4></div>
		<div class="col-lg-3"><h4>Username</h4></div>
		<div class="col-lg-3"><h4>Send Message</h4></div>
			
		</div>
		
		<?php
		$i=1;
		foreach($res as $value)
		{
		if(isset($value['student']['name']) && isset($value['student']['username']))
		{
		?>
		<hr class="divider">
		<div class="row">
		<div class="col-lg-2"><center><label><?php echo $i;?></label></center></div>
		<div class="col-lg-4"><label><?php echo $value['student']['name'];?></label></div>
		<div class="col-lg-3"><label>	<?php echo "' ".$value['student']['username']." '";?></label></div>
		<form action="<?=$_SERVER["PHP_SELF"]; ?>" method="post"><div class="col-lg-3"><button type=submit name="submit" value="<?php echo $value['student']['username'];?>"class="btn btn-primary"> Send Message </button></div></form>
		</div>
		<?php
		$i++;
		}}
		?>
		<hr class="divider">
		<div class="lead "><center>Teacher Username Directory :</center></div>
		<hr class="divider">
		<div class="row">
		<div class="col-lg-2"><center><h4>No.</h4></center></div>
		<div class="col-lg-4"><h4>Name</h4></div>
		<div class="col-lg-3"><h4>Username</h4></div>
		<div class="col-lg-3"><h4>Send Message</h4></div>
		</div>
		<?php
		$i=1;
		foreach($res1 as $value)
		{
		if(isset($value['teacher']['name']) && isset($value['teacher']['username']))
		{
		?>
		<hr class="divider">
		<div class="row">
		<div class="col-lg-2"><center><label><?php echo $i;?></label></center></div>
		<div class="col-lg-4"><label><?php echo $value['teacher']['name'];?></label></div>
		<div class="col-lg-3"><label>	<?php echo "' ".$value['teacher']['username']." '";?></label></div>
		<form action="<?=$_SERVER["PHP_SELF"]; ?>" method="post"><div class="col-lg-3"><button type=submit name="submit" value="<?php echo $value['teacher']['username'];?>"class="btn btn-primary"> Send Message </button></div></form>
		</div>
		<?php
		$i++;
		}}
		?>
		
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