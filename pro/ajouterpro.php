<?php
session_start();
$var=$_SESSION['id'];
    $connexion=mysqli_connect('localhost','root','','tsante2');

if (isset($_POST['submit'])){

  $nom=$_POST['nom'];

  $couleur=$_POST['couleur'];

  $prix=$_POST['prix'];


  $des=$_POST['des'];

   if(isset($_POST['sp'])){
   $sp=$_POST['sp'];}

if (empty($nom)) {
  echo "enter le nom de produit";
}elseif (empty($couleur)) {
    echo "enter la couleur de produit";
}
elseif (empty($prix)) {
    echo "enter le prix de produit";
}

else{

  if(isset($_FILES['fileupload']))
    {
  $fileupload=$_FILES['fileupload']['name'];
  $fileuploadTMP=$_FILES['fileupload']['tmp_name'];
  $folder="img/";
move_uploaded_file($fileuploadTMP, $folder.$fileupload);

 $query=mysqli_query($connexion,"INSERT INTO produit VALUES('','$nom','$prix','$des','$couleur','$sp',$fileupload','$var')");

        die('Votre Produit a été bien ajouter<a href="pro/product.php"> Retour </a>');


}


}


}


?>
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container">
  <form  class="user" method="POST" action="" enctype="multipart/form-data">
       <div class="form-group">
                 
                    <input class="form-control form-control-user" placeholder="Nom de produit"   id="nom"   type="text" name="nom" />
                </div>
                    <div class="form-group">
             
                  <input class="form-control form-control-user" placeholder="Couleur de produit "   id="couleur"   type="text" name="couleur" />
                </div>
                    <div class="form-group">
                  
                  <input class="form-control form-control-user" placeholder="Prix de produit "   id="prix"   type="text" name="prix" />
                </div>

             <div   class="form-group">
                  <label for="sp" >categorie<span style="color: red">*</span></label>
                  <div class="input-select">
                     <select class="form-control form-control-user" id="sp" name="sp">
                      
                        <option value="LUNETTES DE VUE ">LUNETTES DE VUE </option>
                        <option value="LUNETTES DE SOLEIL">LUNETTES DE SOLEIL</option>
                        <option value="LENTILLES">LENTILLES</option>
                        <option value="PRODUIT">PRODUIT</option>
             
             
                      
                      </select> 
                  </div>
                </div>
                  <div class="form-group">
                              
 <label for="image" > Photo de Produit</label>
                  <input type="file" name="fileupload" id="avatar">
                </div>
                  <div class="form-group" >
               <label for="image" > Description</label>
                  <textarea class="form-control form-control-user" placeholder="descrption:"   id="des"   type="text" name="des"> </textarea>  
                </div> 
                <div class="form-group" >
              <input   class="btn btn-primary btn-block" type="submit"name="submit" value="Ajouter"/>
            
            </div> 
      </form>
    </div>
  <?php
include('includes/scripts.php');

include('includes/footer.php');
?>

