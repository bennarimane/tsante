<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {

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
            $ins->execute(array($_SESSION['id'],$id_destinataire,$message,$objet));
            $error = '<div class="alert alert-success" role="alert">
 Votre message a bien été envoyé !
</div>';
         }else {
            $error = "Cet utilisateur n'existe pas...";
         }
 } else {
         $error =  '<div class="alert alert-danger" role="alert">
 Veuillez compléter tous les champs
</div>';
      }



   }

   $destinataires = $bdd->query('SELECT nom FROM personne ORDER BY nom');
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

<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

            

            <div class="container">
       <form method="POST"  class="user">
       
         <label>Destinataire:</label>
         <input  class="form-control form-control-user" type="text" name="destinataire" <?php if(isset($r)) { echo 'value="'.$r.'"'; } ?> />
        
         <br /><br />
         <label>Objet:</label>
         <input  class="form-control form-control-user"  type="text" name="objet" <?php if(isset($o)) { echo 'value="'.$o.'"'; } ?> />
         <br /><br />
      <label>Reponse:</label>
         <textarea  class="form-control form-control-user"   placeholder="Votre message" name="message"></textarea>
         <br /><br />
         <input class="btn btn-primary btn-block"  type="submit" value="Envoyer" name="envoi_message" />
         <br /><br />
          <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
           </form>

</div>
<br>
<br><?php 
include('includes/scripts.php');

include('includes/footer.php');
?>
<?php } ?>
