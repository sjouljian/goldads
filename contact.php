<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'users/phpmailer/vendor/autoload.php';

if(isset($_POST['submit']) && isset($_POST['msg']))
{
    
    $output = '<p>Dear Admin,</p>';
    $output .= '<p>The following inquiry form was submitted on your website.</p>';
    $output .= '<p>-------------------------------------------------------------</p>';
    $output .= '<p><b>Full name: </b>'.$_POST['fullName'].'</p>';
    $output .= '<p><b>Phone: </b>'.$_POST['phone'].'</p>';
    $output .= '<p><b>Email: </b>'.$_POST['email'].'</p>';
    $output .= '<p><b>Subject: </b>'.$_POST['subject'].'</p>';
    $output .= '<p><b>Message: </b>'.$_POST['msg'].'</p>';
    $output .= '<p>Gold Ads Pack Team</p>';
    $body = $output;
    $subject = "Inquiry - Gold Ads Pack";

    $fromserver = "info@goldadspack.com";

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host       = 'mocha3033.mochahost.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@goldadspack.com';                     // SMTP username
    $mail->Password   = 'iNW%RK&K!l_3';
    $mail->SMTPAuth = true;  // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
    $mail->SMTPAutoTLS = false;
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->From = "noreply@goldadspack.com";
    $mail->FromName = "Gold Ads Pack";
    $mail->Sender = $fromserver; // indicates ReturnPath header
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress("info@goldadspack.com");

    if (!$mail->Send()) {
        $error = $mail->ErrorInfo;
    } else {
        $msg = "Message sent successfully.";
    }
}

?>
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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php
                    if (isset($msg)) {
                        ?>
                            <div class="alert alert-success alert-dismissible mx-auto fade show" role="alert">
                                <strong><?php echo $msg; ?></strong>.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                    }
                ?>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs1-12 mt-55" style="color:#007c88;">
            <div class="card shadow">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center">
                  <h6 class="m-0 font-weight-bold" style="color: #a91c68;">Contact Us</h6>
                 </div>
                <!-- Card Body -->
                <div class="card-body">
                <form class="form-horizontal" method="POST">
                <div class="form-group">
                     <div class="col-sm-12">
                        <input type="text" class="form-control" name="fullName" placeholder="Enter name" required>
                        </div>
                    </div>
                    <div class="form-group">
                     <div class="col-sm-12">
                        <input type="tel" class="form-control" name="phone" placeholder="Enter phone number" required>
                        </div>
                    </div>
                    <div class="form-group">
                     <div class="col-sm-12">
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                        <div class="checkbox">
                            <textarea class="form-control" name="msg" cols="84" rows="4" placeholder="Message" required></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" name="submit" class="btn btn-default btn-submit form-control">SEND MESSAGE</button>
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
</body>
</html>
