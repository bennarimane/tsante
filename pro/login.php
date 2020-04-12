<?php
session_start();

include('includes/header.php'); 

if (isset($_POST['login_btn'])) {
  $email_login=$_POST['email'];
  $password_login=$_POST['password'];
if (empty($email_login)) {
    echo "veuillez saisir votre pseudo</br>";
}elseif (empty($password_login)) {
echo "veuillez saisir votre mot de passe</br>";
}else {

$connexion=mysqli_connect('localhost','root','','tsante2');
$password_login=md5($password_login);


$login=mysqli_query($connexion,"SELECT * FROM personne WHERE  email='$email_login'AND password='$password_login' AND (role='medecin' OR role='pharmacie' OR role='opticien' OR role='laboratoire') ");
$rows=mysqli_num_rows($login);
}
if ($rows ==1) {
    $_SESSION['email']=$email_login;
      while ($row1 =$login ->fetch_assoc()) {
    	$_SESSION['id']=$row1['id'];
    	$_SESSION['role']=$row1['role'];
    }
    header('location:index.php');
}else echo "email ou mot de passe inccorect";
}






?>




<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Se connecter!</h1>

              </div>

                <form class="user" action="" method="POST">

                    <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Votre adresse email">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Votre mot de passe">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Se connecter </button>
                    <hr>
                </form>

  <a style="text-align: center;"  href="../sign_med.php">Crée votre nouveau compte.</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
//include('includes/footer.php'); 
include('includes/scripts.php'); 
?>