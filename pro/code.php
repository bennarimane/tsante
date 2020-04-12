<?php
session_start();






 ?>
<?php

    $connexion=mysqli_connect("localhost","root","","tsante2");
if(isset($_POST['registerbtn'])){
      
      $username= $_POST['username'];
      $email= $_POST['email'];
      $password= $_POST['password'];
      $confirmpassword= $_POST['confirmpassword']; 
      $usertype= $_POST['usertype'];
             if ($password === $confirmpassword ) {

             	      $query="INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
                      $query_run= mysqli_query($connexion , $query);
                   if($query_run)
                         {
            	           //echo "Vous êtes bien inscrit";
            	           $_SESSION['success']="Profil admin bien ajouté";
                 	           header('Location: register.php');
                          }
                   else
                        {
            	           //echo "Erreur! vous n'êtes pas inscrit";
            	           $_SESSION['status']="Erreur!Vous n'etes pas ajouté";
            	           header('Location: register.php');
                        }
                                                }


            else
                      {
 	                      $_SESSION['status']=" Le mot de passe et le mot de passe confirmé ne sont pas les memes.";
            	header('Location: register.php');
                      } 





}
 
 if(isset($_POST['updatebtn']))
 {
 	$id=$_POST['edit_id'];
   $username=$_POST['edit_username'];
   $email=$_POST['edit_email'];
   $password=$_POST['edit_password'];
   $usertypeupdate=$_POST['update_usertype'];
   $query="UPDATE register SET username='$username',email='$email', password='$password' , usertype='$usertypeupdate' WHERE id='$id'";
   $query_run=mysqli_query($connexion, $query);

      if($query_run)
      {
      	$_SESSION['success']="base de donnée modifié.";
      	header('Location: register.php');


      }

      else
      {
      	      	$_SESSION['status']="base de donnée non modifié.";
      	header('Location: register.php');

      }



 }
    

     
    if(isset($_POST['delete_btn']))
    {
      $id=$_POST['delete_id'];
      $query=" DELETE FROM produit WHERE id='$id'";
       $query_run=mysqli_query($connexion, $query);
             if($query_run)
      {
        $_SESSION['success']="Ligne supprimé.";
        header('location: register.php');


      }

      else
      {
                $_SESSION['status']="Echec de suppression.";
        header('location: register.php');

      }
    }











?>