<?php
session_start();
$_SESSION['id'];
if(!$_SESSION['email'])
{

  header('Location: login.php');
}



    if(isset($_POST['delete_btn']))
    {
      $id=$_POST['delete_id'];
      $query=" DELETE FROM `produit` WHERE id='$id'";
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




<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  

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
        $query=" SELECT * FROM produit where id_opt='{$_SESSION['id']} ' ";
        $query_run=mysqli_query($connexion , $query);





      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nom </th>
            <th>prix </th>
            <th>couleur</th>
                
            <th>categorie</th>
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
            <td> <?php echo $row['prix']; ?></td>
            <td> <?php echo $row['couleur']; ?> </td>
              <td> <?php echo $row['categorie']; ?> </td>
        
          <td>
                <form  action="code.php" method="post">
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