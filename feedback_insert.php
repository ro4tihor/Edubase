<?php
session_start();
$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

$data1=array('feedback.rollno' => $_POST["rollno"], 'feedback.t_username' =>$_POST["t_username"],'feedback.subject'=>$_POST["subject"]);
$res=$coll->findOne($data1);
if($res)
{
?>
<script>alert("Sorry,but You have already submitted your feedback for given subject");</script>
<?php	
}
else{
if(isset($_POST["submit"]))
{
  $data = array( 'feedback'=>array('teacher_name'=>$_POST["tn"],
  'subject'=>$_POST["subject"],
 't_username'=>$_POST["t_username"],
  'student_name'=>$_POST["sn"],
  'course'=>$_POST["course"],
 'course_year'=>$_POST["course_year"],
 'rollno'=>$_POST["rollno"],
'feedback'=>$_POST["feedback"],
'ts'=>intval($_POST['ts']),
'ul'=>intval($_POST['ul']),
'cd'=>intval($_POST['cd']),
'timestamp'=>new DateTime()
 )); 
 
$coll->insert($data);
header("location:feedback_selection.php");
}}

?>