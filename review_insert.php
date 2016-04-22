<?php

$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;
$a= $_POST["review"];

if(isset($_POST["submit"]))
{
  $data = array( 'review'=>array('teacher_name'=>$_POST["tn"],
  'subject'=>$_POST["subject"],
  'student_name'=>$_POST["sn"],
  'course'=>$_POST["course"],
 'course_year'=>$_POST["course_year"],
 'rollno'=>$_POST["rollno"],
'review'=>$a,
'timestamp'=>new DateTime()
 ));
 

$coll->insert($data);
		
header("location:review_signup.php");
}

?>