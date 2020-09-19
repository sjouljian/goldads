<?php 
include ('../connect/db.php'); 
if(isset($_POST['withdraw']))
{ 
  $code=$_GET['code'];
  
  $verify = $_POST['verify'];
  $enverify=md5($verify);
  if($code==$enverify)
  {
      $email=$_SESSION['user'];
      $sql = "UPDATE withdrawreq SET status='verified' WHERE email='$email'";
      $query=mysqli_query($db,$sql);
      header("location: successverify.php");  
  }
  else
  {
     $error="Wrong Password";  
  }

  /*$sql="INSERT INTO withdrawreq(email,wallet_id,amount,status) VALUES('$email','$wallet','$amount','not verified')";
  
  if(mysqli_query($db,$sql))
  {
    header("location: phpmailer/index.php?email=$email");
  }
  else
  {
    $error="Something went wrong";
  }*/
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
   <style>
       .content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
   </style>
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
          <h1 class="text-center mt-5 mb-5 text-light">Withdraw</h1>
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
            <div class="col-xl-9 col-lg-">
<?php

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
                <centre><h1>Enter Verification Code</h1></centre>
                <hr>
                <div class="row">
                    <div class="col-sm-8 offset-2">
                      <form method="POST">
                        <label>Wallet ID</label>
                        <input type="Number" name="verify" class="form-control" placeholder="Enter Verification Code">
                        
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