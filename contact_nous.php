<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="include/layout/css/socio.css">
    <title>santé | contact</title>

  <link rel="icon" href="include/layout/img/core-img/plus.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="include/layout/css/core-style.css">

    <link rel="stylesheet" href="include/layout/css/responsive.css">

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medica-load"></div>
        <img src="include/layout/img/core-img/plus.png" alt="logo">
    </div>
<?php include"include/template/header.php" ?>

    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url(include/layout/img/bg-img/hero5.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <!-- Title -->
                        <h3 class="breadcumb-title">Contact</h3>
                        <!-- Breadcumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Accuiel</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="medica-contact-area section_padding_100">
        <div class="container">
            <div class="row">
                <!-- Contact Form Area -->
                <div class="col-12 col-lg-8">
                    <div class="contact-form">
                        <h5 class="mb-50">Contact nous</h5>


<form method="POST" action="verification.php">
 <div class="row">
<div class="col-12 ">
	<input class="form-control" type="text" name="nom" id="nom" placeholder="Votre Nom" />
</div>

<div class="col-12 ">
<input  class="form-control" type="email" name="email" id="email" placeholder="Votre Email" />
</div>



<div class="col-12 ">
<input  class="form-control" type="text" name="sujet" id="sujet" placeholder="Quel est votre sujet ?" />
</div>
         <div class="col-12">
<textarea id="message" class="form-control"  name="message" placeholder="Votre Message" /></textarea>
</div>
         <div class="col-12">
<h3>Recopier ce chiffre ?</h3>
<img src="captcha.php" />
<input  class="form-control" type="text" name="captcha" style="70px;" /><br />
<p>
Tous les champs sont obligatoires
</p>
</div>
  <div class="col-12">
	<input class="btn medica-btn btn-3 mt-3" type="submit" value="Envoyez" />
</div>
</div>
</form>
</div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">
                        <!-- Medica Emergency Card -->
                        <div class="medica-emergency-card mb-4">
                            <h5>Numero_telephone</h5>
                            <h4>+213043345133</h4>
                            <p class="mb-0"></p>
                        </div>
                        <!-- Medica Appointment Card -->
                        <div class="medica-contact-card">
                            <h5>Informations utiles</h5>
                            <div class="mt-50"></div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <img src="include/layout/img/icons/alarm-clock.png" alt="">
                                </div>
                                <div class="contact-meta">
                                    <p>Chaque jours</p>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <img src="include/layout/img/icons/envelope.png" alt="">
                                </div>
                                <div class="contact-meta">
                                    <p> 043345133 | 234 5678 900 <br> Tsantetlm@gmail.com</p>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <img src="include/layout/img/icons/map-pin.png" alt="">
                                </div>
                                <div class="contact-meta">
                                    <p> 13000 Tlemcen <br> Algerie</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<<?php include"include/template/footer.php" ?>
