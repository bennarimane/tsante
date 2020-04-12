<?php
$connexion=mysqli_connect("localhost","root","","uploaddisplay");

if (isset($_POST['fileuploadsubmit'])) {
		 	if(getimagesize($_FILES['fileupload']['tmp_name']) ==  FALSE)
	  	{
	  		echo "please select an image.";
	  	}
	  	else{
	$fileupload=$_FILES['fileupload']['name'];
	$fileuploadTMP=$_FILES['fileupload']['tmp_name'];
	$folder="images/";
move_uploaded_file($fileuploadTMP, $folder.$fileupload);
$sql="INSERT INTO `updis`( `imagename`) VALUES ('$fileupload')";
$qry=mysqli_query($connexion,$sql);

if($qry){
	echo "uploaded";
}}
}




?>


<!DOCTYPE html>
<html>
<body>
	<?php
	$connexion=mysqli_connect("localhost","root","","uploaddisplay");
if ($connexion) {

}
$select="SELECT * FROM `updis`";
$query=mysqli_query($connexion,$select);
while($row=mysqli_fetch_array($query))

{$image=$row['imagename'];
}

	?>
<img src="images/<?php echo $image;?>"   height="300px" width="250px"/>
<form method="post" action="" enctype="multipart/form-data">
	<input type="file" name="fileupload"/>
<input type="submit" name="fileuploadsubmit"/>





</form>	




</body>
</html>