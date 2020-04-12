<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
   if(isset($_GET['id']) AND !empty($_GET['id'])) {
      $id_message = intval($_GET['id']);
      $msg = $bdd->prepare('SELECT * FROM messages WHERE id = ? AND id_destinataire = ?');
      $msg->execute(array($_GET['id'],$_SESSION['id']));
      $msg_nbr = $msg->rowCount();
      $m = $msg->fetch();
      $p_exp = $bdd->prepare('SELECT nom FROM personne WHERE id = ?');
      $p_exp->execute(array($m['id_expediteur']));
      $p_exp = $p_exp->fetch();
      $p_exp = $p_exp['nom'];
?><?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
     <br /><br /><br />
   <h3 align="center">Lecture du message  №<?= $id_message ?></h3>
   <div align="center">
      <?php if($msg_nbr == 0) { echo "Erreur"; } else { ?>
      <b><?= $p_exp ?></b> vous a envoyé: <br /><br />
      <b>Objet:</b> <?= $m['objet'] ?><br><br>
       <img src="img/<?php echo $m['photo']?>" width="400">
      <br /><br />
      <b>Message:</b> <?= nl2br($m['message']) ?><br /> <br>
       <a href="reception.php">Boîte de réception</a>&nbsp;&nbsp;&nbsp;&nbsp;   <a  class="btn btn-secondary btn-icon-split" href="envoie.php?r=<?=$p_exp ?>&o=<?= urlencode($m['objet']) ?>"><span class="icon text-white-50">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Réponder</span></a> &nbsp;&nbsp;</a> 
      <a  class="btn btn-danger btn-icon-split" href="supprimer.php?id=<?= $m['id'] ?>">  <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Supprimer</span></a>
      <?php } ?>
   </div>

<?php
      $lu = $bdd->prepare('UPDATE messages SET lu = 1 WHERE id = ?');
      $lu->execute(array($m['id']));
   }

   ?> 

  <?php
include('includes/scripts.php');

include('includes/footer.php');
?>
<?php
} 
?>