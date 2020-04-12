 <?php  
    $connexion=mysqli_connect('localhost','root','','tsante');
if (isset($_POST['submit'])){

  $username=$_POST['username'];

  $adresse=$_POST['adresse'];

  $userphone=$_POST['userphone'];

  $mail=$_POST['mail'];
  $day=$_POST['day'];

  $time=$_POST['time'];
  
  $sp=$_POST["sp"];

if (empty($username)) {
  echo "enter votre nom";
}elseif (empty($adresse)) {
    echo "enter votre adresse";
}
elseif (empty($userphone)) {
    echo "enter votre numero de telephone";
}
elseif (empty($mail)) {
    echo "enter votre email";
}
elseif (empty($day)) {
    echo "enter votre jours de travail";
}
elseif (empty($time)) {
    echo "enter votre adresse";
}
elseif (empty($sp)) {
    echo "enter votre spécialité";
}elseif (empty($_POST['password'])) {
  echo "enter votre password";
}
elseif ($_POST['password']!=$_POST['repeatpassword']) {
echo "les mots de passe ne sont pas identiques";
}
else{
$sql_username=mysqli_query($connexion,"SELECT 'nom'FROM pro WHERE 'nom'='$username'");

$sql_email=mysqli_query($connexion,"SELECT 'email'FROM pro WHERE 'email'='$mail'");
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
  $folder="uploadanddisplayimage/images/";
move_uploaded_file($fileuploadTMP, $folder.$fileupload);
$password=md5($_POST['password']);
 $query=mysqli_query($connexion,"INSERT INTO pro VALUES('','$username','$adresse','$userphone','$mail','$day','$time','$sp','$password','$fileupload')");
 die('inscription terminée att la confirmation</a>');
}

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
    <div class="s012">
      <form method="POST" action="" enctype="multipart/form-data">
        <fieldset>
          <legend>inscription</legend>
        </fieldset>
        <div class="inner-form">
          <header>
            <div class="travel-type-wrap">
              <div class="item active">
                <div class="group-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                      <img src="include/layout/img/icons/doctor.png" alt="">
                  </svg>
                </div>
                <a href="sign_med.php"><span>MEDECIN</span></a>
              </div>
              <div class="item">
                <div class="group-icon">
                
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                 <img src="include/layout/img/icons/medicine.png" alt="">
                  </svg>
                </div>
                 <a href="sign_pharma.php"> <span>PHARMACIE</span></a>
              </div>
              <div class="item" > 
                <div class="group-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                  <img src="include/layout/img/icons/glasses.png" alt="">
                  </svg>
                </div>
              <a href="sign_opti.php">    <span>OPTICIEN</span></a>
              </div>
        
            </div>
          </header>
          <div class="main-form" id="main-form">
            <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="username" > le nom de medecin<span style="color: red">*</span></label>
                  <input placeholder="votre nom"   id="pseudo"   type="text" name="username" />
                </div>
              </div>
            </div>
             <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="adresse" > adresse de medecin<span style="color: red">*</span></label>
                  <input placeholder="votre adresse"   id="adresse"   type="text" name="adresse" />
                </div>
              </div>
            </div>
              <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="userphone" > numero de téléphone<span style="color: red">*</span></label>
                  <input   placeholder="votre phone"   id="phone"   type="text" name="userphone" />
                </div>
              </div>
            </div>
             <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                  <label for="mail" > email de medecin<span style="color: red">*</span></label>
                  <input  placeholder="votre email"   id="mail"   type="mail" name="mail" />
                </div>
              </div>
            </div>
       
        
     <div class="row second">
              <div class="input-wrap">
        
                <div class="input-field">
                  <label for="day" >les jours de travail<span style="color: red">*</span></label>
                <input  placeholder="votre jour de travail"   id="day"   type="text" name="day" />
                </div>
              </div>
              <div class="input-wrap">
        
                <div class="input-field">
                   <label for="time" > horaire<span style="color: red">*</span></label>
                  <input   placeholder="votre time"   id="time"   type="text" name="time"  />
                </div>
              </div>
              <div class="input-wrap">
             
                <div class="input-field">
                  <label for="sp" >specialite<span style="color: red">*</span></label>
                  <div class="input-select">
                       <select class="form-control" id="sp" name="sp">
                      
                        <option value="generaliste">generaliste</option>
                        <option value="cardio">cardio</option>
                        <option value="generaliste">dantiste</option>
                        <option value="cardio">cardio</option>
                        <option value="generaliste">generaliste</option>
                        <option value="cardio">cardio</option>
                      </select> 
                  </div>
                </div>
              </div>

            </div>
                <div class="row">
              <div class="input-wrap">
            
                <div class="input-field">
                              
 <label for="image" > fichier<span style="color: red">*</span></label>
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
            <div class="row last">
              <input class="btn-search" type="submit"name="submit" value="s'inscrire"/>
            
            </div>
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
