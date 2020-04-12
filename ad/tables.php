
<?php
session_start();

    if(isset($_POST['delete_btn_ad']))
    {
      $id=$_POST['delete_id_ad'];
      $query=" DELETE FROM personne  WHERE id='$id'";
       $query_run=mysqli_query($connexion, $query);
             if($query_run)
      {
        $_SESSION['success']="Ligne supprimé.";
        header('location: tables.php');


      }

      else
      {
                $_SESSION['status']="Echec de suppression.";
        header('location: tables.php');

      }
    }
?>
<?php

include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<html lang="en">



<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Les différents types utilisateurs dans Tsanté</h6>
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
        $query=" SELECT * FROM personne where confirme='1' ";
        $query_run=mysqli_query($connexion , $query);





      ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Role</th>
                    
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Role</th>
                    </tr>
                  </tfoot>
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
            <td> <?php echo $row['role']; ?> </td>
             
          
            <td>
                <form  action="code.php" method="post">
                  <input type="hidden" name="delete_id_ad" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn_ad" class="btn btn-danger"> DELETE</button>
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

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
