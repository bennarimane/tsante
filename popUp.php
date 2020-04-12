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
<script type="text/javascript" src="jquery-3.3.1.js">
    
$(function() {
    $('.pop-up').hide();
    $('.pop-up').fadeIn(1000);
    $('.close-button').click(function (e) {
        $('.pop-up').fadeOut(700);
        $('#overlay').removeClass('blur-in');
        $('#overlay').addClass('blur-out');
        e.stopPropagation();
    });
});
</script>

<body>
    <div id="overlay" class="cover blur-in">
       <?php include"include/template/header.php" ?>

         <header class="bg-gra-02">
        <h1  style="color: white;" align="center"  >Testez 1 semaine, c'est satisfait</h1>
    </header>
           <div class="s003"   style="background-image: url(include/layout/img/diet.jpg);">
                            <form method="POST" action="besoins.php">
                                <br><br>    <br><br> <br><br>    <br><br> <br><br>    <br><br>
            <button class="btn btn--radius-2 btn--red" type="submit" style="margin-left: 120%"> Se suivre &#187;</button></form>
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

                            <a href="include/layout/salle.html">Decouvrir</a>
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
                            <a href="recettes.php">Découvrir</a>
                        </div>
                    </div> 
                </div> 

                <div class="col-12 col-lg-4">
                    <div class="medica-blog-sidebar-area">
                        <!-- Medica Emergency Card -->
              <h2  style="color:#EF425C"; align="center">Les outils</h2>
                      <div class="latest-news-widget-area px-0">
                            <h5>Liste des aliments</h5>
                            <div class="widget-blog-post">
                                <!-- Single Blog Post -->
                                <div class="widget-single-blog-post d-flex">
                                    <div  class="widget-post-thumbnail pr-2">
                                     <img src="include/layout/img/table.jpg" alt="">
                                    </div>
        
                                </div>
                                <div>
                                    <form method="POST" action="liste.html">
                            <button class="btn btn--radius-2 btn--red" type="submit">Découvrir</button></form>
                        </div>
                            </div>
                        </div>
                        <!-- Latest News -->
                        <div class="latest-news-widget-area px-0">
                            <h5>Calcul de poids santé</h5>
                            <div class="widget-blog-post">

                                <div class="widget-single-blog-post d-flex">
                                    <div class="widget-post-thumbnail pr-2">
                                        <img src="include/layout/img/calcul.jpg" alt="">
                                    </div>

                                </div>
                                <!-- Single Blog Post -->
                               <div>
                                <form method="POST" action="calcul.php" >
                            <button class="btn btn--radius-2 btn--red" type="submit"></a>  Calculer</button>
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
                                        <form method="POST" action="besoins.php">
                            <button class="btn btn--radius-2 btn--red" type="submit">Découvrir</button></form>
                        </div>
                            </div>
                        </div>
                          <iframe width ="450" height ="300"  src="https://www.youtube.com/embed/Uti2j1G9cT4?"> </iframe>
                    </div>

                </div>
            </div>
        </div>
 </section>
 
