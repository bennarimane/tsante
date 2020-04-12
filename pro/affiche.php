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
      $query=" DELETE FROM garde WHERE id='$id'";
       $query_run=mysqli_query($connexion, $query);
             if($query_run)
      {
        $_SESSION['success']="Ligne supprimé.";
        header('location: affiche.php');


      }

      else
      {
                $_SESSION['status']="Echec de suppression.";
        header('location: affiche.php');

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
        $query=" SELECT * FROM garde where id_pharma='{$_SESSION['id']} ' ";
        $query_run=mysqli_query($connexion , $query);





      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th> Jour </th>
            <th> Heure d'ouverture </th>
            <th>Heure de fermeture </th>
         
            <th>supprimer </th>
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
            <td> <?php echo $row['jour_garde']; ?></td>
            <td> <?php echo $row['heure_g_o']; ?></td>
            <td> <?php echo $row['heure_g_f']; ?></td>
   
        <td>
               <form  method="post" action="code_pharma.php" >
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                
                  <button type="submit" name="delete_btn" class="btn btn-danger"> Supprimer</button>
                </form>
            </td>
  
          </tr>
                               <?php 
                     }


                    }
                  else 
                    {echo "";}




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