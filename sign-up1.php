
<?php
session_start();
   $connexion=mysqli_connect('localhost','root','','tsante2');
if (isset($_POST['submit'])) {
  $username=htmlspecialchars(trim($_POST['username']));
  $password=htmlspecialchars(trim($_POST['password']));
  $usermail=htmlspecialchars(trim($_POST['usermail']));
    $repeatpassword=htmlspecialchars(trim($_POST['repeatpassword']));
if ($username && $password && $repeatpassword && $usermail) {
  $sql_username=mysqli_query($connexion,"SELECT nom FROM personne WHERE nom='$username 'AND role='user'");
$sql_mail=mysqli_query($connexion,"SELECT email FROM personne WHERE email='$usermail' AND role='user'");
if (mysqli_num_rows($sql_username)>0) {
  echo '<div class="alert alert-primary" role="alert">
le nom est déja existe
</div>';
}if (mysqli_num_rows($sql_mail)>0) {
 
echo "email est deja existe";
}

if (strlen($username)>4) {
  if (strlen($password)>=6) {
  if($password==$repeatpassword){
         $password=md5($password);
 $longueurKey = 15;
                     $key = "";
                     for($i=1;$i<$longueurKey;$i++) {
                        $key .= mt_rand(0,9);}
        if(isset($_POST['captcha'])) {
   if($_POST['captcha'] == $_SESSION['captcha']) {
  
 
  $connexion =mysqli_connect('localhost','root','','tsante2');
  
    $query=mysqli_query($connexion,"
INSERT INTO personne VALUES('','$username','','$usermail','$password','','confirme','','user','$key','')
");  
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
                     mail($usermail, "Confirmation de compte", $message, $header);  
  die('inscription terminée vous pouvez <a href="sign-in.php"> connecter </a>');

  } else {
      echo '<div class="alert alert-primary" role="alert">
 Captcha invalide
</div>';
   }
}
   
  }else echo '<div class="alert alert-primary" role="alert">
 les mots de passes ne sont pas identiques!
</div>';


  }else echo '<div class="alert alert-primary" role="alert">
le mot de passe est trop court
</div>';
}else echo '<div class="alert alert-primary" role="alert">
le nom est trop court!
</div>';
}
}else {echo '<div class="alert alert-light" role="alert">
  veuillez saisir tous les champs!!
</div>';
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>s'inscrire:</title>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/login.css" rel="stylesheet">

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-cyan login-page authentication">
<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span>Tsanté</span>S'inscrire </h1>
        <div class="col-md-12">
            <form id="registor" class="col-xs-12"method="POST" action="">            
            <div class="input-group">
                <span class="input-group-addon">
                    &nbsp;<i class="zmdi zmdi-account"> <span style="color: red">*</span></i>
                </span>
              <div class="form-line">
                   <input  class="form-control"  placeholder=" &nbsp; votre nom"   id="pseudo"   type="text" name="username" />   
                </div>
                </div>
                <div class="input-group">
                <span class="input-group-addon">
                  &nbsp; <i class="zmdi zmdi-email"> <span style="color: red">*</span></i>
                 </span>
                <div class="form-line">
                   <input  class="form-control" placeholder=" &nbsp;votre email"   id="mail"   type="mail" name="usermail" />   
                </div>
            </div>
          
    
            <div class="input-group">
                <span class="input-group-addon">
                     &nbsp;<i class="zmdi zmdi-lock"><span style="color: red">*</span></i>
                </span>
                <div class="form-line">
                        <input type="password" name="password" class="form-control" placeholder=" &nbsp;Votre mot de passe" id="mdp"  />
                </div>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    &nbsp; <i class="zmdi zmdi-lock"><span style="color: red">*</span></i>
                </span>
                <div class="form-line">
                     <input class="form-control" placeholder=" &nbsp;Confirmez votre mot de passe" id="mdp2" type="password" name="repeatpassword" />
                </div>
            </div>
         
              <div class="form-line">
         
                        &nbsp;<img src="captcha.php"  />
   <input class="form-control" type="text" name="captcha" placeholder=" &nbsp;0000" />
               
            </div>
          
            <div id="result"></div>
            <div class="text-center">
                &nbsp;  <input type="submit" class="btn btn-raised waves-effect g-bg-cyan "name="submit" value="s'inscrire"/>
            </div>
            <div class="m-t-10 m-b--5 align-center">
                <a href="sign-in.php">se connecter</a>
            </div>
        </form>
        </div>
    </div>  
</div>
<div class="theme-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="include/layout/js/site.js"></script><!-- Custom Js -->
</body>
</html>