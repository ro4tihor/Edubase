<?php
session_start();
if ($_SESSION["loggedIn"]!=1) {
    header("location:login.php");
}
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

if($_SESSION['role']=="student")
header("location:feedback_selection.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Feedback</title>
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
		<div class=" container well col-lg-10" >
		 <div class="lead"> Feedback Messages :
		 <span class="pull-right"><button type=button onclick="location.href='analysis.php' " class="btn btn-md btn-success"> Feedback Analysis</button></span>
		 </div>

		<div style="tex	t-align:left">
			<?php
	
			$res1 = $coll->find(array('feedback.t_username' =>$_SESSION['username']));
			$res1->sort(array('feedback.rollno'=>1));
			
			foreach($res1 as $res)
			{
			?>
			<p></p>
				<hr class="divider">
				<div class="row">
                <div class="col-lg-10 col-lg-offset-1">
				<div class="row">
                  <div class="col-lg-6">
				 
				  <label>From :</label>
				  <?php echo $res['feedback']['student_name'];?>
				  <label>Roll no :</label>
				  
				  <?php  echo $res['feedback']['rollno'];echo "  (".$res['feedback']['course_year'].")";?>
					<br>
					
				<label>Teaching Skill <small class="text-muted	"> (out of 10)</small> :</label>
				<?php  echo $res['feedback']['ts'];?><br>
				<label>Content Delivery <small class="text-muted	"> (out of 10)</small> :</label>
				<?php  echo $res['feedback']['cd'];?>
				<br>
				<label>Understanding level <small class="text-muted	"> (out of 10)</small> :</label>
				<?php  echo $res['feedback']['ul'];?><br>
				  
				  </div>
				<div class="col-lg-6" style="width:50%;">
				
				<label>Subject :</label>
				<?php echo $res['feedback']['subject'];?><br>
				<label>Feedback Message:</label>
				
				<p class="text-warning"><?php	echo $res['feedback']['feedback'];?></p>
				<label class="text-muted pull-right">Timestamp :
			<?php	echo $res['feedback']['timestamp']['date'];?></label>
				  </div>
						</div>
						
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