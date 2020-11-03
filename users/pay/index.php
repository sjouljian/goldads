<?php
set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
include_once 'inc/functions.php';
?>
<html lang="en">
<head>
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
            $package_id = $_GET['pay'];
            // if($pay==1 && $pre='n')
            // {
            //     $packg='package1';
            // }
            // if($pay==2 && $pre='n')
            // {
            //     $packg='package2';
            // }
            // if($pay==3 && $pre='n')
            // {
            //     $packg='package3';
            // }
            // if($pay==4 && $pre='y')
            // {
            //     $packg='premium';
            // }
            $package = mysqli_query($db, "SELECT * FROM package_list WHERE id='$package_id'");
            $package_entry = mysqli_fetch_assoc($package);
            if(mysqli_num_rows($package) < 1){
                header("location: index.php");
            }

            
            $date = new DateTime();
            $start_date=date('Y-m-d H:i:s', $date->getTimestamp());
            $end_date=date('Y-m-d H:i:s', $date->modify('+1 month')->getTimestamp());

            $sql="INSERT INTO package(user_id,package_list_id,package_name,start_date,end_date,status) VALUES('$user_id','$package_entry[id]','$package_entry[title]','$start_date','$end_date','pending')";

            $query=mysqli_query($db,$sql);

            $row_id = mysqli_insert_id($db);
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
	                   <input type="hidden" name="merchant" value="6351bd15b4a1ed844e5c5d6a5372a982">
                     <input type="hidden" name="item_name" value="<?php echo $package_entry['title']; ?>">
                     <input type="hidden" name="invoice" value="<?php echo $row_id; ?>">
	                   <input type="hidden" name="currency" value="USD">
	                   <input type="hidden" name="amountf" value="<?php echo $package_entry['price']; ?>">
	                   <input type="hidden" name="want_shipping" value="0">
	                   <input type="hidden" name="success_url" value="https://www.goldadspack/users/index.php">
	                   <input type="hidden" name="cancel_url" value="https://www.goldadspack/users/index.php">
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








