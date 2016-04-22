<?php

$connection = new MongoClient();
$db = $connection->selectDB('test1');
$coll= $db->collection;

$res1 = $coll->findOne(array('teacher.username' => $_POST['username']));
if($res1)
{
?>
<script>alert("Sorry,but username is not available");</script>
<?php	
}
else{
if(isset($_POST["submit"]))
{
	if($_POST['sub5']!=null)
		$sub=array($_POST["sub1"],$_POST["sub2"],$_POST["sub3"],$_POST["sub4"],$_POST['sub5']);
	elseif($_POST['sub4']!=null)
		$sub=array($_POST["sub1"],$_POST["sub2"],$_POST["sub3"],$_POST["sub4"]);
	elseif($_POST['sub3']!=null)
		$sub=array($_POST["sub1"],$_POST["sub2"],$_POST["sub3"]);
	elseif($_POST['sub2']!=null)
		$sub=array($_POST["sub1"],$_POST["sub2"]);
	else
		$sub=array($_POST["sub1"]);


  $data = array( 'teacher'=>array('name'=>$_POST["name"],
 'username'=>$_POST["username"],
 'password'=>$_POST["pass"],
 'email'=>$_POST["email"],
 'qualification'=>$_POST["qualification"],
  'experience'=>$_POST["experience"],
 'address'=>$_POST["address"],
 'mobile'=>$_POST["mob"],
 'DOB'=>$_POST["bday"],
 'subjects'=>$sub,
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