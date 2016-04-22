<?php
session_start();

$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;


	if(isset($_POST["submit"]))
	{
 $data = array('teacher.name'=>$_POST['name'],
 'teacher.username'=>$_POST['username'],
 'teacher.email'=>$_POST['email'],
 'teacher.mobile'=>$_POST['mob'],
 'teacher.qualification'=>$_POST['qualification'],
 'teacher.experience'=>$_POST['experience'],
 'teacher.DOB'=>$_POST['bday']);
 
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
	
	$coll->update(
	array('teacher.username' =>$_SESSION['username']),
	array('$set'=> $data)
	);
   header("Location:Dashboard.php");

}
	
?>
