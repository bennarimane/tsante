<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
 $_SESSION['id'];

if(isset($_SESSION['id'])) {

if(isset($_POST['forminscription'])) {

 $heure = $_POST['heure'];
  $heure1 = $_POST['heure1'];
   $jour = htmlspecialchars($_POST['jour']);

       $adresse = htmlspecialchars($_POST['adresse']);
   if( !empty($_POST['heure'])AND !empty($_POST['heure1'])AND ! empty($_POST['jour'])AND   !empty($_POST['adresse'])) {


          $reqid = $bdd->prepare("SELECT * FROM info_medecin WHERE id_med = ?");
               $reqid->execute(array($_SESSION['id']));
               $idexist = $reqid->rowCount();
               if($idexist =0) {
         
             $insertmbr = $bdd->prepare("INSERT INTO info_medecin(adresse, h_ov ,h_f,jour,id_med) VALUES(?,?,?,?,?)");
                     $insertmbr->execute(array($adresse,$heure,$heure1, $jour, $_SESSION['id']));
                  die('Votre information a été sauvegardée<a href="pro/edition_labo.php"> Retour </a>');
           
                 }else{  $insertmbr = $bdd->prepare("UPDATE info_medecin SET adresse = ? , h_ov = ? , jour =? WHERE id_med = ?");
                    $insertmbr->execute(array($adresse ,$heure,$heure1,$jour,$_SESSION['id']));
                                  die('Votre information a été changée<a href="pro/edition_labo.php"> Retour </a>');} 
             
         
 
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
if(isset($_POST['ajouter'])) {
 
   if(isset($_POST['des'])){
   $avec=$_POST['des'];}

   if(!empty($_POST['des']) ) {

$reqmail = $bdd->prepare("SELECT * FROM labo WHERE id_pro = ? ");
               $reqmail->execute(array ($_SESSION['id']));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
         
                $ins = $bdd->prepare("INSERT INTO labo(type,id_pro) VALUES(?,?)");
                     $ins->execute(array($avec, $_SESSION['id']));
               die('Votre information a été sauvegardée<a href="pro/edition_labo.php"> Retour </a>');
             
                 }else{  $ins= $bdd->prepare("UPDATE labo SET type= ? WHERE id_pro= ?");
                    $ins->execute(array($avec,$_SESSION['id']));
                    die('Votre information a été changée<a href="pro/edition_labo.php"> Retour </a>');} 
         
     
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}



?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container">
      <form method="POST" action="" >
        <fieldset>
          <legend style="text-align: center;">Ajouter</legend>
        </fieldset>
        <div class="form-group" >
     
       
      
                <div  class="form-group">
                    &nbsp; &nbsp;<label for="date" >adresse:<span style="color: red">*</span></label>
                  <input class="form-control form-control-user" type="text" placeholder="............"id="adresse" name="adresse" value="<?php if(isset($adresse)) { echo $adresse; } ?>"/>
                </div>
          
   
      
        
                <div  class="form-group" >
                  &nbsp; &nbsp;  <label for="time" >Heure d'ouverture:<span style="color: red">*</span></label>
                  <input class="form-control form-control-user" type="time" placeholder=".........."id="heure" name="heure"   value="<?php if(isset($heure)) { echo $heure; } ?>" required  />
                </div>
        

        
        
                <div  class="form-group" >
                    &nbsp; &nbsp;<label for="time" > Heure de fermeture:<span style="color: red">*</span></label>
                  <input class="form-control form-control-user" type="time" placeholder=".........."id="heure1" name="heure1"    value="<?php if(isset($heure1)) { echo $heure1; } ?>" required  />
                </div>
              </div>
           

        
                <div  class="form-group">
                    &nbsp; &nbsp;<label for="date" >jour:<span style="color: red">*</span></label>
                  <input  class="form-control form-control-user"type="text" placeholder="............"id="jour" name="jour" value="<?php if(isset($jour)) { echo $jour; } ?>"/>
                </div>
          
      

            
           
   

            <div >
              <input class="btn btn-primary btn-user btn-block" type="submit" name="forminscription" value="valider"/>
            
            </div>
        </div>
      </form>

    </div>
    <br><br>
      <div class="container">
<form  class="user" method="POST" action="" >
   
                                <div class="form-group" >
              <label>Type de bilan<span style="color: red">*</span></label>
                  <textarea class="form-control form-control-user" placeholder="descrption:"   id="des"   type="text" name="des"> </textarea>  
                </div>    <div class="form-group" >
              <input   class="btn btn-primary btn-user btn-block" type="submit"name="ajouter" value="Ajouter"/>
            
            </div></form>
</div>
<?php
include('includes/scripts.php');

include('includes/footer.php');
?>

<?php   
}?>