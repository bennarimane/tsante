<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');

if(isset($_GET['username'], $_GET['key']) AND !empty($_GET['username']) AND !empty($_GET['key'])) {
   $pseudo = htmlspecialchars(urldecode($_GET['username']));
   $key = htmlspecialchars($_GET['key']);
   $requser = $bdd->prepare("SELECT * FROM personne WHERE nom= ? AND confirmekey = ?");
   $requser->execute(array($pseudo, $key));
   $userexist = $requser->rowCount();
   if($userexist == 1) {
      $user = $requser->fetch();
      if($user['confirm'] == 0) {
         $updateuser = $bdd->prepare("UPDATE personne SET confirm= 1 WHERE nom = ? AND confirmekey = ?");
         $updateuser->execute(array($pseudo,$key));
         echo "Votre compte a bien ete confirme !";
      } else {
         echo "Votre compte a deja ete confirme !";
      }
   } else {
      echo "L'utilisateur n'existe pas !";
   }
}
?>