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

<?php 
      include_once 'inc/header.php';
?>

<!-- main -->

<div class="container-fluid mt-5">
<div class="container">
<div class="row">
  <!-- Pie Chart --><?php include('inc/sidebar.php'); ?>

<div class="col-xl-9 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <h6 class="m-0 font-weight-bold" style="color: #007c88;">Referals</h6>
                 </div>
                <!-- Card Body -->
                <div class="card-body">
<?php
$email=$_SESSION['user'];

?>
                  <a href="https://www.goldadspack.com/?email=<?php echo $email; ?>#slider">https://www.goldadspack.com/?email=<?php echo $email; ?></a>
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
                    

              <!--footer section -->
              <?php include('inc/footer.php'); ?>
</body>
</html>