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
    <title>Discussion thread</title>
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
	$data=array("_id"=>new MongoId($_GET['id']));
	$res1=$coll->findOne($data);
	$ops = array(
			array('$match'=>array("_id"=>new MongoId($_GET['id']))),
			array('$unwind'=>'$discussion.text')
			);
			$res=$coll->aggregateCursor($ops);
	?>
	
      
	
	    <div class="row " >
		<div class=" container col-lg-offset-1 col-lg-10 " >
		<div class="row well">
		 <div class=" col-lg-offset-1"> 
		 <h3>
                    <?php echo $res1['discussion']['qh'];?>
                    <small>with
					<?php echo $res1['discussion']['teacher_name'];?></small>
                </h3>
			Subject : <label><?php echo " ".$res1['discussion']['subject'];?></label>
			<span class="text-muted">by
					<?php echo $res1['discussion']['student_name'];?>
					</span>
					( <?php echo $res1['discussion']['rollno'];?>)
			<div class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span> Posted on<?php echo " ".$res1['discussion']['timestamp']['date'];?></div>
		 </div>
		 </div>

		<div style="text-align:left">
			<?php
			foreach($res as $value)
			{
			?>
			
					<?php
					if($_SESSION['role']=="student"){
					if($value['discussion']['text']['sender']=="s")
					{
					?>
					<div class="col-lg-offset-2 col-lg-10">
					<div class="well">
						
							<?php
							echo $value['discussion']['text']['message']."<br>";?>
							<a class="text-muted pull-right"><?php echo $value['discussion']['text']['timestamp']['date'];
							 ?></a>
					</div>
                    </div>
					<?php
					}
					?>
					
					<?php
					if($value['discussion']['text']['sender']=="t")
					{
					?>
					<div class="col-lg-10">
					<div class="well">
						
							<?php
							echo $value['discussion']['text']['message']."<br>";?>
							<a class="text-muted pull-right"><?php echo $value['discussion']['text']['timestamp']['date'];
							 ?></a>
					</div>
                    </div>
					<?php
					}
					}
					else
					{
					?>
					<?php
					if($value['discussion']['text']['sender']=="s")
					{
					?>
					<div class="col-lg-10">
					<div class="well">
						
							<?php
							echo $value['discussion']['text']['message']."<br>";?>
							<a class="text-muted pull-right"><?php echo $value['discussion']['text']['timestamp']['date'];
							 ?></a>
					</div>
                    </div>
					<?php
					}
					?>
					
					<?php
					if($value['discussion']['text']['sender']=="t")
					{
					?>
					<div class="col-lg-offset-2 col-lg-10">
					<div class="well">
						
							<?php
							echo $value['discussion']['text']['message']."<br>";?>
							<a class="text-muted pull-right"><?php echo $value['discussion']['text']['timestamp']['date'];
							 ?></a>
					</div>
                    </div>
					<?php
					}
					?>
					
					
					
					
					
					
					<?php
					}
					?>
			
			<?php
			}
			?>
			</div>
			</div>
			</div>
			<br>
        <div id="id1" class="row col-lg-offset-1">
		<div class="container row well col-lg-11">
		
		<div class="row col-lg-10">
		<form action="dtext_insert.php" method="post">
		<textarea class="form-control" rows=3 placeholder="Enter your message" name="message" required></textarea>
		</div>
		<input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
		<div class="col-lg-2">
		<br>
		<button type=submit name="submit" value="submit" style="width:190px"class="btn btn-success btn-block"> Send  Message</button>
		</div>
		
		</form>
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