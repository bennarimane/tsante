<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
 $_SESSION['id'];

if(isset($_SESSION['id'])) {

if(isset($_POST['forminscription'])) {

 $heure = $_POST['heure'];
  $heure1 = $_POST['heure1'];
    $adresse= $_POST['adresse'];
   $jour = htmlspecialchars($_POST['jour']);

       $adresse = htmlspecialchars($_POST['adresse']);

     $reqmail = $bdd->prepare("SELECT * FROM info_medecin WHERE id_med = ? ");
               $reqmail->execute(array ($_SESSION['id']));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
         
             $insertmbr = $bdd->prepare("INSERT INTO info_medecin(adresse,h_ov,h_f,jour,id_med) VALUES(?,?,?,?,?)");
                     $insertmbr->execute(array($adresse,$heure,$heure1, $jour, $_SESSION['id']));
              die('Votre information a été sauvegardée<a href="pro/edition_pharma.php"> Retour </a>');}
              else 
             
         {   $insertmbr = $bdd->prepare("UPDATE info_medecin SET adresse=?, h_ov=? ,h_f=?,jour=?  WHERE id_med = ?");
                    $insertmbr->execute(array($adresse,$heure,$heure1, $jour, $_SESSION['id']));
               die('Votre information a été changée<a href="pro/edition_pharma.php"> Retour </a>');}
 
  
}


if(isset($_POST['specialite'])) {
 
   if(isset($_POST['sp'])){
   $sp=$_POST['sp'];}

   if(!empty($_POST['sp']) ) {


         
                $ins = $bdd->prepare("INSERT INTO pharmacie(parapharma,id_pro) VALUES(?,?)");
                     $ins->execute(array($sp, $_SESSION['id']));
               die('Votre information a été sauvegardée<a href="pro/edition_pharma.php"> Retour </a>');
             
                 
     
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
                  <input class="form-control form-control-user" type="time" placeholder=".........."id="heure" name="heure"   value="<?php if(isset($heure)) { echo $heure; } ?>"   />
                </div>
        

        
        
                <div  class="form-group" >
                    &nbsp; &nbsp;<label for="time" > Heure de fermeture:<span style="color: red">*</span></label>
                  <input class="form-control form-control-user" type="time" placeholder=".........."id="heure1" name="heure1"    value="<?php if(isset($heure1)) { echo $heure1; } ?>"   />
                </div>
              </div>
           

        
                <div  class="form-group">
                    &nbsp; &nbsp;<label for="date" >jour:<span style="color: red">*</span></label>
                  <input  class="form-control form-control-user"type="text" placeholder="............"id="jour" name="jour" value="<?php if(isset($jour)) { echo $jour; } ?>"/>
                </div>
          
      

            
           
   

            <div >
              <input class="btn btn-primary " type="submit" name="forminscription" value="valider"/>
                          
            </div>
        </div>
      </form>
    </div>
    <div class="container">
      <form method="POST" action="" >
        <fieldset>
          <legend style="text-align: center;">Parapharmacie</legend>
        </fieldset>
        <div >
     
       
             <div   class="form-group">
                  <label for="sp" >specialite<span style="color: red">*</span></label>
                  <div class="input-select">
                     <select class="form-control form-control-user" id="sp" name="sp">
                      
                        <option value="oui">Oui </option>
                        <option value="non">Non </option>
                  
                      
                      </select> 
                  </div>
                </div>
   


            
           
   

            <div >
              <input  class="btn btn-primary " type="submit" name="specialite" value="valider"/>
       
            </div>
        </div>
      </form>
</div>
<?php
include('includes/scripts.php');

include('includes/footer.php');
?>

<?php   
}?>