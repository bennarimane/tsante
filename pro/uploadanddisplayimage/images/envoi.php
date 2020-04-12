<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante', 'root', '');
if(isset($_SESSION['id_us']) AND !empty($_SESSION['id_us'])) {

   if(isset($_POST['envoi_message'])) {
 if(isset($_POST['destinataire'],$_POST['message'],$_POST['objet']) AND !empty($_POST['destinataire']) AND !empty($_POST['message']) AND !empty($_POST['objet'])) {
    $destinataire = htmlspecialchars($_POST['destinataire']);
         $message = htmlspecialchars($_POST['message']);
         $objet = htmlspecialchars($_POST['objet']);
         $id_destinataire = $bdd->prepare('SELECT id FROM users WHERE username = ?');
            $id_destinataire->execute(array($destinataire));
              $dest_exist = $id_destinataire->rowCount();
                  if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id'];
            $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet) VALUES (?,?,?,?)');
            $ins->execute(array($_SESSION['id_us'],$id_destinataire,$message,$objet));
            $error = "Votre message a bien été envoyé !";
         }else {
            $error = "Cet utilisateur n'existe pas...";
         }
 } else {
         $error = "Veuillez compléter tous les champs";
      }



   }

   $destinataires = $bdd->query('SELECT username FROM users ORDER BY username');
      if(isset($_GET['r']) AND !empty($_GET['r'])) {
      $r = htmlspecialchars($_GET['r']);
   }
   if(isset($_GET['o']) AND !empty($_GET['o'])) {
      $o = urldecode($_GET['o']);
      $o = htmlspecialchars($_GET['o']);
      if(substr($o,0,3) != 'RE:') {
         $o = "RE:".$o;
      }
   }
   ?>

<!DOCTYPE html>
<html>




<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
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
            
                                 <?php
   $connexion=mysqli_connect("localhost","root","","tsante");
if ($connexion) {

}
$select="SELECT * FROM `users`  where username='{$_SESSION['pseudo']}'";
$query=mysqli_query($connexion,$select);
while($row=mysqli_fetch_array($query))

{$image=$row['imagename'];
}

   ?><img src="uploadanddisplayimage/images/<?php echo $image;?>" class="img-responsive" alt=""  height="300px" width="250px"/>     
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle">
               <div class="profile-usertitle-name">
                  <h3><?php

if (isset($_SESSION['pseudo'])) {

echo $_SESSION['pseudo'];

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
                  Developer
               </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR BUTTONS -->
            <div class="profile-userbuttons">
               <button type="button" class="btn btn-success btn-sm">Follow</button>
               <button type="button" class="btn btn-danger btn-sm">Message</button>
            </div>
            <!-- END SIDEBAR BUTTONS -->
            <!-- SIDEBAR MENU -->
            <div class="profile-usermenu">
               <ul class="nav">
                  <li class="active">
                     <a href="#">
                     <i class="glyphicon glyphicon-home"></i>
                     Overview </a>
                  </li>
                  <li>
                     <a href="setting.php">
                     <i class="glyphicon glyphicon-user"></i>
                     Account Settings </a>
                  </li>
                  <li>
                     <a href="rdv.php" target="_blank">
                     <i class="glyphicon glyphicon-ok"></i>
                     Tasks </a>
                  </li>
                  <li>
                     <a href="envoi.php">
     
                     <i class="glyphicon glyphicon-flag"></i>
                  envoyer des mesagaes</a>
                  </li>
                        <li>
                     <a href="reception.php">
     
                     <i class="glyphicon glyphicon-flag"></i>
                  receptions des mesagaes</a>
                  </li>
               </ul>
            </div>
            <!-- END MENU -->
         </div>
      </div>
      <div class="col-md-9">
            <div class="profile-content">
           <form method="POST">
       
         <label>Destinataire:</label>
          <select name="destinataire">
            <?php while($d = $destinataires->fetch()) { ?>
            <option><?= $d['username'] ?></option>
            <?php } ?>
         </select <?php if(isset($r)) { echo 'value="'.$r.'"'; } ?>> 
        
         <br /><br />
         <label>Objet:</label>
         <input type="text" name="objet" <?php if(isset($o)) { echo 'value="'.$o.'"'; } ?> />
         <br /><br />
      
         <textarea placeholder="Votre message" name="message"></textarea>
         <br /><br />
         <input type="submit" value="Envoyer" name="envoi_message" />
         <br /><br />
          <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
           </form>
            </div>
      </div>
   </div>
</div>
<center>
<strong>Powered by <a href="" target="_blank"></a></strong>
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

<?php   
}
?>