 <?php  
 session_start();
    //$connexion=mysqli_connect('localhost','root','','tsante');
    $connexion=mysqli_connect('localhost','root','','tsante2');

if (isset($_POST['submit'])){

  $username=$_POST['username'];



  $userphone=$_POST['userphone'];

  $mail=$_POST['mail'];



if (empty($username)) {
  echo "entre votre nom";
}
elseif (empty($userphone)) {
    echo "entre votre numero de telephone";
}
elseif (empty($mail)) {
    echo "entre votre email";
  

}


elseif (empty($_POST['password'])) {
  echo "entre votre password";
}
elseif ($_POST['password']!=$_POST['repeatpassword']) {
echo "les mots de passe ne sont pas identiques";
}
else{
$sql_username=mysqli_query($connexion,"SELECT nom FROM personne WHERE nom='$username'");

$sql_email=mysqli_query($connexion,"SELECT 'email'FROM personne WHERE email='$mail'");
if (mysqli_num_rows($sql_username)>0) {
  echo "le nom est déja existe";
}elseif (mysqli_num_rows($sql_email)>0) {
    echo "erreur email est déja existe";
} 
else{


  if(isset($_FILES['fileupload']))
    {
  $fileupload=$_FILES['fileupload']['name'];
  $fileuploadTMP=$_FILES['fileupload']['tmp_name'];
  $folder="pro/includes/pha/";
move_uploaded_file($fileuploadTMP, $folder.$fileupload);
  if(isset($_FILES['fileupload']))
    {
  $fileupl=$_FILES['fileupl']['name'];
  $fileuplTMP=$_FILES['fileupl']['tmp_name'];
  $folder="uploadanddisplayimage/images/";
move_uploaded_file($fileuplTMP, $folder.$fileupl);
$password=md5($_POST['password']);
  $longueurkey=12;
    $key= "";
    for($i=1;$i<$longueurkey;$i++){
      echo $key;
      $key.= rand();
    }
 if(isset($_POST['captcha'])) {
   if($_POST['captcha'] == $_SESSION['captcha']) {
 $query=mysqli_query($connexion,"INSERT INTO personne VALUES('','$username','$userphone','$mail','$password','$fileupload','0','$fileupl','pharmacie','$key','')");
 $header="MIME-Version: 1.0\r\n";
                     $header.='From:"khadidjabrr71.com"<support@khadidjabrr71.com>'."\n";
                     $header.='Content-Type:text/html; charset="uft-8"'."\n";
                     $header.='Content-Transfer-Encoding: 8bit';
                     $message='
                     <html>
                        <body>
                           <div align="center">
                              <a href="http://localhost/tsante1/confirmation.php?username='.urlencode($username).'&key='.$key.'">Confirmez votre compte !</a>
                           </div>
                        </body>
                     </html>
                     ';
                     mail($mail, "Confirmation de compte", $message, $header);  
die('inscription terminée vous pouvez <a href="pro/login.php"> connecter </a>');
 } else {
      echo "Captcha invalide...";
   }
}

}}

}
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
  </head>
  <body>
    <div class="s012" style=" background: url(include/layout/img/s.jpg);">

      <form method="POST" action="" enctype="multipart/form-data">
        <fieldset>
          <legend>inscription</legend>
        </fieldset>
        <div class="inner-form">
          <header>
            <div class="travel-type-wrap">
              <div class="item ">
                <div class="group-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                      <img src="include/layout/img/icons/1.png" alt="">
                  </svg>
                </div>
                <a href="sign_med.php"><span>MEDECIN</span></a>
              </div>
              <div class="item active">
                <div class="group-icon">
                
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                 <img src="include/layout/img/icons/2.png" alt="">
                  </svg>
                </div>
                 <a href="sign_pharma.php"> <span>PHARMACIE</span></a>
              </div>
              <div class="item" > 
                <div class="group-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                  <img src="include/layout/img/icons/3.png" alt="">
                  </svg>
                </div>
              <a href="sign_opti.php">    <span>OPTICIEN</span></a>
              </div>
                 <div class="item" > 
                <div class="group-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                  <img src="include/layout/img/icons/labo.png" alt="">
                  </svg>
                </div>
              <a href="sign_labo.php">    <span>LABORATOIRE</span></a>
              </div>
            </div>
          </header>
          <div class="main-form" id="main-form">
            <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="username" > Nom <span style="color: red">*</span></label>
                  <input placeholder="Votre nom"   id="pseudo"   type="text" name="username" />
                </div>
              </div>
            </div>
    
              <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="userphone" > Numero de téléphone<span style="color: red">*</span></label>
                  <input   placeholder="Votre phone"   id="phone"   type="text" name="userphone" />
                </div>
              </div>
            </div>
             <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="mail" > Email<span style="color: red">*</span></label>
                  <input  placeholder="Votre email"   id="mail"   type="mail" name="mail" />
                </div>
              </div>
            </div>
       
        

                <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                              
 <label for="image" > Photo de profil<span style="color: red">*</span></label>
                  <input type="file" name="fileupload" id="avatar">
                </div>
              </div>
            </div>
                    <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                         <label for="password" > <span style="color: red">*</span>mot de passe</label>
                        <input type="password" name="password"  placeholder="Votre mot de passe" id="mdp"  />
                </div>
              </div>
            </div>
                    <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
         <label for="repeatpassword" > <span style="color: red">*</span>confirmer votre mot de passe</label>
                     <input placeholder="Confirmez votre mot de passe" id="mdp2" type="password" name="repeatpassword" />
                </div>
              </div>
            </div>
                 <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                              
 <label for="image" >Capture diplôme<span style="color: red">*</span></label>
                  <input type="file" name="fileupl" id="avatar">
                </div>
              </div>
            </div>
                <div class="input-group">
              
         
                       <img src="captcha.php"  />
   <input type="text" placeholder="0000" name="captcha" />
               
            </div>
            <div class="row last">
              <input class="btn-search" type="submit"name="submit" value="s'inscrire"/>
            
            </div>
              <a href="pharma/login.php">se connecter</a>
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
