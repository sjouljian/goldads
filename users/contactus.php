<?php
include('../connect/db.php');
if (isset($_POST['submit'])) 
{
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $msg=$_POST['msg'];
  $sql="INSERT INTO massages(email,subject,massage) VALUES('$email','$subject','$msg')";
  if(!mysqli_query($db,$sql))
  {
    $error="Something went wrong ";
  }
  else
  {
    $msg="Successfully Submitted ";
  }
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
<?php include('inc/sidebar.php'); ?>

<div class="col-xl-9 col-lg-5">
  <?php
if (isset($msg)) 
{
?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Congratulation!</strong> <?php echo $msg; ?>.
                  
                </div>
<?php
}
if (isset($error)) 
{
?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> <?php echo $error; ?>.
               
                </div>
<?php
}
?>
              <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <h6 class="m-0 font-weight-bold" style="color: #007c88;">Message Us</h6>
                 </div>
                <!-- Card Body -->
                <div class="card-body">
                <form class="form-horizontal" method="POST">
                    <div class="form-group">
                     <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <textarea class="form-control" name="msg" cols="84" rows="4" placeholder="Message"></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="submit" class="btn btn-default form-control" style="background-color:#007c88; color:white;" >Submit</button>
                        </div>
                    </div>
                    </form>
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