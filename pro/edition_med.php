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


      $reqmail = $bdd->prepare("SELECT * FROM info_medecin WHERE id_med = ? ");
               $reqmail->execute(array ($_SESSION['id']));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
         
             $insertmbr = $bdd->prepare("INSERT INTO info_medecin(adresse, h_ov ,h_f,jour,id_med) VALUES(?,?,?,?,?)");
                     $insertmbr->execute(array($adresse,$heure,$heure1, $jour, $_SESSION['id']));
                       die('Votre information a été sauvegardée<a href="pro/edition_med.php"> Retour </a>');}
                else{  $insertmbr = $bdd->prepare("UPDATE info_medecin SET adresse=?, h_ov=? ,h_f=?,jour=?  WHERE id_med = ?");
                    $insertmbr->execute(array($adresse,$heure,$heure1, $jour, $_SESSION['id']));
                  die('Votre information a été changée<a href="pro/edition_med.php"> Retour </a>');}
           
                 
             
         
 
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}

if(isset($_POST['specialite'])) {
 
   if(isset($_POST['sp'])){
   $sp=$_POST['sp'];}

   if(!empty($_POST['sp']) ) {

  $reqid = $bdd->prepare("SELECT id FROM specialite WHERE nom = ?");
                     $reqid->execute(array($sp)); 
                     $data = $reqid->fetch ();
                     echo $data['id'];   

                     $reqmail = $bdd->prepare("SELECT * FROM medecin WHERE id_med = ? ");
               $reqmail->execute(array ($_SESSION['id']));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {$ins = $bdd->prepare("INSERT INTO medecin(id_sp,id_med) VALUES(?,?)");
                     $ins->execute(array($data['id'], $_SESSION['id']));
                  die('Votre information a été sauvegardée<a href="pro/edition_med.php"> Retour </a>');}
               else{ $ins = $bdd->prepare("UPDATE  medecin SET id_sp=?  WHERE id_med =? ");
                     $ins->execute(array($data['id'], $_SESSION['id']));
        die('Votre information a été changée<a href="pro/edition_med.php"> Retour </a>');}
             
                 
       
     
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
if(isset($_POST['ajouter'])) {
 
   if(isset($_POST['avec'])){
   $avec=$_POST['avec'];}

   if(!empty($_POST['avec']) ) {


                     $reqmail = $bdd->prepare("SELECT * FROM medecin WHERE id_med = ? ");
               $reqmail->execute(array ($_SESSION['id']));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                $ins = $bdd->prepare("INSERT INTO medecin(interv,i) VALUES(?,?)");
                     $ins->execute(array($avec, $_SESSION['id']));
                  die('Votre information a été sauvegardée<a href="pro/edition_med.php"> Retour </a>');}
                     else{
               
             
                  $insertmbr = $bdd->prepare("UPDATE medecin SET interv=?  WHERE id_med = ?");
                    $insertmbr->execute(array($avec, $_SESSION['id']));
                 die('Votre information a été changée<a href="pro/edition_med.php"> Retour </a>');}
         
     
   } 
                 
     else {
      $erreur = "Tous les champs doivent être complétés !";    
     
   }} 


if(isset($_POST['px'])) {
 
   if(isset($_POST['prix'])){
   $prix=$_POST['prix'];}

   if(!empty($_POST['prix']) ) {

$reqmail = $bdd->prepare("SELECT * FROM medecin WHERE id_med = ? ");
               $reqmail->execute(array ($_SESSION['id']));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
         
                $ins = $bdd->prepare("INSERT INTO medecin(prix,id_med) VALUES(?,?)");
                     $ins->execute(array($prix, $_SESSION['id']));
                          die('Votre information a été sauvegardée<a href="pro/edition_med.php"> Retour </a>');
               }
               else{   $ins = $bdd->prepare("UPDATE medecin SET prix= ? WHERE id_med = ?");
                    $ins->execute(array($prix,$_SESSION['id']));
                   die('Votre information a été changée<a href="pro/edition_med.php"> Retour </a>');}
             
                
         
     
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
if(isset($_POST['prx'])) {
 
   if(isset($_POST['prix'])){
   $prix=$_POST['prix'];}

   if(!empty($_POST['prix']) ) {


         
               
             
                 $insertmbr = $bdd->prepare("UPDATE medecin SET prix= ? WHERE id_med = ?");
                    $insertmbr->execute(array($prix,$_SESSION['id']));
         
     
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
              <input class="btn btn-primary " type="submit" name="forminscription" value="valider"/>
           
            </div>
        </div>
      </form>
</div>
<div class="container">
      <form method="POST" action="" >
        <fieldset>
          <legend style="text-align: center;">Ajouter votre specialite</legend>
        </fieldset>
        <div >
     
       
             <div   class="form-group">
                  <label for="sp" >specialite<span style="color: red">*</span></label>
                  <div class="input-select">
                            <select class="form-control form-control-user" id="sp" name="sp">
                      
                        <option value="cardiologue">cardiologue</option>
                        <option value="chirurgie  orthopedique et traumatologie">chirurgie orthopedique</option>
                        <option value="Gastroenterologue">Gastroenterologue</option>
                        <option value="Ophtalmologue">Ophtalmologue</option>
                        <option value="PSYCHIATRE">PSYCHIATRE</option>
                        <option value="Gynecologogie Obstetrique">Gynecologogie Obstetrique</option>
                        <option value="pneumologue">pneumologue</option>
                        <option value="Dermatologue">Dermatologue</option>
                          <option value="hématologie">hématologie</option>
                        <option value="Neurochirurgie">Neurochirurgie</option>
                        <option value="pediatre">pediatre</option>
                          <option value="Neuropathologie">Neuropathologie</option>
                        <option value="Radiologie">Radiologie</option>
                        <option value="generaliste">generaliste</option>
                        <option value="chirurgie dentaire">chirurgie dentaire</option>
                        <option value="chirurgie dentaire et ODF">chirurgie dentaire et ODF</option>
                      
                      </select> 
                  </div>
                </div>
   


            
           
   

            <div >
              <input  class="btn btn-primary " type="submit" name="specialite" value="valider"/>
            
            </div>

       
        </div>
      </form></div>
      <div class="container">
      <form method="POST" action="" >
        <fieldset>
          <legend style="text-align: center;">Convontion avec:</legend>
        </fieldset>
        <div >
     
            <div  class="form-group">
                    &nbsp; &nbsp;<label for="date" >avec:<span style="color: red">*</span></label>
                  <input class="form-control form-control-user" type="text" placeholder="............"id="avec" name="avec" value="<?php if(isset($avec)) { echo $avec; } ?>"/>
                </div>
   


            
           
   

            <div >
              <input  class="btn btn-primary " type="submit" name="ajouter" value="valider"/>
     
            </div>
        </div>
      </form>
    </div>
      <div class="container">
            <form method="POST" action="" >
        <fieldset>
          <legend style="text-align: center;">Prix de consultation:</legend>
        </fieldset>
        <div >
     
            <div  class="form-group">
                    &nbsp; &nbsp;<label for="date" >Prix de consultaion<span style="color: red">*</span></label>
                  <input class="form-control form-control-user" type="text" placeholder="............"id="prix" name="prix" value="<?php if(isset($prix)) { echo $prix; } ?>"/>
                </div>
   


            
           
   

            <div >
              <input  class="btn btn-primary " type="submit" name="px" value="valider"/>
          
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