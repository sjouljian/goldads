<?php

include_once 'connect/db.php';
$error = "";

if (
    isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
    && ($_GET["action"] == "reset")
) {
    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $query = mysqli_query(
        $db,
        "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';"
    );
    $row = mysqli_num_rows($query);
    if ($row == "") {
        $error .= '<p>The link is invalid/expired. Either you did not copy the correct link
from the email, or you have already used the key in which case it is 
deactivated.</p>
<p><a href="https://www.goldadspack.com/forgot">
Click here</a> to reset password.</p>';
    } else {
        $row = mysqli_fetch_assoc($query);
        $expDate = $row['expDate'];
        if ($expDate >= $curDate) {

            if (
                isset($_POST["email"]) && isset($_POST["action"]) && isset($_POST["pass1"]) &&
                ($_POST["action"] == "update")
            ) {
                $error = "";
                $pass1 = mysqli_real_escape_string($db, $_POST["pass1"]);
                //$pass2 = mysqli_real_escape_string($db, $_POST["pass2"]);
                $email = $_POST["email"];
                $curDate = date("Y-m-d H:i:s");
                if ($error != "") {
                    //echo "<div class='error'>".$error."</div><br />";
                } else {
                    $pass1 = md5($pass1);
                    mysqli_query(
                        $db,
                        "UPDATE `user_registration` SET `user_password`='" . $pass1 . "' 
            WHERE `user_email`='" . $email . "';"
                    );
            
                    mysqli_query($db, "DELETE FROM `password_reset_temp` WHERE `email`='" . $email . "';");
            
                    $msg = '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
            <p><a href="https://www.goldadspack.com/login.php">
            Click here</a> to Login.</p></div>';
                }
            }
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
                      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card card-primary">

                                <div class="card-body">
                                <?php
                        if (isset($msg)) {
                            ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?php echo $msg; ?></strong>.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php
                        }
                        if (isset($error) && $error != "") {
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
                                <?php if(!isset($msg)){?>
                                    <form method="post" action="" name="update">
                                        <input type="hidden" name="action" value="update" />
                                        <div class="form-group">
                                            <label for="pass1"><strong>New Password:</strong></label>
                                        </div>
                                        <input type="password" id="pass1" class="form-control" name="pass1" minlength="8" required />

                                        <input type="hidden" name="email" value="<?php echo $email; ?>" />

                                        <input type="submit" class="btn btn-submit mx-auto mt-3" style="display: block;" value="Reset Password" />
                                    </form>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
        } 
    }
} // isset email key validate end
    ?>