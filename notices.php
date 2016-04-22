
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Notice-Board</title>
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
		if (isset($_SESSION["loggedIn"]))
			include("nav2.php");
		else
		include("nav1.php");
		?>
		
		<div class="vertical-center">
		<div class="container well col-lg-10">
		 <div class="col-md-11">
                
                    <h1><small>Notice-Board :</small></h1>
	<hr>
                
                    <a class="lead" href="">Notice 1 :</a>
              <small class="pull-right text-muted"><span class="glyphicon  glyphicon-time"></span> Posted on August 28, 2015 at 10:00 PM</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                <a class="btn pull-right btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><br><hr>

       

                <h2>
                  
                </h2>
               <a class="lead" href="">Notice 2 :</a>
              <small class="pull-right text-muted"><span class="glyphicon  glyphicon-time"></span> Posted on August 28, 2015 at 10:45y PM</small>
                <hr>
              
   
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, quasi, fugiat, asperiores harum voluptatum tenetur a possimus nesciunt quod accusamus saepe tempora ipsam distinctio minima dolorum perferendis labore impedit voluptates!</p>
               <a class="btn pull-right btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><br><hr>

 

                <h2>
               
                </h2>
                 <a class="lead" href="">Notice 3 :</a>
              <small class="pull-right text-muted"><span class="glyphicon  glyphicon-time"></span> Posted on August 28, 2015 at 10:45PM</small>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptates, voluptas dolore ipsam cumque quam veniam accusantium laudantium adipisci architecto itaque dicta aperiam maiores provident id incidunt autem. Magni, ratione.</p>
               <a class="btn pull-right btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><br><hr>


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