<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
if(isset($_SESSION['id_us']) AND !empty($_SESSION['id_us'])) {
   if(isset($_GET['id']) AND !empty($_GET['id'])) {
      $id_message = intval($_GET['id']);
      $msg = $bdd->prepare('DELETE FROM messages WHERE id = ? AND id_destinataire = ?');
      $msg->execute(array($_GET['id'],$_SESSION['id_us']));
      header('Location:receptionopti.php');
   }
} 
?>