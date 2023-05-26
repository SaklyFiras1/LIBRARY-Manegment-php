<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['login']!=''){

}

$username=$_POST['username'];
$password=($_POST['password']);
$sql ="SELECT UserName,Password,Role FROM tblstudents WHERE UserName=:username and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0) {
  $role = $results[0]->Role;
  $_SESSION['alogin'] = $_POST['username'];
  if($role == 'user') {
    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
}
  if($role == 'admin') {
      echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
  } 
} 

?>

<DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LMS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/nice/img/favicon.png" rel="icon">
  <link href="assets/nice/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body   style="background-image: url('assets/img/biblio.jpg');background-size: cover;">
    <!------MENU SECTION START-->

             

 
    <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a  class="logo d-flex align-items-center w-auto">
                  <img style="max-height:50px" src="assets/img/log.png" alt="">
                  </a>
                  <span class=" d-lg-block" style="color:white;text-decoration: none;font-size:25px;  border-bottom: none;margin-top:10px">&nbsp;<strong>Library Managment System</strong></span>
               
              </div><!-- End Logo -->
Fimg

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" action="login.php" method="POST">.

                    <div class="col-12">
                      <label for="UserName" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input class="form-control" type="text" name="username" autocomplete="off" requiredrequired>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input class="form-control" type="password" name="password" autocomplete="off"  required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                  
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login" >Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="signup.php">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

            
            </div>
          </div>
        </div>

      </section>

    </div>
  </main>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>

</body>
</html>
