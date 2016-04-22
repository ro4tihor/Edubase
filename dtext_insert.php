<?php
session_start();
unset($_SESSION['temp']);
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

if($_SESSION['role']=="student")
{
$role="s";
}
else
{
$role="t";
}
	if(isset($_POST["submit"]))
	{
 $data = array('sender'=>$role,
'message'=>$_POST['message'],
'timestamp'=>new DateTime()
 );
 

	$coll->update(
	array('_id' =>new MongoId($_POST['id'])),
	array('$push'=>array('discussion.text'=>$data))
	);
	
  header("Location:thread.php?id=".$_POST['id']);
}
	
	
?>
