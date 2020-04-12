<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
$msg = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = ? ORDER BY id DESC');
$msg->execute(array($_SESSION['id']));
$msg_nbr = $msg->rowCount();
?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

 
 <h3 style="text-align: center;">Votre boîte de réception</h3> <br> 
   <?php
   if($msg_nbr == 0) { echo '<div class="alert alert-primary" role="alert">
  <div class="alert alert-primary" role="alert">
Vous n\'avez aucun message...
</div>'; }
   while($m = $msg->fetch()) {
      echo'<div class="card mb-4 py-3 border-left-info">';
                echo'<div class="card-body">';
      $p_exp = $bdd->prepare('SELECT nom FROM personne WHERE id = ?');
      $p_exp->execute(array($m['id_expediteur']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['nom'];
   ?>
   <a href="lecture.php?id=<?= $m['id'] ?>"><?php if($m['lu'] == 1) { ?> <span style="color:grey"><?php } ?><b><?= $p_exp ?></b> vous a envoyé un message<br />
      <b>Objet:</b> <?= $m['objet'] ?><?php if($m['lu'] == 1) { ?></span><?php } ?></a><br />
   -------------------------------------<br/>
   <?php echo "</div></div>"; } ?>


  <?php
include('includes/scripts.php');

include('includes/footer.php');
?>
<?php } ?>
