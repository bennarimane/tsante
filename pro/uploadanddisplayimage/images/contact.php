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
                        <h5 class="mb-50">Get in touch</h5>

                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn medica-btn btn-3 mt-3">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="content-sidebar">
                        <!-- Medica Emergency Card -->
                        <div class="medica-emergency-card mb-4">
                            <h5>For Emergencies</h5>
                            <h4>+0080 954 4557 884</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                        <!-- Medica Appointment Card -->
                        <div class="medica-contact-card">
                            <h5>Useful Information</h5>
                            <div class="mt-50"></div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <img src="include/layout/img/icons/alarm-clock.png" alt="">
                                </div>
                                <div class="contact-meta">
                                    <p>Monday - Friday 08:00 - 21:00 <br> Saturday and Sunday - CLOSED</p>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <img src="include/layout/img/icons/envelope.png" alt="">
                                </div>
                                <div class="contact-meta">
                                    <p>673 729 766 | 234 5678 900 <br> contact@business.com</p>
                                </div>
                            </div>
                            <div class="single-contact-info d-flex align-items-center">
                                <div class="contact-icon mr-30">
                                    <img src="include/layout/img/icons/map-pin.png" alt="">
                                </div>
                                <div class="contact-meta">
                                    <p>Lamas Carbajal Str, no 14-18 <br> 41770 Montellano</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Google Maps -->
    <div class="map-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="googleMap" class="googleMap"></div>
                </div>
            </div>
        </div>
    </div>

<<?php include"include/template/footer.php" ?>
