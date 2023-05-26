<?php
session_start();

include('includes/config.php');


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Library Management System</title>
  <link rel="shortcut icon" type="image/png" href="assets/img/log.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <?php include('includes/header.php'); ?>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->

    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>

          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">

                    <a href="logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-4">
      
            <div class="card overflow-hidden">
    
              <div style="background-color:#6ef24e;" class="card-body ">
                <center>
                  <h5 style="font-size:28px;color:white;" class="card-title mb-9 fw-semibold"><img
                      style="height:70px;margin-top:-7px" src="assets/img/library.png" alt=""> Books Listed</h5>
                </center>
                <div class="row align-items-center">
                  <div class="col-8">
                    <?php
                    
                      $sid ='SID013' ;
                      $sql1 = "SELECT id FROM tblissuedbookdetails WHERE StudentID=:sid";
                      $query1 = $dbh->prepare($sql1);
                      $query1->bindParam(':sid', $sid, PDO::PARAM_STR);
                      $query1->execute();
                      $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                      $issuedbooks = $query1->rowCount();
                    ?>
                    <h3>&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;1</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card overflow-hidden">

              <div class="card-body " style="background-color:#4eb9f2;">
                <h5 style="font-size:28px;color:white;" class="card-title mb-9 fw-semibold"><img
                    style="height:70px;margin-top:-7px" src="assets/img/return.png" alt=""> Books Returned</h5>
                <div class="row align-items-center">
                  <div class="col-8">
                    <?php
                      $rsts = 0;
                      $sql2 = "SELECT id FROM tblissuedbookdetails WHERE StudentID=:sid AND RetrunStatus=:rsts";
                      $query2 = $dbh->prepare($sql2);
                      $query2->bindParam(':sid', $sid, PDO::PARAM_STR);
                      $query2->bindParam(':rsts', $rsts, PDO::PARAM_STR);
                      $query2->execute();
                      $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                      $returnedbooks = $query2->rowCount();
                    ?>
                    <h3>&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;&nbsp;  &nbsp;  &nbsp;  &nbsp;
                    <?php echo htmlentities($returnedbooks);?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="py-6 px-6 text-center" style="margin-top:200px">
            <br> <br> <br> <br> <br><br><br><br>
            <p class="mb-0 fs-4"> &copy; Designed and Developed By Sakly Firas</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>

</html>
