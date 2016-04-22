<?php
session_start();

$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;


if(isset($_SESSION["loggedIn"])){
   header("Location: Dashboard.php");
   $_SESSION["loggedIn"]=1;
     }
else{
	if(isset($_POST["submit"]))
	{
	
    $res = $coll->findOne(array('student.username' => $_POST['username'], 'student.password' =>$_POST['pass']));
	$res1 = $coll->findOne(array('teacher.username' => $_POST['username'], 'teacher.password' =>$_POST['pass']));
	
	if($res){
           $_SESSION["loggedIn"]=1;
           $_SESSION["username"]=$_POST['username'];
		   $_SESSION["role"]="student";

		   header("Location: Dashboard.php");
        }
    elseif($res1){
			$_SESSION["loggedIn"]=1;
            $_SESSION["username"]=$_POST['username'];

		    $_SESSION["role"]="teacher";
		    header("Location: Dashboard.php");
          }  
	else{
		   header("Location:login.php");
	}
   }
}
         
?>
