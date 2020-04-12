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
        $query=" SELECT bilan.type as type ,bilan.id,heure_rdv,jour_rdv,bilan.nom as nom,prenom,age,repnse FROM personne p1,bilan,personne p2 where p1.id=bilan.id_labo AND id_labo=$var AND p2.id=bilan.id_us AND heure_rdv<> \"00:00:00\" AND jour_rdv <>0000-00-00 ORDER BY jour_rdv";
        $query_run=mysqli_query($connexion , $query);





      ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Nom </th>
            <th> Prenom </th>
            <th> Age</th>
            <th>Type </th>
            <th>Jour</th>
                 <th>Heure</th>
            <th>Envoyer </th>
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
            <td> <?php echo $row['age']; ?></td>
            <td> <?php echo $row['type']; ?></td>
            <td> <?php echo $row['jour_rdv']; ?> </td>
             <td> <?php echo $row['heure_rdv']; ?> </td>
        
            <td>
                <form  method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <?php  if ($row['repnse'] =="") {
                     
                   ?>
                    <button  type="submit" name="edit_btn" class="btn btn-success">Analyse disponible</button><?php   }  ?>
                </form>
            </td>
            <td>
                <form  method="post" action="code_labo2.php">
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
 $jour=date("Y-m-d H:i:s");

 if(isset($_POST['edit_btn']))
 {
  $id=$_POST['edit_id'];
 $jour=date("Y-m-d H:i:s");
   $query="UPDATE bilan SET repnse='votre analyse est maintenant disponible', date_rps='$jour' WHERE id='$id'";
   $query_run=mysqli_query($connexion, $query);

      if($query_run)
      {
        $_SESSION['success']="Message bien envoyé.";
     


      }

      else
      {
                $_SESSION['status']="Message non envoyé.";
             
      }



 }

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