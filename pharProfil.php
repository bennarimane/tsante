<?php   
$var=$_GET["id"];
?>
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
$bdd->query("SET NAMES UTF8");
if(isset($_SESSION['id_us']) AND !empty($_SESSION['id_us'])) {

   if(isset($_POST['envoi_message'])) {
if(isset($_POST['destinataire'],$_POST['message'],$_POST['objet']) AND !empty($_POST['destinataire']) AND !empty($_POST['message']) AND !empty($_POST['objet'])) {
    $destinataire = htmlspecialchars($_POST['destinataire']);
         $message = htmlspecialchars($_POST['message']);
         $objet = htmlspecialchars($_POST['objet']);
         $id_destinataire = $bdd->prepare('SELECT id FROM personne WHERE nom = ?');
            $id_destinataire->execute(array($destinataire));
              $dest_exist = $id_destinataire->rowCount();
                  if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id'];
             if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "pro/img/".$_SESSION['id_us'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if($resultat) {
            $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet,photo) VALUES (?,?,?,?,?)');
            $ins->execute(array($_SESSION['id_us'],$id_destinataire,$message,$objet,$_SESSION['id_us'].".".$extensionUpload));
            $error = '<div class="alert alert-success" role="alert">
 Votre message a bien été envoyé !
</div>'; } else {
            $msg = "Erreur durant l'importation de votre ordonnance";
         }
      } else {
         $msg = "Votre ordonnance doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre ordonnace ne doit pas dépasser 2Mo";
   }
}else{

	            $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet) VALUES (?,?,?,?)');
            $ins->execute(array($_SESSION['id_us'],$id_destinataire,$message,$objet));
            $error = '<div class="alert alert-success" role="alert">
 Votre message a bien été envoyé !
</div>'; 
}
         }else {
            $error = '<div class="alert alert-danger" role="alert">
  Cet utilisateur n\'existe pas!
</div>';
         }
 } else {
         $error = '<div class="alert alert-danger" role="alert">
 Veuillez compléter tous les champs !
</div>';
      }



   }
$destinataires = $bdd->query('SELECT nom FROM personne where nom=$var');
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
   
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
 <?php    
    $connexion = mysqli_connect("localhost", "root","","tsante2");
mysqli_set_charset($connexion,"utf8");

    if (mysqli_connect_errno())
      {
    die("Erreur de connexion".mysqli_connect_error());
      }
   
$result = mysqli_query($connexion," SELECT * FROM personne ,info_medecin where nom='$var' AND personne.id=info_medecin.id_med"); 
$pharma=mysqli_fetch_array($result);

?>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                                    <h5>
                        <div class="profile-img">
                            <?php echo "<img src=pro/includes/pha/".$pharma["avatar"].">\n";
                           ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                               <?php   echo $pharma["nom"]; ?>    
                                    </h5>
                                    <h6>
                                    Pharmacie
                                    </h6>
                                  
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">A propos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Horaires</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                      
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nom</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $pharma["nom"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $pharma["adresse"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $pharma["email"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Téléphone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $pharma["num_tlfn"]; ?></p>
                                            </div>
                                        </div>
                                   
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                               <div class="row">
                                            <div class="col-md-6">
                                                <label>Jours de travail</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $pharma["jour"]; ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ouverture</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $pharma["h_ov"]; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Fermeture</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $pharma["h_f"]; ?></p>
                                            </div>
                                        </div>
                                     
                                
                                     
                              
                            </div>
                        </div>
                    </div>

                </div>
            </form>  
            <br><br> 
              <div class="medica-appointment-card">
                            <h5 style="text-align: center;">Envoyer un message a <?php echo $pharma["nom"];  ?></h5>
                            <form  method="POST" enctype="multipart/form-data">
                                <div class="form-group">

                                    <input class="form-control text-white"type="hidden" name="destinataire" value= <?php echo $var; ?>>
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" type="text"placeholder="Objet" name="objet" <?php if(isset($o)) { echo 'value="'.$o.'"'; } ?>>
                                </div>
                                <div class="form-group">
                                     <textarea   class="form-control "placeholder="Votre message" name="message"></textarea>
                                </div>
                                  <div  class="form-group">
                                 <label>Ordonnace :</label>
             <input type="file" name="avatar"></div>
                                  <input class="btn medica-btn btn-2 m-2" type="submit" value="Envoyer" name="envoi_message" />
                                    <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
                            </form>
                        </div>        
        </div>
      
       
                        <br><br>
<script type="text/javascript">

</script>


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