<?php
session_start();
if (isset($_POST['submit'])) {
$pseudo =htmlspecialchars(trim($_POST['pseudo']));
$password =htmlspecialchars(trim($_POST['password']));
if (empty($pseudo)) {
    echo "veuillez saisir votre pseudo</br>";
}elseif (empty($password)) {
echo "veuillez saisir votre mot de passe</br>";
}else {

$connexion=mysqli_connect('localhost','root','','tsante2');
$password=md5($password);


$login=mysqli_query($connexion,"SELECT * FROM personne WHERE email='$pseudo'AND password='$password' AND (role='user' OR role='admin')AND confirm=1 ");
$rows=mysqli_num_rows($login);
}
if ($rows ==1) {
    $_SESSION['pseudo']=$pseudo;
    while ($row1 =$login ->fetch_assoc()) {
    	$_SESSION['id_us']=$row1['id'];
    	$_SESSION['nom']=$row1['nom'];
        $_SESSION['role']=$row1['role'];
    }
    header('location:userProfil.php');
}else echo "email ou mot de passe inccorect";
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>:: Swift - Hospital Admin ::</title>
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
        <h1 class="title"><span>Tsanté</span>se connecter</h1>
        <div class="col-md-12">
            <form id="sign_in" method="POST" action="">
                
                <div class="input-group"> &nbsp; <span class="input-group-addon"> <i class="zmdi zmdi-email"></i> </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="pseudo" placeholder=" &nbsp;Votre email" required autofocus>
                    </div>
                </div>
                <div class="input-group">  &nbsp;<span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder=" &nbsp;Votre mot de passe" required>
                    </div>
                </div>
                <div>
              
                    <div class="text-center">
                       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="submit" class="btn btn-raised waves-effect g-bg-cyan "name="submit" value="se connecter"/>
                       <div class="m-t-10 m-b--5 align-center">
                <a href="sign-up.php">Créer un compte</a>
            </div>
           
                    </div>
              
                </div>
            </form>
        </div>
    </div>    
</div>
<div class="theme-bg"></div>

<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>
</html>