<?php
session_start();
if ($_SESSION["loggedIn"]!=1) {
    header("location:login.php");
}
	$connection = new MongoClient();
	$db = $connection->selectDB('test1');
	$coll= $db->collection;
	$data=array("_id"=>new MongoId($_GET['id']));
	$res1=$coll->remove($data);
			if($res1)
				header("location:discussion.php");
	?>
	
 