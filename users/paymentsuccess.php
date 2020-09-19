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
        <?php 
            include('inc/sidebar.php'); 
            $email=$_SESSION['user'];
            $sql = "UPDATE package SET status='activated' WHERE email='$email'";
            $query=mysqli_query($db,$sql);
        ?>

        <div class="col-xl-8 col-lg-5">
            <div class="card shadow mb-4 bd-success">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <h6 class="m-0 font-weight-bold" style="color: #007c88;">Congratulations</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body ">
                    <p class="mb-5">Your Payment has been paid successfully:</p>
                    
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