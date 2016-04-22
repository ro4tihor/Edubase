<?php
session_start();
if ($_SESSION["loggedIn"]!=1) {
    header("location:login.php");
}
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Discussion</title>
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
	if($_SESSION['role']=="student"){
	$ops = array(array('$project'=>array("discussion"=>1,"_id"=>1)),
	array('$match'=>array("discussion.s_username"=>$_SESSION['username']))
	,array('$sort'=>array("discussion.timestamp.date"=>-1)));
			$res=$coll->aggregateCursor($ops);
	}	
		else
		{
			$ops = array(array('$project'=>array("discussion"=>1,"_id"=>1)),
	array('$match'=>array("discussion.t_username"=>$_SESSION['username']))
	,array('$sort'=>array("discussion.timestamp.date"=>-1)));
			$res=$coll->aggregateCursor($ops);			
		}			
	
	?>
		<br>
	<div class="row">
		<div class=" container well col-lg-offset-1 col-lg-10" >
		<div class="row">
		<div class="col-lg-6">
		 <div class="lead "> Recent Discussion :</div></div>
		 <div class="col-lg-5">
			<?php if($_SESSION['role']=="student"){?>
			<button type=submit onclick="location.href='d_selection.php'" class="pull-right btn btn-primary">Create new thread</button>
			<?php } ?>
			</div>
			</div>
		<hr class="divider">
		<div class="row">
		<div class="col-lg-1"><center><h4>No.</h4></center></div>
		<div class="col-lg-3"><h4>Question Title</h4></div>
		<div class="col-lg-2"><h4>Student Name</h4></div>
		<div class="col-lg-2"><h4>Roll no.</h4></div>
		<div class="col-lg-2"><h4>Open thread</h4></div>
			<div class="col-lg-2"><h4>Delete thread</h4></div>
		</div>
		
		<?php
		$i=1;
		foreach($res as $value)
		{
		if(isset($value['discussion']['qh']))
		{
		?>
		<hr class="divider">
		<div class="row">
		<div class="col-lg-1"><center><label><?php echo $i;?></label></center></div>
		<div class="col-lg-3"><label><?php echo "' ".$value['discussion']['qh']."  '";?></label></div>
		<div class="col-lg-2"><label><?php echo $value['discussion']['student_name'];?></label></div>
		<div class="col-lg-2"><label><?php echo $value['discussion']['rollno'];?></label></div>
		<form action="thread.php" method="get"><div class="col-lg-2"><button type=submit name="id" value="<?php echo $value['_id'];?>"class="btn btn-primary"> Open thread </button></div></form>
		<form action="delete_thread.php" method="get"><div class="col-lg-2"><button type=submit name="id" value="<?php echo $value['_id'];?>"class="btn btn-danger"> Delete thread </button></div></form>
		</div>
		<?php
		$i++;
		}}
		?>
		
		</div>
		</div>

<footer>
	<div class="nav navbar navbar-fixed-bottom" style="background-color:#f5f5f5;padding:4px;border-radius: 5px;margin-top:23px">
	<p></p>
        <div class="container" >
            <div class="row">
               <div class="col-lg-4">
                    <ul class="list-inline">
                        <li>
                            <a href="Dashboard.php" ><strong>Home</strong></a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="aboutus.php"><strong>About</strong></a>
                        </li>
                      
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="contactus.php"><strong>Contact</strong></a>
                        </li>
                    </ul>
                    <p class="copyright text-muted ">Copyright &copy; EduBase 2015, All Rights Reserved</p>
                </div>
	
				<div class="col-lg-4  text-center">
                    <i class="fa fa-phone fa-2x wow bounceIn" data-wow-delay=".1s"></i>
                    <p>8237374249</p>
                </div>
				
				<div class="col-lg-4 text-center float:right">
                    <i class="fa fa-envelope-o fa-2x wow bounceIn" data-wow-delay=".1s"></i>
                    <p>contactus@edubase.com</p>
                </div>
				</div>
            
        </div>
    </footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js">"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>