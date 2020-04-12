<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `personne` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $nom = $row['nom'];
            $num_tlfn = $row['num_tlfn'];
            $email = $row['email'];
            $password = $row['password'];
            $query = "UPDATE  `personne` SET confirme= 1  where  `personne`.`id` = '$id';";
        }
     
        if(performQuery($query)){
            echo "Le compte a ete accepte.";
        }else{
            echo "Une erreur inconnue s'est produite. Veuillez réessayer.";
        }
    }else{
        echo "
Erreur est survenue.";
    }
    
?>
<br/><br/>
<a href="rep.php">
Retour</a>