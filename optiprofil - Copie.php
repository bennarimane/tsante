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
            $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message,objet) VALUES (?,?,?,?)');
            $ins->execute(array($_SESSION['id_us'],$id_destinataire,$message,$objet));
            $error = '<div class="alert alert-success" role="alert">
 Votre message a bien été envoyé !
</div>';
         }else {
            $error = '<div class="alert alert-danger" role="alert">
  Cet utilisateur n\'existe pas!
</div>';
         }
 } else {
         $error =  $error = '<div class="alert alert-danger" role="alert">
 Veuillez compléter tous les champs
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
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        /*
** Style Simple Ecommerce Theme for Bootstrap 4
** Created by T-PHP https://t-php.fr/43-theme-ecommerce-bootstrap-4.html
*/
.bloc_left_price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 150%;
}
.category_block li:hover {
    background-color: #007bff;
}
.category_block li:hover a {
    color: #ffffff;
}
.category_block li a {
    color: #343a40;
}
.add_to_cart_block .price {
    color: #c01508;
    text-align: center;
    font-weight: bold;
    font-size: 200%;
    margin-bottom: 0;
}
.add_to_cart_block .price_discounted {
    color: #343a40;
    text-align: center;
    text-decoration: line-through;
    font-size: 140%;
}
.product_rassurance {
    padding: 10px;
    margin-top: 15px;
    background: #ffffff;
    border: 1px solid #6c757d;
    color: #6c757d;
}
.product_rassurance .list-inline {
    margin-bottom: 0;
    text-transform: uppercase;
    text-align: center;
}
.product_rassurance .list-inline li:hover {
    color: #343a40;
}
.reviews_product .fa-star {
    color: gold;
}


    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Produits disponibles </h1>
     
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

$result = mysqli_query($connexion," SELECT personne.nom as nom,produit.img as img,produit.couleur,produit.discription,produit.prix ,produit.nom  FROM produit,personne WHERE produit.id_opt=personne.id AND personne.nom='$var' AND categorie='LUNETTES DE VUE'"); 
if($result){ $nbpharma=mysqli_num_rows($result);

  if($nbpharma >0){  
    echo '<div class="container">';  
   echo '<div class="row">';
     echo'<div class="col">';
     echo "<h3>LUNETTES DE VUE</h3>";
            echo '<div class="row">';
  echo "<table >\n";
      
echo "<tr>\n";
$k=0;
while ($nbpharma>0 && $pharma=mysqli_fetch_array($result)) {  $pharma["nom"];?>

   <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
      <?php  echo "  <td>\n"; ?>

              
                     <?php   echo "<img class=\"card-img-top\"src=pro/img/".$pharma["img"].">\n";?>
                        <div class="card-body">
                            
                           <?php echo "<h3><a href=\"messag.php?id=".$var."&r=".$pharma["img"]."\"><span><strong><em>".$pharma["nom"]."&nbsp;&nbsp;&nbsp;<img src=include/env.png></em></strong></span></a></h3>\n";?>

                              <h5 class="card-title"><?php echo $pharma["couleur"]; ?></h5>
                               <h6 class="card-title"><?php echo $pharma["discription"]; ?></h6>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?php echo$pharma["prix"]; ?></p>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div></div></div>
               <?php echo "</td>\n";?>
        <?php $nbpharma--;
$k=$k+1;
if($k==3){
    $k=0;
echo "</tr>\n";
echo "<tr>\n";
}
}echo "</tr>\n";
echo "</table>\n";
echo " </div>";echo " </div>";
echo " </div>";echo " </div>";}

else{
    echo "<p>Categorie 'LUNETTES DE VUES' indisponible </p>";
         }
}else {
   echo "erreur dans la requete";  
   echo "le message d'erreur est : " .mysqli_error($connexion);
}
?>
 <?php
