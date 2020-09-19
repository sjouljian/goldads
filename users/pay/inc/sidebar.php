<div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<?php
include '../../connect/db.php';
$email=$_SESSION['user'];
$sum = mysqli_query($db,"SELECT * FROM earnings WHERE email='$email'");
$sumearn=0;
while($row=mysqli_fetch_array($sum))
{
  $sumearn += $row['price'];
}

?>
            <h6 class="m-0 font-weight-bold" style="color: #007c88;">Balance = <?php echo $sumearn; ?>$</h6>
          </div>
        <!-- Card Body -->
          <div class="card-body">

            <a href="index.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black;width:180px; ">Dashboard</a>
            <a href="uploadad.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black;width:180px; ">Add Site</a>
            <a href="paid.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black;width:180px; "> Ads</a>
            <a href="withdraw.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black;width:180px; ">Request For Withdraw</a>
            <a href="refrals.php"  class="btn mb-2 bg-light " style=" color:black;width:180px; ">Referal Number</a>
            
            <a href="transaction.php"  class="btn mb-2 bg-light  " style=" color:black; width:180px; ">Transaction</a>
           
            <a href="contactus.php"  class="btn mb-2 bg-light " style="color:black;width:180px; ">Contact Us</a>
            <a href="../logout.php"  class="btn bg-light" style=" color:black; heigth:40px; width:180px; ">Log Out</a>
          </div>
        </div>
      </div>