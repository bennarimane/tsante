<?php session_start(); 
   $connexion=mysqli_connect('localhost','root','','tsante2');

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
    <link rel="stylesheet" href="bootstrap.css" />


    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>santé | laboratoire</title>

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

   
  <?php
$connexion = mysqli_connect("localhost", "root", "","tsante2");
mysqli_set_charset($connexion,"utf8");
    if (mysqli_connect_errno())
      {
  die("Erreur de connexion".mysqli_connect_error());
      }
    else {
      
    }
    //$nm=$_POST["nom"];
$result = mysqli_query($connexion," SELECT * FROM personne,info_medecin,labo where role='laboratoire' AND personne.id=info_medecin.id_med AND personne.id=labo.id_pro and confirme =1"); 
if($result){
  
  $nbpharma=mysqli_num_rows($result);

  if($nbpharma >0){  
  	echo "<div class=\"gradient-background\">\n";
   echo "<table >\n";
      
echo "<tr>\n";
$k=0;
while ($nbpharma>0 && $labo=mysqli_fetch_array($result)) {
      
             echo "  <td>\n";

echo "<div class=\"layer\">\n";
echo "<div class=\"wb_Text1\">\n";

echo "<span><strong><em>".$labo["nom"]."</em></strong></span></a></div>\n";
echo "<div class=\"wb_Text2\">\n";
echo "<img src=".$labo["avatar"].">\n";
echo "<span><strong>Numéro De Téléphone: </strong>".$labo["num_tlfn"]."<br></span>\n";
echo "<span><strong>Adresse </strong>".$labo["adresse"]."<br></span>
\n";echo "<span><strong>Email: </strong>".$labo["email"]."<br></span>";
echo "<span><strong>Type: </strong>".$labo["type"]."<br></span>\n";
echo "<span><strong>Jour de travail: </strong>".$labo["jour"]."<br></span>\n";
echo "<span><strong>Heure d'ouverture: </strong>".$labo["h_ov"]."<br></span>";
echo "<span><strong>Heure de fermeture: </strong>".$labo["h_f"]."<br></span></div>\n";
   if(isset($_SESSION['pseudo'])){
              echo "<a href=\"a.php?id=".$labo["id_pro"]."\" class=\"btn btn-default\"> <h5>PRENDRE RENDEZ-VOUS</h5></a>\n";
                  
               } else {
                  echo "<a id=\"res\" href=\"sign-in.php\"> <h5>PRENDRE RENDEZ-VOUS</h5></a>\n";
               }


  
echo "</div>\n";

echo "</td>\n";
$nbpharma--;
$k=$k+1;
if($k==3){
	$k=0;
echo "</tr>\n";
echo "<tr>\n";
}
}

echo "</tr>\n";
echo "</table>\n";
echo "</div>\n";
}
else{
    echo "<p>Désolé, il n'y a pas de réponce correspondant à votre recherche ";
         }
}else {
   echo "erreur dans la requete";  
   echo "le message d'erreur est : " .mysqli_error($connexion);
}
?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="POST" >  <input type="text" name="bilan"><input type="submit" name="submit">  </form>
    </div>
  </div>
</div>


 <?php 

 include "include/template/footer.php";  ?>

<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap.js"></script>