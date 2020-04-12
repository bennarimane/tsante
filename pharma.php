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
    <title>santé | pharmacie</title>

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
$results_per_page=9;
mysqli_set_charset($connexion,"utf8");
    if (mysqli_connect_errno())
      {
  die("Erreur de connexion".mysqli_connect_error());
      }
    else {
      
    }

$resulta = mysqli_query($connexion," SELECT id FROM personne WHERE role='pharmacie'"); 
if($resulta){
  
  $number_of_results=mysqli_num_rows($resulta);

$nmpharma=$number_of_results;
  if($number_of_results >0){  
     $number_of_pages = ceil($number_of_results/$results_per_page);
     if (!isset($_GET['page'])) {
 $page=1;
 }else {
  $page=$_GET['page'];
 }
 $this_page_first_result=($page-1)*$results_per_page;
 $sql= "SELECT * FROM personne,info_medecin,pharmacie WHERE personne.id=info_medecin.id_med  AND personne.id=pharmacie.id_pro AND confirme=1 LIMIT ". $this_page_first_result . ',' . $results_per_page; 
$result=mysqli_query($connexion,$sql);
  	echo "<div class=\"gradient-background\">\n";
   echo "<table >\n";
      
echo "<tr>\n";
$k=0;
while ($nmpharma>0 && $pharma=mysqli_fetch_array($result)) {
      
             echo "  <td>\n";

echo "<div class=\"layer\">\n";
echo "<div class=\"wb_Text1\">\n";

echo "<a href=\"pharma2.php?id=".$pharma["nom"]."\"><span><strong><em>".$pharma["nom"]."</em></strong></span></a></div>\n";
echo "<div class=\"wb_Text2\">\n";
echo "<img style=\"  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 90%;\" src=pro/includes/pha/".$pharma["avatar"].">\n";
echo "<span><strong>Adresse: </strong>".$pharma["adresse"]."<br><strong>Numéro De Téléphone: </strong>".$pharma["num_tlfn"]."<br><strong>Ventre parapharmacetique: </strong>".$pharma["parapharma"]."<br><strong>Jours de travail: </strong>".$pharma["jour"]."<br><strong>Horaire: </strong>".$pharma["h_ov"]."  ".$pharma["h_f"]." </span></div>\n";
  
echo "</div>\n";

echo "</td>\n";
$nmpharma--;
$k=$k+1;
if($k==3){
	$k=0;
echo "</tr>\n";
echo "<tr>\n";

}
}
for ($page=1; $page <=$number_of_pages;$page++) { 
        echo'<div class="col-12">';
                    echo'<nav aria-label="...">';
                        echo '<ul class="pagination">';
                      echo '<a  class="page-link" href="pharma.php?page=' . $page . ' ">'.$page. '</a> </li>';
                         
                        echo'</ul>
                    </nav>
                </div>';

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
