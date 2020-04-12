

<?php 
session_start();
									
	$connexion=mysqli_connect("localhost","root","","tsante2");
if (isset($_POST['submit'])) {
    $connexion=mysqli_connect('localhost','root','','tsante2');
    $pseudo=mysqli_real_escape_string($connexion,htmlspecialchars(trim($_POST['pseudo'])));
    if (empty($pseudo)) {
       echo "Veuillez completer ce champ";
    }else {


mysqli_query($connexion,"UPDATE personne SET nom='$pseudo' WHERE id= '{$_SESSION['id_us']}'
    ") or die(mysql_error());


    }
}
if (isset($_POST['subpass'])) {
$o_password=$_POST['o_password'];
$n_password=$_POST['n_password'];
$r_password=$_POST['r_password'];
$connexion=mysqli_connect('localhost','root','','tsante2');
$o_password=md5($o_password);

$query=mysqli_query($connexion,"SELECT * FROM personne WHERE email='{$_SESSION['pseudo']}'AND password='$o_password'")or die(mysql_error());
$rows=mysqli_num_rows($query);
if (empty($o_password)) {
echo "Veuillez saisir votre ancien mot de passe";
}else if ($n_password!=$r_password) {
echo "vos nouveaux mot de passe sont différents";}
else if ($rows==0){echo "l'ancien mot de passe  est incorrect";}
else
    {$n_password=md5($n_password);
mysqli_query($connexion,"UPDATE personne SET  password='$n_password'WHERE id='{$_SESSION['id_us']}'");
header("Location:userProfil.php");

    }


}

if (isset($_POST['fileuploadsubmit'])) {
	 $connexion=mysqli_connect('localhost','root','','tsante2');
	 	if(getimagesize($_FILES['fileupload']['tmp_name']) ==  FALSE)
	  	{
	  		echo "please select an image.";
	  	}

	$fileupload=$_FILES['fileupload']['name'];
	$fileuploadTMP=$_FILES['fileupload']['tmp_name'];
	$folder="uploadanddisplayimage/images/";
move_uploaded_file($fileuploadTMP, $folder.$fileupload);


mysqli_query($connexion,"UPDATE personne SET avatar='$fileupload'WHERE id='{$_SESSION['id_us']}'");
}


 ?>
<!DOCTYPE html>
<html>




<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript"src="jquery-3.3.1.js"></script>
<link rel="stylesheet" href="style_userProfil.css" >
<!------ Include the above in your HEAD tag ---------->


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    <!-- Title  -->
    <title>santé| Accueil</title>
    <link rel="icon" href="include/layout/img/core-img/plus.png">
    <link rel="stylesheet" href="include/layout/css/core-style.css"media="all">
    <link rel="stylesheet" href="include/layout/css/style.css"media="all">
    <link rel="stylesheet" href="include/layout/css/socio.css"media="all">
    <link rel="stylesheet" href="include/layout/css/responsive.css"media="all">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<script type="text/javascript" src="jquery-3.3.1.js"></script>
<!--

-->

<?php 
 include "include/template/header.php";  ?>
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
						<?php if ($connexion) {

}
$select="SELECT * FROM `personne`  where id='{$_SESSION['id_us']}'";
$query=mysqli_query($connexion,$select);
while($row=mysqli_fetch_array($query))

{$image=$row['avatar'];
}

	?><img src="uploadanddisplayimage/images/<?php echo $image;?>" class="img-responsive" alt=""  height="300px" width="250px"/>					
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<h3><?php

if (isset($_SESSION['pseudo'])) {

echo $_SESSION['pseudo'];echo'<br><br>';
echo $_SESSION['nom'];

?>
<br><br>
  <a href="logout.php">Me déconnecter</a>
  <?php
}else
{
  header('location:login.php');
}

?></h3>






					</div>
				<div class="profile-usertitle-job">
						Utilisateur
					</div>
				</div>
		
				<div class="profile-usermenu">
					<ul class="nav">
					
						<li>
							<a href="setting.php">
							<i class="glyphicon glyphicon-user"></i>
							Paramètres du compte </a>
						</li>
					<li>
							      <?php

                  
                    $query="SELECT  id FROM rendez WHERE id_us='{$_SESSION['id_us']}' AND lu=0 AND accept=1";
                    $query_run= mysqli_query($connexion , $query);
                    $rows=mysqli_num_rows($query_run);
         

                ?>     
							<a href="rdv.php">
							<i class="glyphicon glyphicon-ok"></i>
							
							Mes rendez vous Chez medecin  <?php  if ($rows>0) {
    
 ?> <span class="badge badge-danger badge-counter">           <?php echo $rows;

							   ?></span><?php }?></a>
						</li>
						<li>
							      
								<li>
												      <?php

                  
                    $query="SELECT  id FROM messages WHERE id_de1='{$_SESSION['id_us']}' AND lu=0";
                    $query_run= mysqli_query($connexion , $query);
                    $rows=mysqli_num_rows($query_run);
         

                ?>
               
							<a href="receptionopti.php">
     
							<i class="glyphicon glyphicon-flag"></i>
						Reponses (pharmacie/opticien) <?php  if ($rows>0) {
    
 ?> <span class="badge badge-danger badge-counter">           <?php echo $rows;

							   ?></span><?php }?></a>
						</li>
						<li>
						<?php

                  
                    $query="SELECT id FROM bilan WHERE id_us='{$_SESSION['id_us']}' AND lu=0 AND heure_rdv<> \"00:00:00\" AND jour_rdv <>0000-00-00";
                    $query_run= mysqli_query($connexion , $query);
                    $rows=mysqli_num_rows($query_run);
         

                ?>     
							<a href="rdv_labo.php">
							<i class="glyphicon glyphicon-ok"></i>
							
							Mes rendez vous Chez laboratoire <?php  if ($rows>0) {
    
 ?> <span class="badge badge-danger badge-counter">           <?php echo $rows;

							   ?></span><?php }?></a>
						</li>
							<li>
						<?php

                  
                    $query="SELECT id FROM bilan WHERE id_us='{$_SESSION['id_us']}' AND see=0 ";
                    $query_run= mysqli_query($connexion , $query);
                    $rows=mysqli_num_rows($query_run);
         

                ?>     
							<a href="rsp_labo.php">
							<i class="glyphicon glyphicon-ok"></i>
							
							La disponibilie des analyse<?php  if ($rows>0) {
    
 ?> <span class="badge badge-danger badge-counter">           <?php echo $rows;

							   ?></span><?php }?></a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
<div class="limiter">
	<span class="login100-form-title p-b-51" style="color:#313535;">
						Changer votre Pseudo
					</span>
				<form class="login100-form validate-form flex-sb flex-w" method="POST">
					

					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="text" name="pseudo" placeholder="Nouveau pseudo">
						<span class="focus-input100"></span>
					</div>
					
					
				

					<div class="container-login100-form-btn m-t-17">
				
					<input type="submit" name="submit" class="btn btn-success btn-sm "value="changer">   
						
					</div>

				</form>
		
	</div>	
	<br><br>
<div class="limiter">
	<span class="login100-form-title p-b-51" style="color:#313535;">
						Changer votre Mot de passe
					</span>
				<form class="login100-form validate-form flex-sb flex-w" method="POST">
					

					 
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">

						<input class="input100" type="password" name="o_password" placeholder="votre ancien mot de passe">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="password" name="n_password" placeholder="votre nouveau mot de passe">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
						<input class="input100" type="password" name="r_password" placeholder="confirmer votre mot de passe">
						<span class="focus-input100"></span>
					</div>
					
				

					<div class="container-login100-form-btn m-t-17">
				
					<input type="submit" name="subpass" class="btn btn-success btn-sm"value="Changer de mot de passe">   
						
					</div>

				</form>
		
	</div><br><br>
	<div class="limiter">
	<span class="login100-form-title p-b-51" style="color:#313535;">
						Ajouter une photo de profil
					</span>
					
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="" enctype="multipart/form-data">

						<input class="input100" type="file" name="fileupload">
						<span class="focus-input100"></span>
					
					<div class="container-login100-form-btn m-t-17">
				
					<input type="submit" name="fileuploadsubmit" class="btn btn-success btn-sm"value="inserer">   
						
					</div>

				</form>
		
	</div>
	</div>
</div>
<center>
<strong>Tsante <a href="" target="_blank"></a></strong>
</center>
<br>
<br>
    <script src="include/layout/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="include/layout/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="include/layout/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="include/layout/js/plugins.js"></script>
    <!-- Active js -->
    <script src="include/layout/js/active.js"></script>
