<?php

session_start();
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Edit Profile </h6>
  </div>

  <div class="card-body">
               <?php
               $connexion=mysqli_connect("localhost","root","","tsante2");
                if(isset($_POST['edit_btn']))
{
	$id=$_POST['edit_id'];
	$query="SELECT * FROM personne WHERE id='$id' ";
	$query_run=mysqli_query($connexion , $query);
	foreach ($query_run as $row) {
		
		?>

             <form action="code.php" method="POST">
             	<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?> ">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username"  value="<?php echo $row['nom'] ?> " class="form-control" placeholder="Entrer nom">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value="<?php echo $row['email'] ?>"  class="form-control" placeholder="Entrer Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="<?php echo $row['password'] ?>"  class="form-control" placeholder="Entrer mot de passe">
            </div>
                        <div class="form-group">
                <label>Type</label>
                <select name="update_usertype"  class="form-control">
                <option value="admin">Admin</option>
                 <option value="user">User</option>
                 </select>
            </div>

        
       
               <a href="register.php" class="btn btn-danger"> CANCEL</a>
              <button  type="submit" name="updatebtn" class="btn btn-primary">
METTRE À JOUR</button>
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

