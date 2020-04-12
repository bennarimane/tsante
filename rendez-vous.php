
<?php
session_start();
$var=$_GET["id"];
$msg=$_SESSION['id_us'];


$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');



if(isset($_POST['forminscription'])) {
   $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
   $age = htmlspecialchars($_POST['age']);
   if(isset($_POST['sexe'])){
   $sexe =$_POST['sexe'];}
 $heure = $_POST['heure'];
   $jour = htmlspecialchars($_POST['jour']);
   if(!empty($_POST['nom']) AND !empty($_POST['prenom'])AND !empty($_POST['age']) AND !empty($_POST['sexe'])AND !empty($_POST['heure'])AND !empty($_POST['jour']) ) {
      $nomlength = strlen($nom);
      if($nomlength <= 255) {
         
            
               $reqmail = $bdd->prepare("SELECT * FROM rendez WHERE heure = ? and id_med=? and journe=?");
               $reqmail->execute(array($heure,$var,$jour));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                              $reqid = $bdd->prepare("SELECT * FROM rendez WHERE id_med = ?and journe=?");
               $reqid->execute(array($var,$jour));
               $idexist = $reqid->rowCount();
               if($idexist <=10) {
                     $insertmbr = $bdd->prepare("INSERT INTO rendez(nom,prenom, age ,sexe,heure,journe,id_med,id_us) VALUES(?, ?,?,?,?,?,?,?)");
                     $insertmbr->execute(array($nom,$prenom,$age, $sexe,$heure,$jour,$var,$msg));
                  die('Votre rendez-vous est en attente de confirmation <a href="userprofil.php">Retour </a>');
                  }else{ echo "Liste de rendez-vous de ce jour pleine";} }
                  else {

                          echo "Rendez-vous occupé";


                  } 
               
             
         
      } 
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900|Poppins:700" rel="stylesheet" />
    <link href="css_ins/main.css" rel="stylesheet" />
        <link rel="icon" href="include/layout/img/core-img/plus.png">
            <title>santé| rendez vous</title>
  </head>
  <body>

    <div class="s012" style=" background: url(include/layout/img/prise.png);">

      <form method="POST" action="" >
        <fieldset>
          <legend>Prenez votre rendez-vous</legend>
        </fieldset>
        <div class="inner-form">
     
          <div class="main-form" id="main-form">
            <div class="row second">
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="username" > Nom:<span style="color: red">*</span></label>
                  <input type="text" placeholder="Entrer votre nom" id="nom" name="nom"  value="<?php if(isset($nom)) { echo $nom; } ?>" />
                </div>
              </div>
            
       
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="username" > Prenom:<span style="color: red">*</span></label>
                  <input type="text" placeholder="Entrer votre prenom" id="prenom" name="prenom"  value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
                </div>
              </div>

            </div>

             <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="adresse" >Age:<span style="color: red">*</span></label>
                  <input type="text" placeholder="Entrer votre age"id="age" name="age" value="<?php if(isset($age)) { echo $age; } ?>" />
                </div>
              </div>
            </div>
    
     <div class="row second">
              <div class="input-wrap">
             
                <div class="input-field">
                  <label for="sp" >sexe<span style="color: red">*</span></label>
                  <div class="input-select">
                       <select class="form-control" id="sexe" name="sexe">
                      
                        <option value="femme">femme</option>
                        <option value="homme">homme</option>
                                              </select> 
                  </div>
                </div>
              </div>
              <div class="input-wrap">
        
                <div class="input-field">
                   <label for="time" > horaire:<span style="color: red">*</span></label>
                  <input  type="time" placeholder=".........."id="heure" name="heure"  min="08:00:00" max="16:00:00"  value="<?php if(isset($heure)) { echo $heure; } ?>"min="8:00" max="16:00" required  />
                </div>
              </div>
           
 <div class="input-wrap">
        
                <div class="input-field">
                   <label for="date" >jour:<span style="color: red">*</span></label>
                  <input  type="date" placeholder="............"id="jour" name="jour"min="2019-06-11" max="2020-12-31" value="<?php if(isset($jour)) { echo $jour; } ?>"/>
                </div>
              </div>
            </div>
   
            
           
          </div>

            <div class="row last">
              <input class="btn-search" type="submit" name="forminscription" value="valider"/>
            
            </div>
        </div>
      </form>
    </div>
    <script src="js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
    <script src="js_ins/extention/flatpickr.js"></script>
    <script>
      flatpickr(".datepicker",
      {
        dateFormat: "m/d/y"
      });
      var btnTypes = document.querySelectorAll('.travel-type-wrap .item')
      for (let i = 0; i < btnTypes.length; i++)
      {
        btnTypes[i].addEventListener('click', function()
        {
          for (let i = 0; i < btnTypes.length; i++)
          {
            btnTypes[i].classList.remove('active')
          }
          btnTypes[i].classList.add('active')
        })
      }

    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
