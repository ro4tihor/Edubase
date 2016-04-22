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
    <title>feedback analysis</title>
	<link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">	
	  <link rel="stylesheet" href="css/custom.css" type="text/css">	
  <script src="js/jquery.min.js"></script>
	
	  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
  </head>
<?php
$res1 = $coll->findOne(array('teacher.username' =>$_SESSION['username']));
$sub=$res1['teacher']['subjects'];
$i=0;
?>
  
  <body >
	<?php
	include("nav2.php");
	?>
		<br>
		<?php
while($i<count($sub))
		{
		?>	
		<div id="<?php echo $i;?>" class="row container well col-md-offset-3 col-lg-5" style="width:770px;height:550px;margin-left:285px"></div>
		<?php
			$i++;
		}?>






<div class="row"></div>
<footer>
	<div class="nav navbar navbar-static-bottom" style="background-color:#f5f5f5;padding:10px;border-radius: 4px">
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
	

<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>
<script type="text/javascript">
<?php
$i=0;
while($i<count($sub))
		{
		$ops = array(array('$match'=>array("feedback.t_username"=>$_SESSION['username'],"feedback.subject"=>$sub[$i])),
array('$group'=>array('_id'=>'$feedback.subject','cd'=>array('$avg'=>'$feedback.cd'),'ul'=>array('$avg'=>'$feedback.ul'),'ts'=>array('$avg'=>'$feedback.ts'),'count'=>array('$sum'=>1)))
);
			$res=$coll->aggregate($ops);
			$x=$res['result'][0]['cd']+$res['result'][0]['ts']+$res['result'][0]['ul'];
	$x=$x/3;
		?>	
		$(function () {
    $('#<?php echo $i;?>').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<?php echo $sub[$i];?> feedback analysis '
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Teaching Skill',
                'Understanding level',
                'Content Delivery',
                'Overall Rating'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rating (outof 10)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{}Rating :</td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Ratings terms ( Student count : <?php echo $res['result'][0]['count']; ?>)',
            data: [<?php echo $res['result'][0]['ts'].",".$res['result'][0]['ul'].",".$res['result'][0]['cd'].",".$x; ?>]
        }]
    });
});
		<?php
			$i++;
		}?>
</script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>