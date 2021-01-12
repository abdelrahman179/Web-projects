<?php
include('security.php');
include('includes/header.php');
include('includes/navbar.php');
include('database/dbconfig.php');
include('../config.php');

?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total #Regular Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <?php

                $query_1 = "SELECT * FROM users";
                $query_run_1 = mysqli_query($mysqli, $query_1);
                $row_1 = mysqli_num_rows($query_run_1);
                echo '<h5> Total Users: ' . $row_1 . '</h5>';
                ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total #Service Providers</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query_2 = "SELECT * FROM service_provider";
                $query_run_2 = mysqli_query($mysqli, $query_2);
                $row_2 = mysqli_num_rows($query_run_2);
                echo '<h5> Total S.Ps: ' . $row_2 . '</h5>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-hammer fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total #Messages</div>
              <div class="row no-gutters align-items-center">
                <?php
                $query_3 = "SELECT * FROM contact_us";
                $query_run_3 = mysqli_query($mysqli, $query_3);
                $row_3 = mysqli_num_rows($query_run_3);
                echo '<h5> Total Msgs: ' . $row_3 . '</h5>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total #Reviews</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query_4 = "SELECT review_id FROM reviews";
                $query_run_4 = mysqli_query($mysqli, $query_4);
                $row_4 = mysqli_num_rows($query_run_4);
                echo '<h5> Total Reviews: ' . $row_4 . '</h5>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-content page-container" id="page-content" style="height:500px">
    <div class="padding">
      <div class="row">
        <div class="container-fluid d-flex justify-content-center">
          <div class="col-sm-8 col-md-6">
            <div class="card">
              <div class="card-header" style="text-align:center;">Users Chart</div>
              <div class="card-body" style="height: 420px">
                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                  <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                  </div>
                </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Content Row -->








  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>