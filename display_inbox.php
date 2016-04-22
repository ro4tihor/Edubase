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
    <title>View Inbox</title>
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
	$connection = new MongoClient();
	$db = $connection->selectDB('test1');
	$coll= $db->collection;
	?>
	
      <br>
	
	    <div class="vertical-center" >
		<div class=" container well col-lg-8" >
		 <div class="lead text-center"> <center>Inbox :</center></div>

		<div style="tex	t-align:left">
			<?php
			if($_SESSION['role']=="student")
			{
			$ops = array(array('$match'=>array("student.username"=>$_SESSION['username'])),array('$unwind'=>'$student.inbox'));
			$res=$coll->aggregateCursor($ops);
			}
			else
			{
			$ops = array(array('$match'=>array("teacher.username"=>$_SESSION['username'])),array('$unwind'=>'$teacher.inbox'));
			$res=$coll->aggregateCursor($ops);	
			}
			
			foreach($res as $value)
			{
			?>
			<p></p>
				<hr class="divider">
				
                <div class="col-lg-10 col-lg-offset-1">
                        <div class="col-lg-12">
							<label>From :</label>
							<?php if($_SESSION['role']=="student")
								echo $value['student']['inbox']['Sender_name'];
							else
								echo $value['teacher']['inbox']['Sender_name'];
								?>
							<br>
							<label>Subject :</label>
							
							<?php if($_SESSION['role']=="student")
								echo $value['student']['inbox']['subject'];
							else
								echo $value['teacher']['inbox']['subject'];
								?>
							<br>
							
							<label>Message :</label>
							
							<?php if($_SESSION['role']=="student")
								echo $value['student']['inbox']['message'];
							else
								echo $value['teacher']['inbox']['message'];
								?>
							</div>
							<div class="text-muted col-lg-offset-9">Timestamp:<br>
							<?php if($_SESSION['role']=="student")
								echo $value['student']['inbox']['timestamp']['date'];
							else
								echo $value['teacher']['inbox']['timestamp']['date'];
								?>
								
							</div>
						   
						   
                        </div>

			<?php
			}
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