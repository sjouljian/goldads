<?php
set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
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
                  <h6 class="m-0 font-weight-bold" style="color: #a91c68;">Message Us</h6>
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
                        <button type="submit" name="submit" class="btn btn-submit btn-default form-control" >Submit</button>
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