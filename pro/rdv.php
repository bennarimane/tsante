<?php
session_start();
if(!$_SESSION['email'])
{

  header('Location: login.php');
}



    if(isset($_POST['delete_btn']))
    {
      $id=$_POST['delete_id'];
      $query=" DELETE FROM register  WHERE id='$id'";
       $query_run=mysqli_query($connexion, $query);
             if($query_run)
      {
        $_SESSION['success']="Ligne supprimé.";
        header('location: rdv.php');


      }

      else
      {
                $_SESSION['status']="Echec de suppression.";
        header('location: rdv.php');

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
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un rendez vous</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code_med.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nom de patient </label>
                <input type="text" name="nom" class="form-control" placeholder="Nom de patient">
            </div>
            <div class="form-group">
                <label>age</label>
                <input type="text" name="age" class="form-control" placeholder="Age de patient">
            </div>
            <div class="form-group">
                <label>sexe</label>
                 <select class="form-control" id="sexe" name="sexe">
                      
                        <option value="femme">femme</option>
                        <option value="homme">homme</option>
           </select>
            </div>
            <div class="form-group">
                <label>heure</label>
                <input type="time" name="heure" class="form-control" >
            </div>
               <div class="form-group">
                <label>jour</label>
                <input type="date" name="jour" class="form-control" >
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
    <h6 class="m-0 font-weight-bold text-primary">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
             Ajouter un rendez vous
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
        $query=" SELECT * FROM rendez where id_med='{$_SESSION['id']}  'AND accept=1 ORDER BY journe ";
        $query_run=mysqli_query($connexion , $query);





      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nom </th>
           <th> Prenom </th>
            <th>Sexe </th>
             <th>Age</th>
            <th>Heure</th>
                 <th>La date</th>
           
            <th>DELETE </th>
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
            <td> <?php echo $row['prenom']; ?></td>
            <td> <?php echo $row['sexe']; ?></td>
             <td> <?php echo $row['age']; ?></td>
            <td> <?php echo $row['heure']; ?> </td>
             <td> <?php echo $row['journe']; ?> </td>
         
            <td>
                <form  method="post" action="code_med.php">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
                               <?php 
                     }


                    }
                  else 
                    {echo "no record found";}




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