<?php
session_start();
if(!$_SESSION['email'])
{

	header('Location: login.php');
}

$id=$_SESSION['id'];
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2;charset=utf8', 'root', '');

if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
   if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
      $confirme = (int) $_GET['confirme'];
      $req = $bdd->prepare('UPDATE rendez SET accept = 1 WHERE id = ?');
      $req->execute(array($confirme));

   }
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM rendez WHERE id = ?');
      $req->execute(array($supprime));
   }
} 


$membres = $bdd->query("SELECT * FROM rendez WHERE  id_med='{$_SESSION['id']}' ORDER BY accept ASC");

 ?>
<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
Accpter ou refuser</h1>


  </div>

  <!-- Content Row -->
  <div class="row">
   <ul>

      <?php while($m = $membres->fetch()) { ?>
      <li><?= $m['id'] ?> : <?= $m['nom']  ?>-- <?= $m['prenom']  ?>--<?= $m['age'] ?>-- <?= $m['sexe'] ?>-- <?= $m['heure'] ?>-- <?= $m['journe'] ?><?php if($m['accept'] == 0) { ?> - <a class="btn btn-success" href="medecin.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a class="btn btn-danger" href="medecin.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
 <br>
      <?php } ?>

   </ul>
   <br /><br />
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>