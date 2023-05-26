<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['update']))
{
$category=$_POST['category'];
$status=$_POST['status'];
$catid=intval($_GET['catid']);
$sql="update  tblcategory set CategoryName=:category,Status=:status where id=:catid";
$query = $dbh->prepare($sql);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':catid',$catid,PDO::PARAM_STR);
$query->execute();
$_SESSION['updatemsg']="Brand updated successfully";
header('location:manage-categories.php');


}
?>
 <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <?php include('includes/header.php');?>
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
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
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
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Update Categorie</h5>
              <div class="card">
                <div class="card-body">
                  <form role="form" method="post">
                  <?php 
$catid=intval($_GET['catid']);
$sql="SELECT * from tblcategory where id=:catid";
$query=$dbh->prepare($sql);
$query-> bindParam(':catid',$catid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               
  ?> 
                    <div class="mb-3">
                      <label class="form-label">Category Name</label>
                      <input class="form-control" type="text" name="category" value="<?php echo htmlentities($result->CategoryName);?>" required >
                    
                    </div>
                    <div class="row">
  <div class="col-lg-8">
  
    <div class=" form-group d-flex">
          <label>Status :&nbsp;&nbsp;</label>
          <?php if($result->Status==1) {?>
      <div class="form-check me-4">
        <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
        <label class="form-check-label" for="status1">Active</label>
      </div>
      <div class="form">
        <input class="form-check-input" type="radio" name="status" id="status2" value="0">
        <label class="form-check-label" for="status2">Inactive</label>
      </div>
      <?php } else { ?>
        <div class="radio">
<label>
<input type="radio" name="status" id="status" value="0" checked="checked">Inactive
</label>
</div>
 <div class="radio">
<label>
<input type="radio" name="status" id="status" value="1">Active
</label>
</div
<?php } ?>
</div>
<?php }} ?>
    </div>
  </div>
</div>                     
  <center><button type="submit" name="update" class="btn btn-primary">Update </button></center>
     </form>
                </div>
              </div>
      
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>

<?php } ?>
