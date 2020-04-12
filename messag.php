<?php  
 session_start(); 
$var=$_GET["id"];
$var2=$_GET["r"];
?>
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
$bdd->query("SET NAMES UTF8");
if(isset($_SESSION['id_us']) AND !empty($_SESSION['id_us'])) {

   if(isset($_POST['envoi_message'])) {
 if(isset($_POST['destinataire'],$_POST['message'],$_POST['objet'],$_POST['produit']) AND !empty($_POST['destinataire']) AND !empty($_POST['message']) AND !empty($_POST['objet']) ) {
    $destinataire = htmlspecialchars($_POST['destinataire']);
         $message = htmlspecialchars($_POST['message']);
         $objet = htmlspecialchars($_POST['objet']);
           $produit = htmlspecialchars($_POST['produit']);
         $id_destinataire = $bdd->prepare('SELECT id FROM personne WHERE nom = ?');
            $id_destinataire->execute(array($destinataire));
              $dest_exist = $id_destinataire->rowCount();
                  if($dest_exist == 1) {
            $id_destinataire = $id_destinataire->fetch();
            $id_destinataire = $id_destinataire['id'];
            $ins = $bdd->prepare('INSERT INTO messages(id_expediteur,id_destinataire,objet,message,photo) VALUES (?,?,?,?,?)');
            $ins->execute(array($_SESSION['id_us'],$id_destinataire,$objet,$message,$produit));
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
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="include/layout/css/search_box.css">
         <link rel="stylesheet" href="style1234.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>santé | opticien</title>

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

 <h5 style="text-align: center;">Envoyer un message a <?php echo $var;  ?></h5>
     
                <br><br> 
              <div class="container">
                           
                            <form  method="POST" class="user">
                             
 <?php   echo "<img style=\"  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;\"src=pro/img/".$_GET["r"].">\n";
  ?>
                                    <input class="form-control form-control-user" type="hidden" name="destinataire" value= <?php echo $var; ?>>
                            
                                 
                                    <input class="form-control form-control-user" type="hidden" name="produit" value= <?php echo $r; ?>>
                             
                            
                                    <input  class="form-control form-control-user" placeholder="Objet" name="objet" <?php if(isset($o)) { echo 'value="'.$o.'"'; } ?>>
                            
                          
                                     <textarea   class="form-control "placeholder="Votre message" name="message"></textarea>
                             
                                  <input class="btn btn-primary "  type="submit" value="Envoyer" name="envoi_message" />
                                    <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
                            </form>
                        </div>          
   
<br><br>
<script type="text/javascript">

</script>

 <?php

 include "include/template/footer.php";  ?>

<?php
}
?>