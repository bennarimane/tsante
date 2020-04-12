<?php
session_start();
if(!$_SESSION['email'])
{

	header('Location: login.php');
}





 ?>
<?php

$connexion=mysqli_connect("localhost","root","","tsante2");
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">



  <!-- Content Row -->
  <div class="row">
<?php

include('produit.php');

?>
  </div>

  <!-- Content Row -->





  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>