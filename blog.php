<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link href="css1/main.css" rel="stylesheet" />
     <link rel="stylesheet" href="include/layout/css/socio.css">
    

    <title>santé |Actualité</title>
  <link rel="icon" href="include/layout/img/core-img/plus.png">
    <link rel="stylesheet" href="include/layout/css/core-style.css">
    <link rel="stylesheet" href="include/layout/css/responsive.css">
    <link rel="stylesheet" href="style1234.css">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medica-load"></div>
        <img src="include/layout/img/core-img/plus.png" alt="logo">
    </div>

    <?php include"include/template/header.php" ?>

    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(include/layout/img/bg-img/hero4.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <!-- Title -->
                        <h3 class="breadcumb-title">Dernières Actualités</h3>
                        <!-- Breadcumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Actualités</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


      <?php
$connexion = mysqli_connect("localhost", "root", "","tsante2");
mysqli_set_charset($connexion,"utf8");
    if (mysqli_connect_errno())
      {
  die("Erreur de connexion".mysqli_connect_error());
      }
    else {
      
    }

$result = mysqli_query($connexion," SELECT * FROM personne,garde,info_medecin WHERE personne.id=garde.id_pharma AND personne.id=info_medecin.id_med  ORDER BY jour_garde ASC"); 
if($result){
  
  $nbpharma=mysqli_num_rows($result);

  if($nbpharma >0){  
    echo "<div class=\"gradient-background\">\n";
   echo "<table >\n";
      
echo "<tr>\n";
$k=0;
while ($nbpharma>0 && $pharma=mysqli_fetch_array($result)) {
      
             echo "  <td>\n";

echo "<div class=\"layer\">\n";
echo "<div class=\"wb_Text1\">\n";

echo "<a href=\"pharma2.php?id=".$pharma["nom"]."\"><span><strong><em>".$pharma["nom"]."</em></strong></span></a></div>\n";
echo "<div class=\"wb_Text2\">\n";
echo "<img style=\"  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 90%;\" src=pro/includes/pha/".$pharma["avatar"].">\n";
echo "<span><strong><strong>Adresse: </strong></strong>".$pharma["adresse"]."<br><strong><strong>Numéro De Téléphone: </strong></strong>".$pharma["num_tlfn"]."<br><strong> <strong>La date de garde: </strong>".$pharma["jour_garde"]."<br><strong>Horaire de garde: </strong>".$pharma["heure_g_o"]."  ".$pharma["heure_g_f"]."<br><strong></span></div>\n";
  
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
 <?php 
 include "include/template/footer.php" ?>
