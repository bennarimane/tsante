<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
if(isset($_SESSION['id_us']) AND !empty($_SESSION['id_us'])) {
$msg = $bdd->prepare('SELECT * FROM bilan WHERE id_us = ? AND repnse <> "NULL"  ORDER BY id DESC');
$msg->execute(array($_SESSION['id_us']));
$msg_nbr = $msg->rowCount();
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
  $connexion=mysqli_connect("localhost","root","","tsante2");
if ($connexion) {

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
              
              Mes rendez vous chez medecin <?php  if ($rows>0) {
    
 ?> <span class="badge badge-danger badge-counter">           <?php echo $rows;

                 ?></span><?php }?></a>
            </li>
 
                <li>
                              <?php

                  
                    $query="SELECT  id FROM messages WHERE id_destinataire='{$_SESSION['id_us']}' AND lu=0";
                    $query_run= mysqli_query($connexion , $query);
                    $rows=mysqli_num_rows($query_run);
         

                ?>
               
              <a href="receptionopti.php">
     
              <i class="glyphicon glyphicon-flag"></i>
            Reponses (pharmacie/opticien)  <?php  if ($rows>0) {
    
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
  <br /><h1 style="text-align: center;">Votre boîte de réception:</h1><br /><br />
   
   <?php
   if($msg_nbr == 0) { echo '<div class="alert alert-primary" role="alert">
  <div class="alert alert-primary" role="alert">
Vous n\'avez aucun message...
</div>';
 }
   while($m = $msg->fetch()) {
      $p_exp = $bdd->prepare('SELECT nom FROM personne WHERE id= ?');
      $p_exp->execute(array($m['id_labo']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['nom'];
   ?>
   <a href="lecture_labo.php?id=<?= $m['id'] ?>"><?php if($m['see'] == 1) { ?> <span style="color:grey"><?php } ?><b><?= $p_exp ?></b> vous a envoyé un message    &nbsp;   <?= $m['date_rps'] ?><br />
      <b>Objet:</b> <?='Reponse' ?><?php if($m['see'] == 1) { ?></span><?php } ?></a><br />
   -------------------------------------<br/>
   <?php } ?>
            </div>
      </div>
   </div>
</div>
<center>
<strong>Tsante<a href="" target="_blank"></a></strong>
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


</html>
<?php } ?>