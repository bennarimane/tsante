<?php session_start(); 
 if(isset($_SESSION['pseudo'])){
$pseudo=$_SESSION['pseudo'];}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   <!-- Title  -->
    <title>santé| Accueil</title>

    <link rel="icon" href="include/layout/img/core-img/plus.png">
    <link rel="stylesheet" href="include/layout/css/core-style.css"media="all">
    <link rel="stylesheet" href="include/layout/css/style.css"media="all">
    <link rel="stylesheet" href="include/layout/css/socio.css"media="all">
    <link rel="stylesheet" href="include/layout/css/responsive.css"media="all">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="medica-load"></div>
        <img src="include/layout/img/core-img/plus.png" alt="logo">
    </div>

<?php 
 include "include/template/header.php";  ?>
   <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide height-600 bg-img" style="background-image: url(include/layout/img/sante.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms" style="text-align:center;">Tsanté</h2>
                                <h5 data-animation="fadeInUp" data-delay="400ms" style="text-align:center;">La vie est trop courte et votre santé est trop précieuse</h5>
                              
                                  <?php
               if(isset($_SESSION['pseudo'])){
              
                  
               } else {
                echo "<div class=\"slide-btn-group mt-50\" data-animation=\"fadeInUp\" data-delay=\"700ms\">\n";
                echo "<a href=\"sign-up.php\" class=\"btn medica-btn\" style=\"margin-left:35%;\">inscrire</a>\n";
                echo "<a href=\"sign-in.php\" class=\"btn medica-btn ml-2 btn-2\" style=\"margin-left:35%;\">Se connecter</a>\n";
                echo "</div>\n";
               }
          ?>      
                             

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide height-600 bg-img" style="background-image: url(include/layout/img/dentiste.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms" style="text-align:center;">Tsanté</h2>
                                <h5 data-animation="fadeInUp" data-delay="400ms" style="text-align:center;">La meilleure solution pour prendre vos rendez-vous par Internet.</h5>
                                                    <?php
               if(isset($_SESSION['pseudo'])){
              
                  
               } else {
                echo "<div class=\"slide-btn-group mt-50\" data-animation=\"fadeInUp\" data-delay=\"700ms\">\n";
                echo "<a href=\"sign-up.php\" class=\"btn medica-btn\" style=\"margin-left:35%;\">inscrire</a>\n";
                echo "<a href=\"sign-in.php\" class=\"btn medica-btn ml-2 btn-2\" style=\"margin-left:35%;\">Se connecter</a>\n";
                echo "</div>\n";
               }
          ?>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide height-600 bg-img" style="background-image: url(include/layout/img/s2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms" style="text-align:center;">Tsanté</h2>
                                <h5 data-animation="fadeInUp" data-delay="400ms" style="text-align:center;">un esprit sain dans un corps sain.</h5>
                                                  <?php
               if(isset($_SESSION['pseudo'])){
              
                  
               } else {
                echo "<div class=\"slide-btn-group mt-50\" data-animation=\"fadeInUp\" data-delay=\"700ms\">\n";
                echo "<a href=\"sign-up.php\" class=\"btn medica-btn\" style=\"margin-left:35%;\">inscrire</a>\n";
                echo "<a href=\"sign-in.php\" class=\"btn medica-btn ml-2 btn-2\" style=\"margin-left:35%;\">Se connecter</a>\n";
                echo "</div>\n";
               }
          ?>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Contact Info Area Start ***** -->

        <!-- About Contact -->
        <div class="medica-about-content section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="medica-about-text">
                            <h2>Bienvenue sur TSanté </h2>
                            <p><b>Tsante est destinée à vous en tant que  patient avec plusieurs services 
la prise des rendez-vous en ligne :   en réduisant le temps de recherche de votre professionnel  de santé  et les distances par l’affichage d’une liste de tous les médecins de Tlemcen , leurs adresses et leurs horaires de travail avec la possibilité de chercher par nom, commune et spécialité de votre médecin.
L’envoie des messages aux   Pharmacies/Opticiens : Pour passer des commandes en ligne , consulter les prix , et chercher la disponibilité des produit. 
 Et en tant que professionnel de santé par  offrir un system de gestion de rendez-vous disponible même en dehors des heures d’ouverture de votre cabinet.</b></p>
                     
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="medica-about-thumbnail">
                            <img src="include/layout/img/blog-4.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->

    <!-- ***** Services Area Start ***** -->
    <section class="medica-services-area " style="background-image: url(include/layout/img/images.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading white-heading">
                        <br>
                        <img src="include/layout/img/icons/hospital2.png" alt="">
                        <h2>Nos Services</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area wow fadeInUp" data-wow-delay="0.2s">
                        <img src="include/layout/img/icons/doctor.png" alt="">
                        <h5>Medecin</h5>
                        <p>Le service "Médecins"  vise à faciliter la recherche et la prise des rendez-vous auprès de professionnels  de santé</p>
                    </div>
                </div>
               
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area wow fadeInUp" data-wow-delay="0.5s">
                        <img src="include/layout/img/icons/medicine.png" alt="">
                        <h5>pharmacie</h5>
                        <p>Voir les pharmacie de garde et chercher la disponibilité de produit désiré</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-service-area wow fadeInUp" data-wow-delay="0.6s">
                        <img src="include/layout/img/icons/glasses.png" alt="">
                        <h5>Opticien</h5>
                        <p>Consulter les prix des Lunettes de soleil, lunettes de vues, Lentilles de contact et jumelles et autre produits optiques</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="single-service-area">
                        <img src="include/layout/img/icons/blood.png" alt="">
                        <h5>Laboratoire d'analyse</h5>
                        <p>Voir les Laboratoires d'analyses médicales à Tlemcen ainsi que les bilans disponible dans chaque LAM</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


   



 
  <br />
  <div >
      <h1 align="center">Comaintaire </h1>
   <form method="POST" id="comment_form" style="width: 100%; height: 10%; ">
    <div class="form-group">
     <input type="hidden" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" value= <?php  if(isset($_SESSION['pseudo'])){
echo $pseudo; } ?> >
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter votre commentaire" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Commenter" />
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>
    
<?php 

 include "include/template/footer.php";  ?>
<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_comment.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>
