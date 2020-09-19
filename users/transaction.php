<?php

include('../connect/db.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title >Gold Add Pack</title>
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
               <img src="../logo.png" id="l-logo"  onclick="window.location.href='index.php#slider';" height="70px" width="70px"/><br><span class="font-weight-bold" style="color: goldenrod;">Gold</span> <span  class="font-weight-bold" style="color:red;">Ad</span> <span   class="font-weight-bold"style="color:black;">Pack</span>
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
           <h1 class="text-center mt-5 mb-5 text-light">Transaction Area</h1>
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

<div class="col-xl-9 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <h6 class="m-0 font-weight-bold" style="color: #007c88;">Transaction</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Type</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$email=$_SESSION['user'];
$query = ("SELECT * FROM earnings WHERE email='$email'");
$result = mysqli_query($db,$query);
while ($row=mysqli_fetch_array($result)) 
{
?>
                      <tr>
                        <th scope="row"><?php echo $row['id']; ?></th>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>Earning</td>
                      </tr>
<?php
}
?>
                    </tbody>
                  </table>
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