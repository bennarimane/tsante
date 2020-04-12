<?php
session_start();


    if(isset($_POST['delete_btn']))
    {
      $id=$_POST['delete_id'];
      $query=" DELETE FROM personne  WHERE id='$id'";
       $query_run=mysqli_query($connexion, $query);
             if($query_run)
      {
        $_SESSION['success']="Ligne supprimé.";
        header('location: register.php');


      }

      else
      {
                $_SESSION['status']="Echec de suppression.";
        header('location: register.php');

      }
    }

 ?>
<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nom </label>
                <input type="text" name="username" class="form-control" placeholder="Entrer nom">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enterer Email">
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Enterer mot de passe">
            </div>
            <div class="form-group">
                <label>Confirmer mpt de passe</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirmer mot de passe">
            </div>
            <input type="hidden" name="usertype" value="admin">
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Ajouter admin
            </button>
    </h6>
  </div>

  <div class="card-body">

     <?php

    
          if(isset($_SESSION['success']) && $_SESSION['success'] !='')
          {
                 echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
                 unset($_SESSION['success']);
          }


           
          if(isset($_SESSION['status']) && $_SESSION['status'] !='')
          {
                 echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
                 unset($_SESSION['status']);
          }
    ?>

    <div class="table-responsive">
      <?php
        $connexion=mysqli_connect("localhost","root","","tsante2");
        $query=" SELECT * FROM personne WHERE role='admin' ";
        $query_run=mysqli_query($connexion , $query);





      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nom </th>
            <th>Email</th>
            <th>mot de passe</th>
                 <th> type </th>
            <th>Modifier</th>
            <th>Supprimer </th>
          </tr>
        </thead>
        <tbody>
             <?php
                    if(mysqli_num_rows($query_run)> 0)
                    {
                     while ($row = mysqli_fetch_assoc($query_run)) 
                     {
                     ?>




          <tr>
            <td> <?php echo $row['id']; ?></td>
            <td> <?php echo $row['nom']; ?></td>
            <td> <?php echo $row['email']; ?></td>
            <td> <?php echo $row['password']; ?> </td>
             <td> <?php echo $row['role']; ?> </td>
            <td>
                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success">Editer</button>
                </form>
            </td>
            <td>
                <form  action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> Supprimer</button>
                </form>
            </td>
          </tr>
                               <?php 
                     }


                    }
                  else 
                    {echo "
Aucun Enregistrement Trouvé";}




             ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>