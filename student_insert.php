<?php

$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

$res = $coll->findOne(array('student.username' => $_POST['username']));

if($res)
{
?>
<script>alert("Sorry,but username is not available");</script>
<?php	
}
else{
if(isset($_POST["submit"]))
{
  $data = array( 'student'=>array('name'=>$_POST["name"],
 'username'=>$_POST["username"],
  'DOB'=>$_POST["bday"],
  'course'=>$_POST["course"],
 'course_year'=>$_POST["course_year"],
 'rollno'=>$_POST["rollno"],
 'email'=>$_POST["email"],
 'address'=>$_POST["address"],
 'mobile'=>$_POST["mob"],
'password'=>$_POST["pass"],
'inbox'=>array(),
'timestamp'=>new DateTime()
 ));
 

	 $target_path = "profile_pic/";
     $attachments = 'pic';
	$FileName = $_FILES[$attachments]['name'];
		   

	$i=null;
  // Check if filename is empty
	if($FileName != "")
	{
		$FileType = $_FILES[$attachments]['type'];
		//get extension
		$FileExtension = strtolower(substr($FileName,strrpos($FileName,'.')+1));

		// Check for supported file formats
	        if($FileExtension != "gif" && $FileExtension != "jpg" && $FileExtension != "png" && $FileExtension != "jpeg") 
		{
				header("location:student_signup.php");
	      	}
	        else 
		{
			$a="";
			$a.=$_POST['username'];
			$a.=".";
			$a.=$FileExtension;
			
			$FileSize = round($_FILES[$attachments]['size']/1024);
			// Check for file size
			if($FileSize > 10000)
			 {
		  		header("location:student_signup.php");
			}
			else 
			{
		  		$FileTemp = $_FILES[$attachments]['tmp_name'];
		  		$FileLocation = $target_path.basename($a);
		  		// Finally Upload
		  		move_uploaded_file($FileTemp,$FileLocation);
			}
	      }
	}
 
$coll->insert($data);
		
header("location:login.php");
}}

?>