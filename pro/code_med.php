<?php
session_start();
$msg=$_SESSION['id'];
 ?>
<?php

    $connexion=mysqli_connect("localhost","root","","tsante2");
if(isset($_POST['registerbtn'])){
      
      $nom= $_POST['nom'];
      $age= $_POST['age'];
      $heure= $_POST['heure'];
      $jour= $_POST['jour']; 
   if(isset($_POST['sexe'])){
   $sexe =$_POST['sexe'];}
      if( $nom &&  $age && $sexe &&  $heure && $jour ){
             if ($password === $confirmpassword ) {

             	      $query="INSERT INTO rendez (nom, age ,sexe,heure,journe,accept,id_med,id_us) VALUES ('$nom','$age','$sexe','$heure','$jour','1','$msg','0')";
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
            	header('Location: rdv.php');
                      } }
                      else
                        {
                        $_SESSION['status']=" Vous devez remplir tous les champs";
              header('Location: rdv.php');
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
      	header('Location: rdv.php');


      }

      else
      {
      	      	$_SESSION['status']="base de donnée non modifié.";
      	header('Location: rdv.php');

      }



 }
    
 
    if(isset($_POST['delete_btn']))
    {
    	$id=$_POST['delete_id'];
    	$query="DELETE FROM rendez WHERE id='$id'";
    	 $query_run=mysqli_query($connexion, $query);
    	       if($query_run)
      {
      	$_SESSION['success']="Ligne supprimé.";
      	header('location: rdv.php');


      }

      else
      {
      	      	$_SESSION['status']="Echec de suppression.";
      	header('location: rdv.php');

      }
    }











?>