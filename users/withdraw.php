<?php
set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
include_once 'inc/functions.php';
include ('../connect/db.php');
if (!isset($_SESSION['user'])) {
  header("location: ../login.php");
}              
if(isset($_POST['withdraw']))
{ 
    $email=$_SESSION['user'];
    $wallet = $_POST['wallet'];
    $amount = $_POST['amount'];
    $user_id=$_SESSION['user_id'];
  
        //$sum = mysqli_query($db,"SELECT * FROM earnings WHERE email='$email'");
        //$sumearn=0;
        //while($row=mysqli_fetch_array($sum))
        //{
        //    $sumearn += $row['price'];
        //}
        $current_user_query = mysqli_query($db, "SELECT * FROM user_registration WHERE `user_id`='$user_id'");
        $current_user = mysqli_fetch_assoc($current_user_query);
        $current_balance = $current_user['balance'];
        if($amount<$current_balance)
        {
            $sql="INSERT INTO withdrawreq(user_id,wallet_id,amount,status) VALUES('$user_id','$wallet','$amount','not verified')";
            $new_balance = $current_balance - $amount;
            mysqli_query($db,"UPDATE user_registration SET balance='$new_balance' WHERE `user_id`='$user_id'");
            $msg = "Withdraw request submitted successfully";
            //header("location: phpmailer/index.php?email=$email");
        }
        else
        {
            $error="Entered Ammount should be less than current balance";
        }
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
<?php 
      include_once 'inc/header.php';
?>

<!-- main -->

<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
      <!-- Pie Chart -->
            <?php include('inc/sidebar.php'); ?>
            <div class="col-xl-9 col-lg-">
<?php
if (isset($msg)) 
{
?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Congratulations!</strong> <?php echo $msg; ?>.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
<?php
}
if (isset($error)) 
{
?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> <?php echo $error; ?>.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
<?php
}
?>
                <div class="card shadow mb-4">
                <centre><h1>Enter Withdraw Details</h1></centre>
                <hr>
                <div class="row">
                    <div class="col-sm-8 offset-2">
                      <form method="POST" enctype="multipart/form-data">
                        <label>Wallet ID</label>
                        <input type="text" name="wallet" class="form-control" placeholder="Enter Wallet Id">
                        <label>Amount</label>
                        <input type="number" name="amount" step="0.01" class="form-control" placeholder="Enter Amount">
                        <br>
                        <button type="submit" name="withdraw" class="btn btn-success">Submit</button>
                        <br> 
                      </form>
                    </div>
                    <div class="col-sm-2"></div>  
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

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
</body>
</html>