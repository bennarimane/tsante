<?php session_start(); ?>
<html>
<head>
  <meta charset="UTF-8">
   <link href="include/layout/css/stylePop.css" rel="stylesheet" />
  <title>Pop-up</title>
  <!--Copier from regime1-->
      <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="icon" href="include/layout/img/core-img/plus.png">
    <link rel="stylesheet" href="include/layout/css/core-style.css"media="all">
    <link rel="stylesheet" href="include/layout/css/style.css"media="all">
    <link rel="stylesheet" href="include/layout/css/socio.css"media="all">
    <link rel="stylesheet" href="include/layout/css/responsive.css"media="all">
    
             <!-- Favicon  -->
  <link rel="icon" href="img/core-img/plus.png">




</head>


<body>
    <div id="overlay" class="cover blur-in">
       <?php include"include/template/header.php" ?>

         <header class="bg-gra-02">
        <h1  style="color: blue;" align="center"  >Vie en bonne santé dans vos mains</h1>
    </header>
           <div class="s003"   style="background-image: url(include/layout/img/diet.jpg);">
                           
                                <br><br>    <br><br> <br><br>    <br><br> <br><br>    <br><br>
            
 </div>
 <section class="medica-blog-area section_padding_50">
     <div class="container">
            <div class="row">

                <div class="col-12 col-lg-8">

                    <!-- Single Blog Area Start  -->
                  <div class="single-blog-area">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                            <img src="include/layout/img/salle.jpg" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <h4>&#127955;Salle de sport</h4>
                           
                            <p>Découvrez les Salles de sport à Tlemcen avec l'aide de notre site.</p>

                            <a href="http://localhost/tsante1/salledesport.php">Decouvrir</a>
                        </div>
                    </div>

                    <!-- Single Blog Area Start  -->
                    <div class="single-blog-area">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                            <img src="include/layout/img/recette.jpg" alt="">
                            <!-- Post Date -->
                     
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">

                            <h4>&#127823;Nutrition</h4>
                            <p> un programme minceur pour perdre du poids durablement, sans faire souffrir votre corps, en dégustant de bons petits plats gourmands, naturels et variés.</p>
                            <a href="http://localhost/healthy/nut.html">Découvrir</a>
                        </div>
                    </div> 
                </div> 

                <div class="col-12 col-lg-4">
                    <div class="medica-blog-sidebar-area">
                        <!-- Medica Emergency Card -->
              <h2  style="color:#EF425C"; align="center"></h2>
                     
                        </div>
                        <!-- Latest News -->
                        <div class="latest-news-widget-area px-0">
                            <h5>Calcul de poids santé(votre IMC)</h5>
                            <div class="widget-blog-post">

                                <div class="widget-single-blog-post d-flex">
                                    <div class="widget-post-thumbnail pr-2">
                                        <img src="include/layout/img/calcul.jpg" alt="">
                                    </div>

                                </div>
                                <!-- Single Blog Post -->
                               <div>
                               
                           <a href="http://localhost/healthy/indexIMC.php">  Calculer</a>
                        </form>
                        </div>
                            </div>
                        </div>
                 
                      <div class="latest-news-widget-area px-0">
                            <h5>Besoins caloriques journaliers</h5>
                            <div class="widget-blog-post">
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex">
                                    <div  class="widget-post-thumbnail pr-2">
                                        <img src="include/layout/img/6.jpg" alt="">
                                    </div>
        
                                </div>
                        
                                      <div>
                                        <form method="POST" >
                            <a href="http://localhost/healthy/indexCal.php">Découvrir</a></form>
                        </div>
                            </div>
                        

                </div>
            </div>
        </div>
 </section>
 
<<?php include"include/template/footer.php" ?>

    </div>
   
    </div>
</body>
</html>



