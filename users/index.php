<?php
set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
include_once '../connect/db.php';
if (!isset($_SESSION['user'])) 
{
  header("location: ../login.php");
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title >Gold Ads Pack</title>
    <!-- <base href="/goldads/" /> -->
    <base href="/goldads/" />
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
        <div class="col-xl-3 col-lg-5">
            <div class="card shadow mb-4" style="background-color:#fff;">
                <!-- Card Header - Dropdown -->
                <div class="card-header package-head py-3 d-flex flex-row align-items-center">
                    <h6 class="m-auto font-weight-bold" style="color: #fff;">Package 1</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body ">
                    <p class="mb-5 text-center desc">The first package that will user buy is:</p>
                    <h5 class="mb-5 text-center values">10$ = 120%</h5>
                    <button class="btn card-btn form control" style="color:white;"  onclick="window.location.href='pay/index.php?pay=10&pre=n';">Purchase</button>
                </div>
            </div>
              
        </div>
                <!-- second package      -->
        <div class="col-xl-3 col-lg-5">
            <div class="card shadow mb-4" style="background-color:#fff;">
                <!-- Card Header - Dropdown -->
                <div class="card-header package-head py-3 d-flex flex-row align-items-center">
                  <h6 class="m-auto font-weight-bold" style="color: #fff;">Package 2</h6>
                 </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p class="mb-5 text-center desc">The second package that will user buy is:</p>
                    <h5 class="mb-5 text-center values">20$ = 130%</h5>
                    <button class="btn card-btn form control" style="color:white;"  onclick="window.location.href='pay/index.php?pay=20&pre=n';">Purchase</button>
                    
                </div>
            </div>
        </div>
                 <!-- third package -->
                    <div class="col-xl-3">
                        <div class="card shadow mb-4" style="background-color:#fff;">
                               <!-- Card Header - Dropdown -->
                            <div class="card-header package-head py-3 d-flex flex-row align-items-center">
                                <h6 class="m-auto font-weight-bold" style="color: #fff;">Package 3</h6>
                            </div>
                               <!-- Card Body -->
                            <div class="card-body">
                                <p class="mb-5 text-center desc">The third package that will user buy is:</p>
                                <h5 class="mb-5 text-center values">30$ = 140%</h5>
                               
                                    
                                <button class="btn card-btn form control" style="color:white;"  onclick="window.location.href='pay/index.php?pay=30&pre=n';">Purchase</button>
                                
                            </div>
                        </div>
                    </div>
                    <!--fourth package-->
                          <!-- second package      -->
        <div class="col-xl-3 col-lg-5">
            <div class="card shadow mb-4" style="background-color:#fff;">
                <!-- Card Header - Dropdown -->
                <div class="card-header package-head py-3 d-flex flex-row align-items-center">
                  <h6 class="m-auto font-weight-bold" style="color: #fff;">Premium</h6>
                 </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p class="mb-5 text-center desc">The premium package that will user buy is:</p>
                    <h5 class="mb-5 text-center values">20$= 10% extra</h5>
                    <button class="btn card-btn form control" style="color:white;"  onclick="window.location.href='pay/index.php?pay=20&pre=y';">Purchase</button>
                </div>
            </div>
        </div>
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