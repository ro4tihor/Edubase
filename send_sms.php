<?php
session_start();
unset($_SESSION['temp']);
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

	$res = $coll->findOne(array('student.username' => $_SESSION['username']));
	$res1 = $coll->findOne(array('teacher.username' => $_SESSION['username']));
	if($res)
	{
		$name=$res['student']['name'];
	}
	elseif($res1)
	{
		$name=$res1['teacher']['name'];
	}

	if(isset($_POST["submit"]))
	{
 $data = array('Sender_name'=>$name,
 'subject'=>$_POST['sub'],
'message'=>$_POST['message'],
'timestamp'=>new DateTime()
 );
 
if($res1)
	{
	$coll->update(
	array('student.username' =>$_POST['reciept']),
	array('$push'=>array('student.inbox'=>$data)));
	}
	elseif($res)
	{
	$coll->update(
	array('teacher.username' =>$_POST['reciept']),
	array('$push'=>array('teacher.inbox'=>$data)));
	}
   header("Location:send_message.php");
}
	
	
?>
