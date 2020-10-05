<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title >Gold Ads Pack</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    
    <script src="https://kit.fontawesome.com/19d077c931.js" crossorigin="anonymous"></script>
   
</head>
<body>
<!-- header logo section -->
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <img src="../../assets/img/log.jpg" id="l-logo"/><br><span class="font-weight-bold" style="color: goldenrod;">Gold</span> <span  class="font-weight-bold" style="color:red;">Ads</span> <span   class="font-weight-bold"style="color:black;">Pack</span>
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
        <?php include('../inc/sidebar.php'); 
        $email=$_SESSION['user'];
        $user_id=$_SESSION['user_id'];
        if(isset($_GET['pay']))
        {
            $cr=date("d.m.Y");
            $dt = strtotime($cr);
            $end=date("d.m.Y", strtotime("+1 month", $dt));
            $pay=$_GET['pay'];
            $pre=$_GET['pre'];
            $package_id = $_GET['package_id'];
            if($pay==10 && $pre='n')
            {
                $packg='package1';
            }
            if($pay==20 && $pre='n')
            {
                $packg='package2';
            }
            if($pay==30 && $pre='n')
            {
                $packg='package3';
            }
            if($pay==20 && $pre='y')
            {
                $packg='premium';
            }

            $sql="INSERT INTO package(user_id,package_list_id,package_name,start_date,end_date,status) VALUES('$user_id','$package_id','$packg','$cr','$end','pending')";

            $query=mysqli_query($db,$sql);
        }

    

    
   

        ?>
        

        <div class="col-xl-8 col-lg-5">
            <div class="card shadow mb-4" style="background-color:#CD7F32;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <h6 class="m-0 font-weight-bold" style="color: #007c88;">Pay Using Coinpayment.com</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body ">
                    
                    <form action="https://www.coinpayments.net/index.php" method="post">
	                   <input type="hidden" name="cmd" value="_pay_simple">
	                   <input type="hidden" name="reset" value="1">
	                   <input type="hidden" name="merchant" value="606a89bb575311badf510a4a8b79a45e">
	                   <input type="hidden" name="item_name" value="package">
	                   <input type="hidden" name="currency" value="USD">
	                   <input type="hidden" name="amountf" value="<?php echo $pay; ?>">
	                   <input type="hidden" name="want_shipping" value="0">
	                   <input type="hidden" name="success_url" value="https://www.goldadspack/users/paymentsuccess.php">
	                   <input type="hidden" name="cancel_url" value="https://www.goldadspack/users/paymentcancle.php">
	                   <input type="image" src="https://www.coinpayments.net/images/pub/buynow-wide-blue.png" alt="Buy Now with CoinPayments.net">
                    </form>
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
             
<?php include('../inc/footer.php'); ?>
</body>
</html>








