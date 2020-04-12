<?php include('user_nbr_live.php'); ?>




    <header class="header-area">
 
        <div class="top-header-area gradient-background">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="h-100 d-md-flex justify-content-between align-items-center">
                         <div class="effect egeon">
    <div class="buttons">
      <a href="#" class="fb" title="Join us on Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      <a href="#" class="tw" title="Join us on Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      <a href="#" class="g-plus" title="Join us on Google+"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
      <a href="#" class="insta" title="Join us on Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
    </div>

  </div>
         <div class="top-header-menu">
                                <nav class="top-menu">
                                    <ul>

                                  <?php
               if(isset($_SESSION['pseudo'])){
                  $mst = $_SESSION['pseudo'];
                   echo "<li><a href=\"userProfil.php\" style=\"color:green\"><i class=\"icon fa fa-user\" aria-hidden=\"true\" style=\"color:green\"></i> $mst </li>";
                echo'<li><a href="logout.php"><i class="icon fa fa-unlock"></i>Déconnexion</a></li>';
               } else {
                echo '<li><a href="sign-in.php"><i class="icon fa fa-lock"></i>Connexion</a></li>';
                   echo '<li><a href="pro/login.php"><i ></i>Vous etre professional de santé ?</a></li>';

               }
          ?>  

                                   
                                     
                                    </ul>
                                </nav>
                            </div>
           
                                      </div>  
                        </div>
         
                </div>
            </div>
        </div>
        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 h-100">
                        <div class="main-menu h-100">
                            <nav class="navbar h-100 navbar-expand-lg">
                                <!-- Logo Area  -->
                                <a class="navbar-brand" href="index.php"><img src="include/layout/img/core-img/logo.png" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medicaMenu" aria-controls="medicaMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                                <div class="collapse navbar-collapse" id="medicaMenu">
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nos services</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="doctor.php">Medecin</a>
                                                <a class="dropdown-item" href="pharma.php">Pharmacie</a>
                                                 <a class="dropdown-item" href="opticien.php">Opticien</a>
                                                <a class="dropdown-item" href="labo.php">Laboratoire d'analyse</a>
                                                <a class="dropdown-item" href="health.php">Healthylife</a>
                                            </div>
                                        </li>
                                     
                                    
                                        <li class="nav-item">
                                            <a class="nav-link" href="blog.php">Actualités</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact_nous.php">Contact</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="FAQ.php">FAQ</a>
                                        </li>
                                        <meta charset="utf-8" />

                                    </ul>
                                    <!-- Search Form -->
                              
                                 
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>