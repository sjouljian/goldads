<?php
set_include_path(get_include_path().":".$_SERVER["DOCUMENT_ROOT"]."/goldads");
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
  $allpackages = mysqli_query($db, "SELECT * FROM package_list WHERE published = 1");
  $user_packages = mysqli_query($db, "SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id'");
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

    <div class="col-md-9 col-xl-9 col-lg-9">
    <div class="row mb-4 equal-heights row-packages">
    <?php   
    
      while($row = mysqli_fetch_assoc($allpackages)){?>
        <div class="col-xl-3">
            <div class="card shadow mb-4" style="background-color:#fff;">
                <!-- Card Header - Dropdown -->
                <div class="card-header package-head py-3 d-flex flex-row align-items-center">
                    <h6 class="m-auto font-weight-bold" style="color: #fff;"><?php echo $row['title']; ?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p class="mb-5 text-center desc"><?php echo $row['small_description']; ?></p>
                    <h5 class="mb-5 text-center values"><?php echo $row['price']; ?>$ = <?php echo $row['percentage']; ?>% <?php if($row['id'] == 4) echo 'extra'?></h5>
                    <?php if($row['id']!=4 || ($row['id']==4 && mysqli_num_rows($user_packages) > 0)){
                      if((!$activePackageExists && $row['id'] != PREMIUM_PACKAGE_ID) || ($activePackageExists && !$premiumPackageExists && $row['id'] == PREMIUM_PACKAGE_ID)){?>
                    <button class="btn card-btn form control" style="color:white;"  onclick="window.location.href='users/pay/index.php?pay=<?php echo $row['id']; ?>&pre=n';">Purchase</button>
                    <?php }}else{?>
                      <p>Please purchase a package to unlock premium package</p>
                    <?php } ?>
                </div>
            </div>
              
        </div>
      <?php }?>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <b>Referral link: <a href="https://www.goldadspack.com/?email=<?php echo $email; ?>#slider">https://www.goldadspack.com/?email=<?php echo $email; ?></a</b>
            </div>
          </div>
        </div>
    </div>
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