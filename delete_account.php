<?php
session_start();
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;
		
if($_SESSION['role']=='student')
{
	
		$res = $coll->remove(array('student.username' =>$_SESSION['username']));
}
else
{
	
		$res = $coll->remove(array('teacher.username'=>$_SESSION['username']));
}

session_unset();
session_destroy();
header("location:login.php");
?>