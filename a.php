<?php
session_start();
$var=$_GET["id"];
$msg=$_SESSION['id_us'];
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
error_reporting(E_ALL);
if (isset($_POST['submit'])) {

 $nom = htmlspecialchars($_POST['nom']);
  
 $prenom = htmlspecialchars($_POST['prenom']);
   $age = htmlspecialchars($_POST['age']);
    if(!empty($_POST['nom'])AND !empty($_POST['prenom'])AND !empty($_POST['age']) ) {
if(!empty($_POST['choix']))
{
foreach($_POST['choix'] as $val)
{

  $insertmbr = $bdd->prepare("INSERT INTO bilan(nom,prenom,age,type, id_labo ,id_us) VALUES(?,?,?,?, ?,?)");
                     $insertmbr->execute(array($nom,$prenom,$age,$val,$var,$msg));
               
}   die('Votre demande en cours de traitement <a href="userprofil.php"> retour </a>');

} } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="include/layout/css/search_box.css">
         <link rel="stylesheet" href="style1234.css">
    

    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>santé | Rendez-vous</title>

    <!-- Favicon  -->
  <link rel="icon" href="include/layout/img/core-img/plus.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="include/layout/css/core-style.css"media="all">


    <!-- Responsive CSS -->
    <link rel="stylesheet" href="include/layout/css/responsive.css"media="all">
<link rel="stylesheet" href="include/layout/css/socio.css"media="all">
</head>

<body>
   <div id="preloader">
        <div class="medica-load"></div>
        <img src="include/layout/img/core-img/plus.png" alt="logo">
    </div>

   <?php  include"include/template/header.php" ?>

<br /><br />
    <section class="medica-contact-area section_padding_100">
 <div class="container">
            <div class="row">
                <!-- Contact Form Area -->
                <div class="col-12 col-lg-8">
                    <div class="contact-form">
                        <h5 class="mb-50">Prenez votre rendez vous</h5>

<form method="POST" action="">

 <input type="text" class="form-control" placeholder="Entrer votre nom" id="nom" name="nom"  />
  <input type="text" class="form-control"  placeholder="Entrer votre prenom" id="prenom" name="prenom"  />
  <input type="text" class="form-control"  placeholder="Entrer votre age"id="age" name="age" />
  <label>Choisi votre type de bilan :</label><br>
    <input type="checkbox" name="choix[]" value="ALAT"> ALAT &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" name="choix[]" value="ASAT"> ASAT &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" name="choix[]" value="GGT"> GGT<br>
    <input type="checkbox" name="choix[]" value="PAL"> PAL &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" name="choix[]" value="La glycémie"> La glycemie &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="checkbox" name="choix[]" value="La NFS"> La NFS<br>
    <input type="checkbox" name="choix[]" value="VS "> VS &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="choix[]" value="CRP"> CRP &nbsp;&nbsp;&nbsp;&nbsp;
  <br>  <input  class="btn medica-btn btn-3 mt-3"  type="submit" value="Valider" name="submit">
</form>
    </div>
                </div>
    </div>
                </div></section>

 <?php include "include/template/footer.php";  ?>