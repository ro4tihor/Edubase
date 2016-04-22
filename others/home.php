
<?php
session_start();
if (isset($_SESSION["loggedIn"])) {
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
    <title>Home</title>
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
  <style>
  body{
	background-image:url("1.jpg");

}
.vertical-center {
  min-height: 75vh;
  display: flex;
  align-items: center;
}
  </style>
  <body >
  
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
		
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  
          <img  "type="image/png" width=60px height=50px src="favicon.png" style="padding-right:5px"></img>
		  <a class="navbar-brand" href="home.php">Edubase</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="Dashboard.php">Home</a></li>
	
            <li><a href="timetable.php">TIme-table</a></li>
			  <li><a href="schedule.php">Exam-Schedule</a></li>
			    <li><a href="#">Review</a></li>
				  <li><a href="#">Feedback</a></li>
				  <li><a href="downloads.php">Downloads</a></li>
				<li><a href="contactus.php">Contact us</a></li>
				          <li><a href="aboutus.php">About us</a></li>
						        <li><a href="login.php">Login</a></li>
						  
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
              <ul class="dropdown-menu">
					
 
                <li><a href="contactus.php">Developers</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
		
		<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
	

	
	
	
	
<div class="container well" style="margin:20px 90px">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">About
                        <strong>business casual</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-12 text-center">
                    <p>This is a great place to introduce your company or project and describe what you do.</p>
                    <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
		</div>
		
		
		<footer>
        <div class="container-fluid well" >
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
                    <i class="fa fa-phone fa-2x wow bounceIn"></i>
                    <p>020-22605843</p>
                </div>
				
				<div class="col-lg-4 text-center float:right">
                    <i class="fa fa-envelope-o fa-2x wow bounceIn" data-wow-delay=".1s"></i>
                    <p>contactus@edubase.com</p>
                </div>
				</div>
            </div>

    </footer>
		

    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js">"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>