<<?php include"include/template/footer.php" ?>

    </div>
    <div class="row pop-up">
        <div class="box small-6 large-centered">
            <a href="#" class="close-button">&#10006;</a>
        <main>
            
            <h1><strong>Calculer Votre IMC</strong></h1>
            <form id="myForm">

                <div class="weight">
                    <input type="text" name="weight" id="weight" value="" placeholder=" Poids (kg)" />
                </div>
                <div class="height">
                    <input type="text" name="height" id="height" value="" placeholder=" Taille (cm)" />
                </div>
            </form>

            <button class="first" id="but" style="  background: #fa4251;">Résultat</button>
            <div class="result" id="result"> </div>
            <div class="descr" id="descr"></div>
            <br>
            <button class="reset" id="reset"   style="background: #fa4251;"> <i class="fa fa-refresh" aria-hidden="true"></i> Recalculer </button>
            <div class="info"> <i class="fa fa-info-circle" id="info" aria-hidden="true"></i> </div>
                    <!--            Modal window-->

            <div class="modal" id="modal">
                <p><strong>Indicateur IMC (indice de masse corporelle) </strong> est une formule mathématique simple qui décrit indirectement la teneur en graisse corporelle en fonction de la proportion de poids corporel mesurée en kilogrammes par rapport à la taille en mètres.</p>

                <h2>Gammes de valeurs IMC: </h2>
                <ul>
                    <li> moins de 16 ans - famine</li>
                    <li>16 - 16.99 - réveil</li>
                    <li>17 - 18,49 - insuffisance pondérale</li>
                    <li>18,5 - 24,99 - valeur correcte</li>
                    <li>25 - 29.99 - en surpoids</li>
                    <li>30 - 34.99 - I degré d'obésité</li>
                    <li>35 - 39,99 - II degré d'obésité</li>
                    <li>plus de 40  - obésité extrême</li>
                </ul>

                <i class="fa fa-times" aria-hidden="true" id="x"></i>
            </div>
            

        </main>

    </div>
</body>
</html>



<script type="text/javascript">
    var button = document.getElementById("but");
        var descr = document.getElementById("descr");
        var clearButt = document.getElementById("reset");
        var info = document.getElementById("info");
        var x = document.getElementById("x");
        var modal = document.getElementById("modal");
        
        //calculator //

        button.addEventListener("click", function() {
            var weight = parseInt(document.getElementById("weight").value);
            var height = parseInt(document.getElementById("height").value);

            var result = document.querySelector("#result");
            button.classList.add("firstHide");


            var bmi = (weight / Math.pow((height / 100), 2)).toFixed(2);

            if (bmi === "NaN") {
                result.innerHTML = "S'il vous plaît entrer les données correctes"
            } else {
                result.innerHTML = "Votre IMC est " + bmi;
                descr.innerHTML = "";
            };



            if (bmi < 16) {
                descr.innerHTML = "famine";
                descr.classList.add("haut risque");
            } else if (bmi < 16.99) {
                descr.innerHTML = "émaciation";
                descr.classList.add("haut risque");
            } else if (bmi < 18.49) {
                descr.innerHTML = "insuffisance pondérale";
                descr.classList.add("risque");
            } else if (bmi < 24.99) {
                descr.innerHTML = "Le bon poids";
                descr.classList.add("normal");
            } else if (bmi < 29.99) {
                descr.innerHTML = "excédent de poids";
                descr.classList.add("risque");
            } else if (bmi < 34.99) {
                descr.innerHTML = "degré d'obésité I";
                descr.classList.add("haut risque");
            } else if (bmi < 39.99) {
                descr.innerHTML = "degré d'obésité II";
                descr.classList.add("haut risque");
            } else if (bmi > 40.00){
                descr.innerHTML = "Obésité extrême";
                descr.classList.add("haut risque");
            };

            clearButt.classList.add("resetShow");

        });


        // reset //

        clearButt.addEventListener("click", function() {

            result.innerHTML = "";
            descr.innerHTML = "";
            var inputs = document.getElementsByTagName("input");
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].type = "text") {
                    inputs[i].value = "";
                }
            }

            clearButt.classList.remove("resetShow");
            button.classList.remove("firstHide");

            descr.classList.remove("normal", "risk", "highRisk");
        });
        

        // modal window //
        
        info.addEventListener("click", function() {
            modal.classList.add("modalShow");
        })

        x.addEventListener("click", function() {
            modal.classList.remove("modalShow");
        })
        $(function() {
  $('.pop-up').hide();
  $('.pop-up').fadeIn(1000);
  
      $('.close-button').click(function (e) { 

      $('.pop-up').fadeOut(700);
      $('#overlay').removeClass('blur-in');
      $('#overlay').addClass('blur-out');
      e.stopPropagation();
        
    });
 });
</script>