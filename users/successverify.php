<?php
session_start();
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
        <img src="../logo.png" id="l-logo"  onclick="window.location.href='index.php#slider';" height="70px" width="70px"/><br><span class="font-weight-bold" style="color: goldenrod;">Gold</span> <span  class="font-weight-bold" style="color:red;">Ads</span> <span   class="font-weight-bold"style="color:black;">Pack</span>
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
          <h1 class="text-center mt-5 mb-5 text-light">Successfully withdraw</h1>
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
        <?php include('inc/sidebar.php'); ?>

        <div class="col-xl-9 col-lg-9">
            <div class="card shadow mb-4 bg-success">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <centre>
                    <h6 class="m-0 font-weight-bold" style="color: white;">Successfully Verified</h6>
                    </centre>
                </div>
                <!-- Card Body -->
                <div class="card-body ">
                    <p class="mb-5" style="color: white;">Your email verification has been completed successfully:<br>Your Payment will be transfered in 2 to 3 Working days</p>
                    <button class="btn btn-danger"  onclick="window.location.href='index.php';">Go to Home </button>
                   
                </div>
            </div>
              
        </div>
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