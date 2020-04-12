   <?php

if(!$_SESSION['email'])
{

  header('Location: login.php');
}





 ?>
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->

<img src="includes/logo.png" alt="Logo">


<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Profile</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
Messages
</div>
<?php  if($_SESSION['role']=='opticien'  ) { ?>

<li class="nav-item">
  <a class="nav-link" href="edition.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Editer mes informations professional</span>
    

</a>
</li>
<?php   } ?>
<?php  if($_SESSION['role']=='medecin'  ) { ?>

<li class="nav-item">
  <a class="nav-link" href="edition_med.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Editer mes informations professional</span>
    

</a>
</li>

<?php

  $connexion=mysqli_connect("localhost","root","","tsante2");
                  

                  
                    $query="SELECT  id FROM rendez WHERE id_med='{$_SESSION['id']}' AND accept=0";
                    $query_run= mysqli_query($connexion , $query);
                    $row=mysqli_num_rows($query_run);
         




            


?>
<li class="nav-item">
  <a class="nav-link" href="medecin.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>liste des rendez-vous en attente d'accepter</span>  <?php  if ($row>0) {
    
 ?>
   <span class="badge badge-danger badge-counter">  <?php echo "$row\n";?>
</span>
<?php }?></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="rdv.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>liste de mes  rendez vous</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="today.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Mes  rendez vous d'aujourd'hui</span></a>
</li>

<?php   } ?>
    <?php



  $connexion=mysqli_connect("localhost","root","","tsante2");
                  

                  
                    $query="SELECT  id FROM messages WHERE id_destinataire='{$_SESSION['id']}' AND lu=0";
                    $query_run= mysqli_query($connexion , $query);
                    $row=mysqli_num_rows($query_run);
         




         


?>



<?php if ($_SESSION['role']=='pharmacie' OR $_SESSION['role']=='opticien'  ) { ?>
<li class="nav-item">
  <a class="nav-link" href="reception.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Boite de reception</span><?php  if ($row>0) {
    
 ?>
   <span class="badge badge-danger badge-counter">  <?php echo "$row\n";?>
</span>
<?php }?></a>
</li>
<?php   } ?>
<?php  if($_SESSION['role']=='opticien'  ) { ?>
<li class="nav-item">
  <a class="nav-link" href="ajouterpro.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Ajouter produit</span>
    

</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="register.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Supprimer produit</span>
    

</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="product.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Liste de mes produits</span>
    

</a>
</li>
<?php   } ?>
<?php  if($_SESSION['role']=='pharmacie'  ) { ?>
<li class="nav-item">
  <a class="nav-link" href="edition_pharma.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Editer Mes informations professionales</span>
    </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="garde.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Editer les jours de garde</span>
    </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="affiche.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Afficher mes jours de garde</span>
    </a>
</li>
<?php   } ?>

<?php  if($_SESSION['role']=='laboratoire'  ) { ?>
<?php
  $connexion=mysqli_connect("localhost","root","","tsante2");
                  

                    $query="SELECT  id FROM bilan WHERE id_labo='{$_SESSION['id']}' AND heure_rdv=\"00:00:00\" and jour_rdv=0000-00-00 ";
                    $query_run= mysqli_query($connexion , $query);
                    $row=mysqli_num_rows($query_run);

            


?>



<li class="nav-item">
  <a class="nav-link" href="edition_labo.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Editer mes informations professional</span>
    

</a>
</li>


<li class="nav-item">
  <a class="nav-link" href="rdv_labo.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>liste d'attente</span><?php  if ($row>0) {
    
 ?>
   <span class="badge badge-danger badge-counter">  <?php echo "$row\n";?>
</span>
<?php }?></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="accept.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>liste de mes rendez vous</span></a>
</li>

<?php   } ?>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

   
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

    

      
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
               <?php  echo $_SESSION['email']; ?>
                  
                </span>
               
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
          
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 Deconnexion
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
Prêt à partir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
Sélectionnez "Déconnexion" ci-dessous si vous êtes prêt à mettre fin à votre session ..</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Deconnexion</button>

          </form>


        </div>
      </div>
    </div>
  </div>