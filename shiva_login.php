<?php
  //session_start();
include_once("config.php");

if($_SESSION["loggedIn"]==1){
   header("Location: dashboard.php");
   $_SESSION["loggedIn"]=1;
     }
else{
      //$_SESSION["loggedIn"]=0;
if(isset($_POST["submit"]))
  {
	
     $res = $coll->findOne(array('blood_donor.username' => $_POST['username'], 'blood_donor.password' =>$_POST['password']));
	$res1 = $coll->findOne(array('blood_event.username' => $_POST['username'], 'blood_event.password' =>$_POST['password']));
	$res2 = $coll->findOne(array('blood_bank.username' => $_POST['username'], 'blood_bank.password' =>$_POST['password']));
	$res3 = $coll->findOne(array('blood_request.username' => $_POST['username'], 'blood_request.password' =>$_POST['password']));
	if($res){
	   header("Location: dashboard.php");
           $_SESSION["loggedIn"]=1;
           $_SESSION["username"]=$_POST['username'];
	   echo '<script>swal("Heres a message!", "Its pretty, isnt it?");</script>';
           $cursor=$coll->find(array('blood_donor.username' => $_POST['username']));
	   $_SESSION["role"]="donor";
        }
       elseif($res1){
	   header("Location: dashboard.php");
           $_SESSION["loggedIn"]=1;
           $_SESSION["username"]=$_POST['username'];
           $cursor=$coll->find(array('blood_event.username' => $_POST['username']));
	   $_SESSION["role"]="event";
          }
	elseif($res2){
	   header("Location: dashboard.php");
           $_SESSION["loggedIn"]=1;
           $_SESSION["username"]=$_POST['username'];
           $cursor=$coll->find(array('blood_bank.username' => $_POST['username']));
	   $_SESSION["role"]="bank";
    }
      elseif($res3){
	   header("Location: dashboard.php");
           $_SESSION["loggedIn"]=1;
           $_SESSION["username"]=$_POST['username'];
           $cursor=$coll->find(array('blood_request.username' => $_POST['username']));
	   $_SESSION["role"]="request";
	}
        
        
   }

}
         
?>




  <!DOCTYPE html>
  <html>
    <head>
        <?php

     include("resources.php"); 

?>      
    </head>

    <body>
    <?php
           if($_SESSION["loggedIn"]==1):
     		include("headeradmin.php");
            else:
   		include("headerview.php");
 	   endif;

    ?>  


    <div class="row">
       <div class="col s12 text-center animatedParent" style="background:url('img/3.png');height:400px;">
            <h1 class="animated growIn" style="padding:90px;color:#000000;font-family:header;">A single pint can save three lives, a single gesture can create a million smiles</h1>>


    </div>
    </div>
   <div class="row" style="background:url('img/bck.jpg')">
       <div class="col s2" >
        <?php
 
                    include("sidebar.php");
     
        ?>
        
       </div>
      <div class="col s7" style="background:#ffffff;">
       <div class="section-title">
                            <h4 align="left"><b>Login</b></h4><hr></div>



                    <div class="row">
                <h6 align="left" id="error" color=red><? if(!$res): echo "Wrong Username Or Password!"; endif;?> </h6>
    <form name="login" class="col s12" method="POST" action="<?=$_SERVER["PHP_SELF"]; ?>">
      <div class="row">
        <div class="input-field col s12">
          <input name="username" id="username" type="text" class="validate">
          <label for="username">Username</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input name="password" id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>     
      </div>

      
      <div class="row">       
         
         <div class="input-field col s12" align="center">
              <button name="submit" class="waves-effect waves-light btn">Login</button>
         </div>
        
      </div>
     
    </form>
  </div>




	
       </div>
       <div class="col s3">
	<?php

     include("rightsidebar.php"); 

?>
       </div>   
  </div>
    <nav id="footer">
        <div class="container">
            <div class="pull-left fnav">
                <p>ALL RIGHTS RESERVED AT WWW.AIDRED.IN COPYRIGHT © 2015. </p>
            </div>
        </div>
    </nav>
    <script>
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>
 <?php

     include("resourcesend.php"); 

?>
    </body>
  </html>
        
