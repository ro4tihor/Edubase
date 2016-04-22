<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>About Us</title>
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
		
	<h1>  </h1>
		<section id="about" >
        <div class="container" style="background:#e6e6e6 url('img.jpg') no-repeat center center">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="section-heading">About Portal</h3>
					<h3 class="section-subheading text-muted">We design platform for you to</h3>
					<br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
						<div class="timeline-image">
                             <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4></h4>
                                    <h4 class="subheading">Discuss and learn</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">We provide a friendly platform where student can discuss on various technical as well as non-technical topics with their subject teacher.	</p>
                                </div>
                            </div>
                            
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4></h4>
                                    <h4 class="subheading">Give Feedback</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">"We believe that teacher are most welcomed by feedback given by students.It helps teahcer to collaborate with student and improve themselves." </p>
                                </div>
                            </div>
                        </li>
                        <li>
                           <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4></h4>
                                    <h4 class="subheading">Communicate</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">We helps you to communicate with teacher and allow you to share your thoughts with ease by using send message feature keeping privacy !</p>
                                </div>
                            </div> 
							
							
							
							
							
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4></h4>
                                    <h4 class="subheading">Keeping yourself up to date</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Student will never miss any important notice and study materail. Alll these will be available at just one click !</p>
                                </div>
                            </div>
                        </li>
      
                    </ul>
                </div>
            </div>
        </div>
    </section>
	
	<h1>  </h1>
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
		
		
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js">"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>