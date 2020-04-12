<?php
session_start();
if(!$_SESSION['email'])
{

  header('Location: login.php');
}


$var=$_SESSION['id'];
   
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
        $query=" SELECT bilan.type as type ,bilan.id,heure_rdv,jour_rdv ,bilan.nom ,prenom,age FROM personne p1,bilan,personne p2 where p1.id=bilan.id_labo AND id_labo=$var AND p2.id=bilan.id_us and bilan.heure_rdv=\"00:00:00\" and bilan.jour_rdv=0000-00-00 ";
        $query_run=mysqli_query($connexion , $query);





      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nom </th>
             <th>Prenom</th>
              <th> Age </th>
            <th>Type </th>
            <th>Jour</th>
                 <th>Heure</th>
            <th>Ajouter</th>
            <th>Supprimer</th>
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
                     <td> <?php echo $row['age']; ?></td>
            <td> <?php echo $row['type']; ?></td>
            <td> <?php echo $row['jour_rdv']; ?> </td>
             <td> <?php echo $row['heure_rdv']; ?> </td>
            <td>
                <form action="register_edit_labo.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> Ajouter</button>
                </form>
            </td>
            <td>
                <form  method="post" action="code_labo.php">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                
                  <button type="submit" name="delete_btn" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
          </tr>
                               <?php 
                     }


                    }
                  else 
                    {echo "Pas de rendez-vous!";}




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