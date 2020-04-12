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
      if( $username &&  $email && $password &&  $confirmpassword && $usertype ){
             if ($password === $confirmpassword ) {

             	      $query="INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
                      $query_run= mysqli_query($connexion , $query);
                   if($query_run)
                         {
            	           //echo "Vous êtes bien inscrit";
            	           $_SESSION['success']="Profil admin bien ajouté";
                 	           header('Location: rdv_labo.php');
                          }
                   else
                        {
            	           //echo "Erreur! vous n'êtes pas inscrit";
            	           $_SESSION['status']="Erreur!Vous n'etes pas ajouté";
            	           header('Location: rdv_labo.php');
                        }
                                                }


            else
                      {
 	                      $_SESSION['status']=" Le mot de passe et le mot de passe confirmé ne sont pas les memes.";
            	header('Location: accept.php');
                      } }
                      else
                        {
                        $_SESSION['status']=" Vous devez remplir tous les champs";
              header('Location: accept.php');
                      }






}
 
 if(isset($_POST['updatebtn']))
 {
 	$id=$_POST['edit_id'];
   $jour_rdv=$_POST['edit_jour'];
   $heure_rdv=$_POST['edit_heure'];
   $query="UPDATE bilan SET jour_rdv='$jour_rdv',heure_rdv='$heure_rdv' WHERE id='$id'";
   $query_run=mysqli_query($connexion, $query);

      if($query_run)
      {
      	$_SESSION['success']="Modification validée.";
      	header('Location: rdv_labo.php');


      }

      else
      {
      	      	$_SESSION['status']="Echec de modification.";
      	header('Location: rdv_labo.php');

      }



 }
    
 
    if(isset($_POST['delete_btn']))
    {
    	$id=$_POST['delete_id'];
    	$query="DELETE FROM bilan WHERE id='$id'";
    	 $query_run=mysqli_query($connexion, $query);
    	       if($query_run)
      {
      	$_SESSION['success']="Ligne supprimé.";
      	header('location: accept.php');


      }

      else
      {
      	      	$_SESSION['status']="Echec de suppression.";
      	header('location: accept.php');

      }
    }











?>