<?php
    include('functions.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `personne` WHERE `personne`.`id_opt` = '$id';";
        if(performQuery($query)){
            echo "Le compte a ete rejete.";
        }else{
            echo "Une erreur inconnue s'est produite. Veuillez réessayer.";
        }

?>
<br/><br/>
<a href="rep-opt.php">Back</a>