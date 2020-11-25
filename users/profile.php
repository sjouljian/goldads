<?php
set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
session_start();
include_once '../connect/db.php';
include_once 'inc/functions.php';
if (!isset($_SESSION['user'])) 
{
  header("location: ../login.php");
}
else{
  $activePackageExists = activePackageExists();
  $premiumPackageExists = premiumPackageExists();
  $useremail= $_SESSION['user'];
  $user_id= $_SESSION['user_id'];
  $username = $_SESSION['user_name'];
  $user_info_query = mysqli_query($db, "SELECT * FROM user_registration WHERE user_id = ".$user_id);
  $user_info = mysqli_fetch_assoc($user_info_query);
  //$allpackages = mysqli_query($db, "SELECT * FROM package_list WHERE published = 1");
  //$user_packages = mysqli_query($db, "SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id' AND status='activated'");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title >Gold Ads Pack</title>
    <?php include('inc/head.php')?>
   
</head>
<body>
<!-- header logo section -->
<?php 
      include_once 'inc/header.php';
?>

<!-- slider -->
<div class="container-fluid how_slider">
  <div class="how_slider2">
    <div class="container ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs1-2">
          <h1 class="text-center mt-5 mb-5 text-light">Member Area</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- main -->

<div class="container-fluid mt-5">
  <div class="container">
    <div class="row">
      <!-- Pie Chart -->
        <?php include_once('inc/sidebar.php'); ?>

    <div class="col-md-5 col-xl-5 col-lg-5">
    <h3>Personal info</h3>
        
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label>Full name:</label>
              <input class="form-control" type="text" name="full_name" value="<?php echo $user_info['full_name']; ?>">
          </div>
          <div class="form-group">
            <label>Email:</label>
              <input class="form-control" type="email" name="user_email" value="<?php echo $user_info['user_email']; ?>">
          </div>
          <div class="form-group">
            <label>Username:</label>
              <input class="form-control" type="text" name="user_name" disabled value="<?php echo $user_info['user_name']; ?>">
          </div>
          <div class="form-group">
            <label>Current password:</label>
              <input class="form-control" type="password" value="">
          </div>
          <div class="form-group">
              <input type="button" class="btn btn-submit" value="Save Changes">
          </div>
        </form>
        </div>
        <div class="col-md-4 col-xl-4 col-lg-4">
    <h3>Change password</h3>
    <form class="form-horizontal" role="form">
          <div class="form-group">
            <label>New password:</label>
              <input class="form-control" type="password" value="">
          </div>
          <div class="form-group">
            <label>Confirm new password:</label>
              <input class="form-control" type="password2" value="">
          </div>
          <div class="form-group">
              <input type="button" class="btn btn-submit" value="Save Changes">
          </div>
        </form>
        </div>
                 <!-- end package -->
                      </div>
                      </div>
                      </div>
          <!-- ////////////////////// -->
              
                 <!-- ///////////////////////////////// -->
                 
      </div>
    </div>

                     <!-- ///////////////////////////////// -->       
  </div>
</div>
                      </div>
                      <!-- logo section -->
                      

              <!--footer section -->
             
<?php include('inc/footer.php'); ?>
</body>
</html>