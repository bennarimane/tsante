<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=tsante2', 'root', '');
 $_SESSION['id'];

if(isset($_SESSION['id'])) {

if(isset($_POST['forminscription'])) {

 $heure = $_POST['heure'];
  $heure1 = $_POST['heure1'];
   $jour = htmlspecialchars($_POST['jour']);
   if( !empty($_POST['heure'])AND !empty($_POST['heure1'])AND ! empty($_POST['jour']) ) {


      
      $reqmail = $bdd->prepare("SELECT * FROM garde WHERE id_pharma = ? ");
               $reqmail->execute(array ($_SESSION['id']));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
          
           
                      $insertmbr = $bdd->prepare("INSERT INTO garde(heure_g_o,heure_g_f ,jour_garde,id_pharma) VALUES(?,?,?,?)");
                     $insertmbr->execute(array($heure,$heure1, $jour, $_SESSION['id']));
                    die('Votre date de garde a ete bien ajoute <a href="index.php"> retour </a>');}
                     else {
                        $insertmbr = $bdd->prepare("UPDATE garde SET heure_g_o = ? , heure_g_f = ? , jour_garde =? WHERE id_pharma = ?");
                    $insertmbr->execute(array($heure ,$heure1,$jour,$_SESSION['id']));
                       die('Votre date de garde a ete bien modifier <a href="index.php"> retour </a>');
                     }

           
         
 
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}

if(isset($_POST['jour'])) {

 $heure = $_POST['heure'];
  $heure1 = $_POST['heure1'];
   $jour = htmlspecialchars($_POST['jour']);
   if( !empty($_POST['heure'])AND !empty($_POST['heure1'])AND ! empty($_POST['jour']) ) {

          
               
           
                    
              $insertmbr = $bdd->prepare("UPDATE garde SET heure_g_o = ? , heure_g_f = ? , jour_garde =? WHERE id_pharma = ?");
                    $insertmbr->execute(array($heure ,$heure1,$jour,$_SESSION['id']));
         
 
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
  <fieldset>
          <legend style="text-align: center;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Date de garde</legend>
        </fieldset>
  



<div class="container">
<form class="form-horizontal"  method="POST" action="">
<fieldset>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Heure d'ouverture:</label>  
  <div class="col-md-4">
  
    <input class="form-control input-md" type="time" placeholder=".........."id="heure" name="heure"   value="<?php if(isset($heure)) { echo $heure; } ?>" required  />
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Heure de fermeture:</label>  
  <div class="col-md-4">
<input  class="form-control input-md"  type="time" placeholder=".........."id="heure1" name="heure1"    value="<?php if(isset($heure1)) { echo $heure1; } ?>" required  />    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Jour de garde:</label>  
  <div class="col-md-4">
  <input   class="form-control input-md" type="date" placeholder="............"id="jour" name="jour" value="<?php if(isset($jour)) { echo $jour; } ?>"/>
    
  </div>
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
  
      <input   class="btn btn-primary" type="submit" name="forminscription" value="Ajouter"/>
  
  </div>
</div>

</fieldset>
</form>

</div>
<script type="text/javascript">

</script>


<?php
include('includes/scripts.php');

include('includes/footer.php');
?>

<?php   
}?>