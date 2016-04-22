<?php
session_start();
if (!isset($_SESSION["loggedIn"]))	 {
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
    <title>Contact Us Display</title>
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
	session_start();
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
	
      
	
	    <div class="vertical-center" >
		
		<div class=" container well col-lg-7" >
		 <div class="lead text-center"> <center>Contact Us Messages</center></div>
		 			
			
		<div style="tex	t-align:left">
			<?php
			$ops = array(array('$project'=>array("contactus"=>1)));
			$res=$coll->aggregateCursor($ops);
			foreach($res as $value)
			{
				if(isset($value['contactus']['name']) && isset($value['contactus']['email']) && isset($value['contactus']['message']) && isset($value['contactus']['timestamp']['date']))
				{
			?>
			<p></p>
				<hr class="divider">
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row">
                            <div class="col-lg-7">
							<div class="col-md-6">
								<h4>Name:</h4><?php echo $value['contactus']['name'];?>
								<h4 class="text-muted"><small>Timestamp:
									<?php echo  $value['contactus']['timestamp']['date'];?></small></h4></div>
									<div class="col-md-6"><h4>Email:</h4>
                                  <?php echo $value['contactus']['email'];?>
									
									</div>
                            </div>
                            <div class="col-lg-5">
									<h4>Message:</h4>
                                 <?php echo $value['contactus']['message'];?>
					
                            </div>
							
                        </div>
                </div>
		
			
            </div>
			<?php
			}}
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