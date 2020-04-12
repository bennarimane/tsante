<?php

session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Attribuer un rendez-vous </h6>
  </div>

  <div class="card-body">
               <?php
               $connexion=mysqli_connect("localhost","root","","tsante2");
                if(isset($_POST['edit_btn']))
{
	$id=$_POST['edit_id'];
	$query="SELECT id,jour_rdv,heure_rdv FROM bilan WHERE id='$id' ";
	$query_run=mysqli_query($connexion , $query);
	foreach ($query_run as $row) {
		
		?>

             <form action="code_labo.php" method="POST">
             	<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?> ">
            <div class="form-group">
                <label> Jour </label>
                <input type="date" name="edit_jour"  value="<?php echo $row['jour_rdv'] ?> " class="form-control" placeholder="Enter Jour">
            </div>
            <div class="form-group">
                <label>Heure</label>
                <input type="time" name="edit_heure" value="<?php echo $row['heure_rdv'] ?>"  class="form-control" placeholder="Enter heure">
            </div>
               <a href="rdv_labo.php" class="btn btn-danger"> RETOUR</a>
              <button  type="submit" name="updatebtn" class="btn btn-primary">VALIDER</button>
              </form>
        		<?php
	}
}
               ?>
      </form>





  </div>
</div>
</div>







<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

