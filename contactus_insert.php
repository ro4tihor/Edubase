<?php
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;
if(isset($_POST["submit"])){
 $data = array( 'contactus'=>array('name'=>$_POST["name"],
 'email'=>$_POST["email"],
 'mobile'=>$_POST["mobile"],
'message'=>$_POST["message"],
'timestamp'=>new DateTime()
 ));	
$coll->insert($data);
header("location:login.php");
}
else
header("location:contactus.php");
?>