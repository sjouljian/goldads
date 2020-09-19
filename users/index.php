<?php
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    
    <script src="https://kit.fontawesome.com/19d077c931.js" crossorigin="anonymous"></script>
   
</head>
<body>
<!-- header logo section -->
<div class="container-fluid" style="background-color: #007c88;">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <img src="logo.png" id="l-logo"  onclick="window.location.href='index.php#slider';" height="70px" width="70px"/>
      </div>  
      
    </div>     
  </div>
</div>

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

        <div class="col-xl-2 col-lg-5">
            <div class="card shadow mb-4" style="background-color:#CD7F32;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <h6 class="m-0 font-weight-bold" style="color: #007c88;">Package 1</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body ">
                    <p class="mb-5">The first package that will user buy is:</p>
                    <h5 class="mb-5">10$ = 120%</h5>
                    <button class="btn form control" style="background-color:#007c88; color:white;"  onclick="window.location.href='pay/index.php?pay=10&pre=n';">Purchase</button>
                </div>
            </div>
              
        </div>
                <!-- second package      -->
        <div class="col-xl-2 col-lg-5">
            <div class="card shadow mb-4" style="background-color:#D3D3D3;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <h6 class="m-0 font-weight-bold" style="color: #007c88;">Package 2</h6>
                 </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p class="mb-5">The second package that will user buy is:</p>
                    <h5 class="mb-5">20$ = 130%</h5>
                    <button class="btn form control" style="background-color:#007c88; color:white;"  onclick="window.location.href='pay/index.php?pay=20&pre=n';">Purchase</button>
                    
                </div>
            </div>
        </div>
                 <!-- third package -->
                    <div class="col-xl-2">
                        <div class="card shadow mb-4" style="background-color:#FFD700;">
                               <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center">
                                <h6 class="m-0 font-weight-bold" style="color: #007c88;">Package 3</h6>
                            </div>
                               <!-- Card Body -->
                            <div class="card-body">
                                <p class="mb-5">The third package that will user buy is:</p>
                                <h5 class="mb-5">30$ = 140%</h5>
                               
                                    
                                <button class="btn form control" style="background-color:#007c88; color:white;"  onclick="window.location.href='pay/index.php?pay=30&pre=n';">Purchase</button>
                                
                            </div>
                        </div>
                    </div>
                    <!--fourth package-->
                          <!-- second package      -->
        <div class="col-xl-3 col-lg-5">
            <div class="card shadow mb-4" style="background-color:#33FF77;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <h6 class="m-0 font-weight-bold" style="color: #007c88;">Premium</h6>
                 </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p class="mb-5">The premium package that will user buy is:</p>
                    <h5 class="mb-5">20$= 10% extra</h5>
                    <button class="btn form control" style="background-color:#007c88; color:white;"  onclick="window.location.href='pay/index.php?pay=20&pre=y';">Purchase</button>
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