<?php 
include_once 'connect/db.php';

if (isset($_POST['login_btn'])) 
{
    function post_captcha($user_response) 
    {
        $fields_string = '';
        $fields = array(
            'secret' => '6LecP8UZAAAAAF0GUHCHcaEAbXUTsjs2D9qBHdQU',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if ($res['success']) 
    {
        // What happens when the CAPTCHA wasn't checked
        $error="Please go back and make sure you check the security CAPTCHA box. ";
      
    } 
    else 
    {
       $email=$_POST['email'];
       $password=md5($_POST['password']);
       $crdate=date("d.m.Y");

       $query = mysqli_query($db,"SELECT * FROM user_registration WHERE user_email='$email' AND user_password='$password'"); 
       $numrows = mysqli_num_rows($query);
       if($numrows<1)
       {
            $error="Authentication Error Invalid Username Or Password ";
       }
       else
       {
            $chkdate = mysqli_query($db,"SELECT * FROM earnings WHERE email='$email' AND date='$crdate'"); 
            $daterows = mysqli_num_rows($chkdate);
            if($daterows<1)
            {
                $chkpckg = mysqli_query($db,"SELECT * FROM package WHERE email='$email' AND end_date>'$crdate' AND status='activated'"); 
                $pckgrows = mysqli_num_rows($chkpckg);
                if($pckgrows>0)
                {
                    $row=mysqli_fetch_array($chkpckg);
                    $package=$row['package_name'];
                    if ($package="package1") 
                    {
                        if($package="premium")
                        {
                            $price="0.6";
                        }
                        else
                        {
                            $price="0.4";
                        }
                    }
                    elseif ($package="package2") 
                    {
                        if($package="premium")
                        {
                            $price="1.0";
                        }
                        else
                        {
                            $price="0.86";
                        }
          
                    }
                    else
                    {
                        if($package="premium")
                        {
                            $price="1.6";
                        }
                        else
                        {
                            $price="1.4";
                        }
                    }
                    $q =mysqli_query($db,"INSERT INTO earnings(`email`,`date`,`price`) VALUES('$email','$crdate','$price')");
                }
            }
           
            
            $_SESSION['user']=$email;
            header("location: users/index.php");
        }
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
     <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<!-- header logo section -->
<?php include('inc/body.php')?>
    <!-- slider -->
    <div class="container-fluid faq_slider">
        <div class="faq_slider2">
        <div class="container ">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs1-2">
                <h1 class="text-center mt-5 mb-5 text-light">Member Login</h1>
              </div>
<?php
if (isset($error)) 
{
?>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs1-2">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> <?php echo $error; ?>.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
<?php
}
?>
            </div>
        </div>
    </div>
    </div>

<!-- login system -->


      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">

              <div class="card-body">
                <form method="POST" action="" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="us_name">Email</label>
                    <input id="us_name" type="text" class="form-control" name="email" tabindex="1" required autofocus>
                    
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <!--
                      <div class="float-right">
                        <a href="forget_pass.php" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                      -->
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <br>
                    <div class="g-recaptcha" data-sitekey="6LecP8UZAAAAABjR0OAgJWiTEIPJkuQJM2CTBuJA"></div>
                    
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" name="login_btn" class="btn btn-lg btn-block" tabindex="4" style="background-color: #007c88; color: white;">
                      Login
                    </button>
                  </div>
                </form>


              </div>
            </div>
            <div class="mt-5 mb-5 text-muted text-center">
              Don't have an account? <a href="index.php#slider">Sign Up / Create Account</a>
            </div>
          </div>
        </div>
      </div>



    <!-- footer part -->
  <?php include('users/inc/footer.php'); ?>
 
    <?php include('inc/script.php'); ?>

    </body>

    </html>