<?php
session_start();
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;


if(isset($_POST["submit"]))
{
	$data1=array('sender'=>'s','message'=>$_POST["message"], 'timestamp'=>new DateTime());
	
	
  $data = array( 'discussion'=>array('teacher_name'=>$_POST["tn"],
 't_username'=>$_POST["t_username"],
 'student_name'=>$_POST["sn"],
  's_username'=>$_SESSION['username'],
 'qh'=>$_POST["qh"],
  'subject'=>$_POST["subject"],
 'rollno'=>$_POST["rollno"],
 'text'=>array($data1),
 'timestamp'=>new DateTime()
 ));
 
$coll->insert($data);
		
header("location:discussion.php");
}

?>