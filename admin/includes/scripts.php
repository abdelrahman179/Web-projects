  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <?php


  include('database/dbconfig.php');
  include('../config.php');


  $query_2 = "SELECT * FROM service_provider";
  $query_run_2 = mysqli_query($mysqli, $query_2);
  $row_2 = mysqli_num_rows($query_run_2);
  ?>

  <?php

  $query_1 = "SELECT * FROM users";
  $query_run_1 = mysqli_query($mysqli, $query_1);
  $row_1 = mysqli_num_rows($query_run_1);
  ?>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
  <script>
    $(document).ready(function() {
      var ctx = $("#chart-line");
      var myLineChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ["Service Providers", "Regular Users"],
          datasets: [{
            data: [<?php echo $row_2 ?> , <?php echo $row_1 ?> ],
            backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)"]
          }]
        },
        options: {
          title: {
            display: true,
            text: 'Khalsana Users'
          }
        }
      });
    });
  </script>





  <?php



  ?>