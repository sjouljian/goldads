<?php

include_once 'connect/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'users/phpmailer/vendor/autoload.php';

if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
    function post_captcha($user_response) 
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
          'secret' => '6Lc8tN4ZAAAAAIAvmE7oX93K_DKH0sXQcS-EHUDq',
          'response' => $user_response
        );
        $options = array(
          'http' => array (
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'method' => 'POST',
            'content' => http_build_query($data)
          )
        );
        $context  = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success=json_decode($verify);

        return $captcha_success;
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res->success) 
    {
        // What happens when the CAPTCHA wasn't checked
        $error="Please go back and make sure you check the security CAPTCHA box. ";
      
    } 
    else 
    {
    $error = "";
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $error .= "Invalid email address please type a valid email address!";
    } else {
        $sel_query = "SELECT * FROM `user_registration` WHERE user_email='" . $email . "'";
        $results = mysqli_query($db, $sel_query);
        $row = mysqli_num_rows($results);
        if ($row == "") {
            $error .= "No user is registered with this email address!";
        }
    }
    if ($error != "") {
        
    } else {
        $expFormat = mktime(
            date("H"),
            date("i"),
            date("s"),
            date("m"),
            date("d") + 1,
            date("Y")
        );
        $expDate = date("Y-m-d H:i:s", $expFormat);
        $key = md5((2418 * 2) . $email);
        $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
        $key = $key . $addKey;
        // Insert Temp Table
        mysqli_query(
            $db,
            "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');"
        );

        $output = '<p>Dear user,</p>';
        $output .= '<p>Please click on the following link to reset your password.</p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p><a href="https://www.goldadspack.com/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">https://www.goldadspack.com/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
        $output .= '<p>-------------------------------------------------------------</p>';
        $output .= '<p>Please be sure to copy the entire link into your browser.
The link will expire after 1 day for security reason.</p>';
        $output .= '<p>If you did not request this forgotten password email, no action 
is needed, your password will not be reset. However, you may want to log into 
your account and change your security password as someone may have guessed it.</p>';
        $output .= '<p>Thanks,</p>';
        $output .= '<p>Gold Ads Pack Team</p>';
        $body = $output;
        $subject = "Password Reset - Gold Ads Pack";

        $email_to = $email;
        $fromserver = "goladspack533@gmail.com";

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'goladspack533@gmail.com';                     // SMTP username
        $mail->Password   = 'goldads@533';
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
        $mail->AddAddress($email_to);

        if (!$mail->Send()) {
            $error = $mail->ErrorInfo;
        } else {
            $msg = "An email has been sent to you with instructions on how to reset your password.";
        }
    }
}}

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Gold Ads Pack</title>
        <?php include('inc/head.php') ?>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body>
        <!-- header logo section -->
        <?php include('inc/body.php') ?>
        <!-- slider -->
        <div class="container-fluid faq_slider">
            <div class="faq_slider2">
                <div class="container ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs1-2">
                            <h1 class="text-center mt-5 mb-5 text-light">Forgot Password</h1>
                        </div>
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
                        if (isset($error) && $error != "") {
                        ?>
                                <div class="alert alert-danger alert-dismissible mx-auto fade show" role="alert">
                                    <strong>Oops!</strong> <?php echo $error; ?>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">

                        <div class="card-body">
                            <form method="post" action="" name="reset">
                            <div class="form-group">
                                <label for="us_name">Email</label>
                                <input id="us_name" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                            </div>
                            <div class="form-group g-recaptcha" data-sitekey="6Lc8tN4ZAAAAAI3FuFbvjaPEMUk0EurX28mnYH7R"></div>
                            <div class="form-group">
                                <button type="submit" name="forgot_btn" class="btn btn-submit btn-lg btn-block" tabindex="4">Submit</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('users/inc/footer.php'); ?>

    </body>

    </html>