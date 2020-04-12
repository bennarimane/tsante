<?php
session_start();
if(!$_SESSION['pseudo'])
{

	header('Location: login.php');
}





 ?>
 <?php

$connexion=mysqli_connect("localhost","root","","tsante2");
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<html lang="en">



        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tableau de bord</h1>
      <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
        
              <div class="h5 mb-0 font-weight-bold text-gray-800">
<h4>Medecin non accepter: </h4>
                <?php

                    require 'dbconfig.php';
                    $query="SELECT  id FROM personne WHERE role='medecin' AND confirme=0";
                    $query_run= mysqli_query($connexion , $query);
                    $row=mysqli_num_rows($query_run);
                    echo '<h3>'.$row.'</h3>';




                ?>
               

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <h4>Pharmacie non accepter: </h4>
                <?php

                    require 'dbconfig.php';
                    $query="SELECT  id FROM personne WHERE role='pharmacie' AND confirme=0";
                    $query_run= mysqli_query($connexion , $query);
                    $row=mysqli_num_rows($query_run);
                    echo '<h3>'.$row.'</h3>';




                ?>
            </div></div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <h4>opticien non accepter: </h4>
                <?php

                    require 'dbconfig.php';
                    $query="SELECT  id FROM personne WHERE role='opticien' AND confirme=0";
                    $query_run= mysqli_query($connexion , $query);
                    $row=mysqli_num_rows($query_run);
                    echo '<h3>'.$row.'</h3>';




                ?>
            </div></div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <h4>opticien non accepter: </h4>
                <?php

                    require 'dbconfig.php';
                    $query="SELECT  id FROM personne WHERE role='laboratoire' AND confirme=0";
                    $query_run= mysqli_query($connexion , $query);
                    $row=mysqli_num_rows($query_run);
                    echo '<h3>'.$row.'</h3>';




                ?>
            </div></div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">


              <!-- Bar Chart -->


            <!-- Donut Chart -->
            <div class="col-xl-8 col-lg-7" align="center">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Nombre d'utilisateurs</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
         Le nombre d'utilisateur par rôle <code>( medecin , pharmacien , opticien , patient ,laboratoire, et admin ) </code>
                </div>
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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <script >
      Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
 $(document).ready(function(){
  $.ajax({
  type: "get",
  url: "nbrMembers.php" ,
  dataType: "json",
  success: function(data){
var ctx = document.getElementById("myPieChart");
//alert(data.medecin)
var myPieChart = new Chart(ctx, {

  type: 'doughnut',
  data: {
    labels: ["Médecin", "Pharmacien", "Opticien","patient","laboratoire","admin"],
    datasets: [{
      data: [data.medecin, data.pharmacien, data.opticien,data.patient,data.laboratoire,data.admin],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#36b9cc','#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#36b9cc','#36b9cc','#F7FE2E'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
  }
});


});


  </script>
  <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>
