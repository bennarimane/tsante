<?php session_start(); ?>
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
    <title>santé | Salle sport</title>

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
    if (mysqli_connect_errno())
      {
    die("Erreur de connexion".mysqli_connect_error());
      }
      $result = mysqli_query($connexion," SELECT * FROM salles_de_sport "); 
if($result){
  
  $nbsalle=mysqli_num_rows($result);
  
  if($nbsalle >0){ 
    echo "<div class=\"gradient-background\">\n";
   echo "<table >\n";
      
echo "<tr>\n";
$k=0;
    echo "<h1 style=\"text-align: center;\">Résultat de recherche   -".$nbsalle."-resultat</h1>\n";
while ($salledesport=mysqli_fetch_array($result)) {

 echo "  <td>\n";

echo "<div class=\"layer\">\n";
echo "<div class=\"wb_Text1\">\n";
//echo "<img src=".$salledesport["img"]." alt=\"\"></div>\n";
//echo "</div>";
//echo " <div class=\"doctor-meta\">\n";
echo "<span><strong> <em>".$salledesport["nom_salle"]."</em></strong></span></div>\n";
echo "<div class=\"wb_Text2\">\n";
echo "<span><strong>Adresse: </strong>".$salledesport["adresse_salle"]."<br><strong>Numéro De Téléphone: </strong>".$salledesport["num_salle"]."<br><strong>Jours de travail: </strong>".$salledesport["Jours_Travail"]."<br><strong>Horaire: </strong>".$salledesport["Horaires_salle"]."</span></div>\n";

 echo "</div>\n";

echo "</td>\n";
$nbsalle--;
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

 <?php 

 include "include/template/footer.php";  ?>

