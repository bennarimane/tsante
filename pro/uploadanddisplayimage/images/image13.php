<?php 
ini_set('mysql.connect_timeout',300);
ini_set('default_stocket_timeout',300);
?>
<html>
<body>
	<form method="post" enctype="multipart/form-data">
		<br/>
		<input type="file" name="image">
		<br/><br/>
		<input type="submit" name="sumit" value="Upload"  />
	</form>


	  <?php 


	  if(isset($_POST['sumit']))
	  {
	  	if(getimagesize($_FILES['image']['tmp_name']) ==  FALSE)
	  	{
	  		echo "please select an image.";
	  	}
	  	else
	  	{
	  		$image= addslashes($_FILES['image'] ['tmp_name']);
	  		$name= addslashes($_FILES['image'] ['name']);
	  		$image= file_get_contents($image);
	  		$image= base64_encode($image);
	  		saveimage($name,$image);

	  	}
	  }
	  displayimage();
	  function saveimage($name,$image)
	  {
      $con=mysqli_connect('localhost','root','','kstark');
      //mysqli_select_db("kstark",$con);
      $qry="insert into images (name,image) values ('$name','$image')";
      $result=mysqli_query($con,$qry);
      if($result)
      {
      	echo "<br/>Image uploaded.";

      } 
      else 
      	{ echo "<br/>Image not uploaded.";  
      	}
	  } 
function displayimage()
{

	$con=mysqli_connect('localhost','root','','kstark');
      //mysql_select_db("kstark",$con);
      $qry="SELECT  * FROM images";
      $result=mysqli_query($con,$qry);
      while($row =mysqli_fetch_array($result))
      {

      } 

      mysqli_close($con);
}

	  ?>
	   <img height="300" width="300" src="data: image;base64,'.$row[2].'">
</body>
</html>
 
