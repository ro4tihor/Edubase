<?php
session_start();

$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;


$ops = array(array('$match'=>array("feedback.t_username"=>$_SESSION['username'],"feedback.subject"=>"DBMS")),
array('$group'=>array('_id'=>'$feedback.subject','cd'=>array('$avg'=>'$feedback.cd'),'ul'=>array('$avg'=>'$feedback.ul'),'ts'=>array('$avg'=>'$feedback.ts'),'count'=>array('$sum'=>1)))
);
			$res=$coll->aggregate($ops);
		
	var_dump($res);	
	$x=$res['result'][0]['cd']+$res['result'][0]['ts']+$res['result'][0]['ul'];
	$x=$x/3;
	echo $res['result'][0]['ts'].",".$res['result'][0]['ul'].",".$res['result'][0]['cd'].",".$x;
	

	?>