$connexion = mysqli_connect("localhost", "root", "","tsante2");
mysqli_set_charset($connexion,"utf8");
    if (mysqli_connect_errno())
      {
  die("Erreur de connexion".mysqli_connect_error());
      }
    else {
      
    }

$result = mysqli_query($connexion," SELECT personne.nom as nom,produit.img as img,produit.couleur,produit.discription,produit.prix ,produit.nom  FROM produit,personne WHERE produit.id_opt=personne.id AND personne.nom='$var' AND categorie='LUNETTES DE SOLEIL'"); 
if($result){ $nbpharma=mysqli_num_rows($result);

  if($nbpharma >0){  
    echo '<div class="container">';  
   echo '<div class="row">';
     echo'<div class="col">';
     echo "<h3>LUNETTES DE SOLEIL</h3>";
            echo '<div class="row">';
  echo "<table >\n";
      
echo "<tr>\n";
$k=0;
while ($nbpharma>0 && $pharma=mysqli_fetch_array($result)) {  $pharma["nom"];?>

   <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
      <?php  echo "  <td>\n"; ?>

              
                     <?php   echo "<img class=\"card-img-top\"src=pro/img/".$pharma["img"].">\n";?>
                        <div class="card-body">
                            
                           <?php echo "<h3><a href=\"messag.php?id=".$var."&r=".$pharma["img"]."\"><span><strong><em>".$pharma["nom"]."&nbsp;&nbsp;&nbsp;<img src=include/env.png></em></strong></span></a></h3>\n";?>
                              <h5 class="card-title"><?php echo $pharma["couleur"]; ?></h5>
                               <h6 class="card-title"><?php echo $pharma["discription"]; ?></h6>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?php echo$pharma["prix"]; ?></p>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div></div></div>
               <?php echo "</td>\n";?>
        <?php $nbpharma--;
$k=$k+1;
if($k==3){
    $k=0;
echo "</tr>\n";
echo "<tr>\n";
}
}echo "</tr>\n";
echo "</table>\n";
echo " </div>";echo " </div>";
echo " </div>";echo " </div>";}

else{
    echo "<p>Categorie 'LUNETTES DE SOLEIL' indisponible ";
         }
}else {
   echo "erreur dans la requete";  
   echo "le message d'erreur est : " .mysqli_error($connexion);
}
?>
    <?php
$connexion = mysqli_connect("localhost", "root", "","tsante2");
mysqli_set_charset($connexion,"utf8");
    if (mysqli_connect_errno())
      {
  die("Erreur de connexion".mysqli_connect_error());
      }
    else {
      
    }

$result = mysqli_query($connexion," SELECT personne.nom as nom,produit.img as img,produit.couleur,produit.discription,produit.prix ,produit.nom  FROM produit,personne WHERE produit.id_opt=personne.id AND personne.nom='$var' AND categorie='PRODUIT'"); 
if($result){ $nbpharma=mysqli_num_rows($result);

  if($nbpharma >0){  
    echo '<div class="container">';  
   echo '<div class="row">';
     echo'<div class="col">';
     echo "<h3>PRODUIT</h3>";
            echo '<div class="row">';
  echo "<table >\n";
      
echo "<tr>\n";
$k=0;
while ($nbpharma>0 && $pharma=mysqli_fetch_array($result)) {  $pharma["nom"];?>

   <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
      <?php  echo "  <td>\n"; ?>

              
                     <?php   echo "<img class=\"card-img-top\"src=pro/img/".$pharma["img"].">\n";?>
                        <div class="card-body">
                            
                           <?php echo "<h3><a href=\"messag.php?id=".$var."&r=".$pharma["img"]."\"><span><strong><em>".$pharma["nom"]."&nbsp;&nbsp;&nbsp;<img src=include/env.png></em></strong></span></a></h3>\n";?>
                              <h5 class="card-title"><?php echo $pharma["couleur"]; ?></h5>
                               <h6 class="card-title"><?php echo $pharma["discription"]; ?></h6>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?php echo$pharma["prix"]; ?></p>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div></div></div>
               <?php echo "</td>\n";?>
        <?php $nbpharma--;
$k=$k+1;
if($k==3){
    $k=0;
echo "</tr>\n";
echo "<tr>\n";
}
}echo "</tr>\n";
echo "</table>\n";
echo " </div>";echo " </div>";
echo " </div>";echo " </div>";}

else{
    echo "<p>Categorie 'PRODUIT' indisponible</p> ";
         }
}else {
   echo "erreur dans la requete";  
   echo "le message d'erreur est : " .mysqli_error($connexion);
}
?> 
    <?php
