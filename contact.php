<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title >Gold Ads Pack</title>
     <?php include('inc/head.php')?>


</head>
<body>
<!-- header logo section -->
<?php include('inc/body.php')?>
    <!-- slider -->
    <div class="container-fluid faq_slider px-0">
        <div class="faq_slider2">
        <div class="container ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs1-2">
               <h1 class="text-center mt-5 mb-5 text-light">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>
    </div>
<!-- CONTENT -->
<div class="container-fluid">
    <div class="container my-5">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs1-12" style="color:#007c88;"></div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs1-12 mt-55" style="color:#007c88;">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <h6 class="m-0 font-weight-bold" style="color: #007c88;">Contact Us</h6>
                 </div>
                <!-- Card Body -->
                <div class="card-body">
                <form class="form-horizontal" method="POST">
                <div class="form-group">
                     <div class="col-sm-12">
                        <input type="email" class="form-control" name="fullName" placeholder="Enter name">
                        </div>
                    </div>
                    <div class="form-group">
                     <div class="col-sm-12">
                        <input type="email" class="form-control" name="phone" placeholder="Enter phone number">
                        </div>
                    </div>
                    <div class="form-group">
                     <div class="col-sm-12">
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                        <div class="checkbox">
                            <textarea class="form-control" name="msg" cols="84" rows="4" placeholder="Message"></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" name="submit" class="btn btn-default form-control" style="background-color:#007c88; color:white;" >SEND MESSAGE</button>
                        </div>
                    </div>
                    </form>
                </div>
              </div>
            </div>
            <div class="col-xl-2 col-lg-2 " style="color:#007c88;"></div>
        </div>
    </div>
</div>

<!-- footer part -->
<?php include('users/inc/footer.php'); ?>
<?php include('inc/script.php'); ?>
</body>
<script src="assets/app.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>
