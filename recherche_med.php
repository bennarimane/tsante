<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" href="include/layout/css/socio.css">
       <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="include/layout/css/style_med.css">
    
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>santé | Recherche</title>

    <!-- Favicon  -->
  <link rel="icon" href="include/layout/img/core-img/plus.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="include/layout/css/core-style.css">


    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medica-load"></div>
        <img src="include/layout/img/core-img/plus.png" alt="logo">
    </div>

  <?php 

 include "include/template/header.php";  ?>
       <div  class="medica-doctors-area bg-gray   ">
       
        
<?php
$connexion = mysqli_connect("localhost", "root", "","tsante2");

mysqli_set_charset($connexion,"utf8");

    if (mysqli_connect_errno())
      {
    die("Erreur de connexion".mysqli_connect_error());
      }
    $nm=$_POST["nom"];
    $adr=$_POST["adresse"];
    $spe=$_POST["sp"];
$result = mysqli_query($connexion," SELECT personne.id as id, personne.nom ,email,num_tlfn,adresse,jour,h_ov,h_f,specialite.nom as specialite FROM personne,info_medecin,specialite,medecin where personne.nom like \"%$nm%\" and info_medecin.adresse like \"%$adr%\" and specialite.nom like \"%$spe%\" AND personne.id =info_medecin.id_med AND personne.id =medecin.id_med AND medecin.id_sp=specialite.id AND role='medecin' AND confirme=1 "); 
if($result){
  
  $nbpharma=mysqli_num_rows($result);
  
  if($nbpharma >0){ 
    echo "<br>\n";
    echo "<h1 style=\"text-align: center;\">Résultat de recherche   -".$nbpharma."-resultat</h1>\n";
while ($medecin=mysqli_fetch_array($result)) {
    
echo "<div class=\"layer\">\n";
echo "<div class=\"wb_Image1\">\n";
echo "<img src=\"include/layout/img/d.jpg\" alt=\"\"></div>\n";
echo "<div class=\"wb_Text1\">\n";
echo "<a href=\"med2.php?id=".$medecin["nom"]."\"><h5  style=\"color: #36D0D6;\"><strong>Dr <em>".$medecin["nom"]."</em></strong></h5></a></div>\n";
echo "<div class=\"wb_Text2\">\n";
echo "<span>".$medecin["adresse"]."<br>".$medecin["jour"]."<br>".$medecin["h_ov"]." ".$medecin["h_f"]."<br>".$medecin["num_tlfn"]."<br>".$medecin["email"]."<br>".$medecin["specialite"]."</span></div>\n";
                 
               if(isset($_SESSION['pseudo'])){
              echo "<a href=\"rendez-vous.php?id=".$medecin["id"]."\" class=\"btn btn-default\"> <h5>PRENDRE RENDEZ-VOUS</h5></a>\n";
                  
               } else {
                  echo "<a id=\"res\" href=\"sign-in.php\"> <h5>PRENDRE RENDEZ-VOUS</h5></a>\n";
               }
             
echo "</div>\n";
echo "<br><br><br><br><br><br><br><br><br><br><br><br>\n";

}

}
else{
    echo "<p>Désolé, il n'y a pas de réponce correspondant à votre recherche ";
         }
}else {
   echo "erreur dans la requete";  
   echo "le message d'erreur est : " .mysqli_error($connexion);
}
?></form>    
<div align="center" style="background-color:#C4D7ED"> <h3 align="center">Chercher tous les medecins de tlemcen</h3> <iframe src="https://maps.google.com/maps?q=medecin%20tlemcen&z=12&output=embed" width="500" height="500" frameborder="0"> </iframe> </div>


 </div>
<?php 

 include "include/template/footer.php";  ?>