$connexion = mysqli_connect("localhost", "root", "","tsante2");
mysqli_set_charset($connexion,"utf8");
    if (mysqli_connect_errno())
      {
  die("Erreur de connexion".mysqli_connect_error());
      }
    else {
      
    }

$result = mysqli_query($connexion," SELECT personne.nom as nom,produit.img as img,produit.couleur,produit.discription,produit.prix ,produit.nom  FROM produit,personne WHERE produit.id_opt=personne.id AND personne.nom='$var' AND categorie='LENTILLES'"); 
if($result){ $nbpharma=mysqli_num_rows($result);

  if($nbpharma >0){  
    echo '<div class="container">';  
   echo '<div class="row">';
     echo'<div class="col">';
     echo "<h3LENTILLES</h3>";
            echo '<div class="row">';
  echo "<table >\n";
      
echo "<tr>\n";
$k=0;
while ($nbpharma>0 && $pharma=mysqli_fetch_array($result)) {  $pharma["nom"];?>

   <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
      <?php  echo "  <td>\n"; ?>

              
                     <?php   echo "<img class=\"card-img-top\"src=pro/img/".$pharma["img"].">\n";?>
                        <div class="card-body">
                            
                           <?php echo "<h3><a href=\"messag.php?id=".$var."&r=".$pharma["img"]."\"><span><strong><em>".$pharma["nom"]."&nbsp;&nbsp;&nbsp;<img src=include/env.png></em></strong></span></a></h3>\n";?>
                              <h5 class="card-title"><?php echo $pharma["couleur"]; ?></h5>
                               <h6 class="card-title"><?php echo $pharma["discription"]; ?></h6>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?php echo$pharma["prix"]; ?></p>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div></div></div>
               <?php echo "</td>\n";?>
        <?php $nbpharma--;
$k=$k+1;
if($k==3){
    $k=0;
echo "</tr>\n";
echo "<tr>\n";
}
}echo "</tr>\n";
echo "</table>\n";
echo " </div>";echo " </div>";
echo " </div>";echo " </div>";}

else{
    echo "<p>Categorie 'LENTILLES' indisponible</p>'  ";
         }
}else {
   echo "erreur dans la requete";  
   echo "le message d'erreur est : " .mysqli_error($connexion);
}
?> 

  <?php  

$result = mysqli_query($connexion,"SELECT * FROM personne,info_medecin where personne.id=info_medecin.id_med AND nom='$var' "); 
 
 $opti=mysqli_fetch_array($result);   $opti["nom"];
?>
                <br><br> 
              <div class="medica-appointment-card">
                            <h5 style="text-align: center;">Envoyer un message a <?php echo $opti["nom"];  ?></h5>
                            <form  method="POST">
                                <div class="form-group">

                                    <input class="form-control text-white"type="hidden" name="destinataire" value= <?php echo $var; ?>>
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" type="text"placeholder="Objet" name="objet" <?php if(isset($o)) { echo 'value="'.$o.'"'; } ?>>
                                </div>
                                <div class="form-group">
                                     <textarea   class="form-control "placeholder="Votre message" name="message"></textarea>
                                </div>
                                  <input class="btn medica-btn btn-2 m-2" type="submit" value="Envoyer" name="envoi_message" />
                                    <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
                            </form>
                        </div>          
        
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