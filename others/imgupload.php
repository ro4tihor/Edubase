<html><body>
<form id="uploadattachments" enctype="multipart/form-data" name="uploadattachments"  method="post">
<label for="username">Username:</label>
    <input type="text" name="username" id="username" />
<br>
    	<label for="pic">Upload your artwork:</label>    
Category:<input type="text" name="cat">     
<input type="file" id="attachment_1" name="attachment_1" onchange="document.uploadattachments.submit();"/>

    <input type="submit" value="Upload" name="submit" />

</form>
<?php
  // Set the upload target directory
  $target_path = "upload/";
  $attachments = 'attachment_1';
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
			echo "Only png, jpg and gif file type are supported";
	      	}

	        else 
		{
			$FileSize = round($_FILES[$attachments]['size']/1024);
			// Check for file size
			if($FileSize > 10000)
			 {
		  		$i="File exceeded in size";
				echo $i;
			}
			else 
			{
		  		$FileTemp = $_FILES[$attachments]['tmp_name'];
		  		$FileLocation = $target_path.basename($FileName);
		  		// Finally Upload
		  		if(move_uploaded_file($FileTemp,$FileLocation)) 
				{
		    			// On successful upload send a message
		    			 $i="Successfully uploaded";
					echo $i;
						
		  		} 
		  		else 
				{
		    			$i="There was an error uploading the file, please try again!";
					echo $i;
		  		}
			}
	      }
	}

$username=$_POST['username'];
$img="upload/".$FileName;
$submit=$_POST['submit'];
$cat=$_POST['cat'];
$required=array('username','submit','cat');
$connect=new MongoClient();
$db=$connect->practice;

$coll=$db->selectCollection("artists");
$artist=$coll->findOne(array('uname' => $_POST['username']));

$col_art=$db->createCollection("artworks");

$error = false;
foreach($required as $field)
 {
  if (empty($_POST[$field])) 
   {
    $error = true;
   }
}

if(isset($submit))
{
 	if ($error)
 	{?>
	<script type="text/javascript">	
	alert("All fields are required");	
	</script>
<?php
        }
	else
	{
	$doc=array('username'=> $_POST['username'],'Artist_details' => $artist,'url'=>$img, 'Category'=>$cat);
	$col_art->insert($doc);
	header("Location:new.php");
	}
}

?>
</body>
</html>
