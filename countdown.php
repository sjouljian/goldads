<?php

include_once 'connect/db.php';

$reflink = "";
if (isset($_GET['email'])) 
{
    $ref=$_GET['email'];
    $checkref = mysqli_query($db,"SELECT * FROM user_registration WHERE user_email='$ref'");
    $refrows = mysqli_num_rows($checkref);
    if($refrows>0)
    {
       $reflink=$ref;
    }
    else
    {
        $reflink="no ref";
    }
}
if (isset($_POST['reg_btn'])) 
{
    if( /*isset($_POST['accept'])*/true )
    {
        $fullname=$_POST['full_name'];
        $username=$_POST['user_name'];
        $usermail=$_POST['user_email'];
        $userphone=$_POST['user_phone'];

        $userpassword=md5($_POST['user_password']);


        $query = mysqli_query($db,"SELECT * FROM user_registration WHERE user_email='$usermail'"); 
        $numrows = mysqli_num_rows($query);
        if($numrows<1)
        {
    
            $q =mysqli_query($db,"INSERT INTO user_registration(`full_name`,`user_name`,`user_email`,`user_phone`, `user_password`,`refral`) VALUES('$fullname','$username','$usermail','$userphone','$userpassword','$reflink')");
            if ($q) 
            {
                //$_SESSION['user']=$usermail;
                //header("location: users/index.php");
                $msg="Registration completed";
            }
            else
            {
                $error="Something went wrong ";
            }
        }
        else
        {
            $error="Email already Used ";
        }
    }
    else
    {
        $error="Kindly accept the terms and condittions ";
    }
  
}
 ?>
<html>

<head>
    <title >Gold Ads Pack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="/goldads/" />
    <link rel="stylesheet" href="assets/css/style.css?v=3534">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="icon" type="image/png" href="favicon.png" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
</head>

<body style="background-image:url('assets/img/gold-home-slider-background.jpg');background-size:cover;background-repeat:no-repeat;background-position:center">
    <div class="container countdown-template" style="position: relative;">
        <div class="home-counter">
            <div class="row">
                <div class="col-md-12">
                    <img src="logo.png" width="190px" class="mb-4" alt="Gold Ads Pack">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-white">LAUNCHING SOON</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-white" id="clock"></h3>
                </div>
            </div>
            <br>
            <hr style="height: 2px;
    width: 50px;
    background: white;">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-white">STAY TUNED!</h2>
                </div>
            </div>
        </div>
        <div class="home-form">
        <?php
if(isset($msg) || isset($error)) echo '<div class="col-xl-12 my-2 px-0">';
if (isset($msg)) 
{
?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:left">
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
}  if(isset($msg) || isset($error)) echo '</div>';?>
            <p class="text-white" style="margin-bottom: 50px;">Gold Ads Pack offers you to earn money on viewing ad units and attracting referrals. Watch commercial advertising, and we will credit up to 150% a month to your account. Attract referrals and get 10% from their deposits transferred to your account. It seems to be the most profitable offer on the market of paid advertising at the time! Just by viewing 10 ADS a day you will earn your % earning based on which ad pack you have bought. Withdrawals are possible at any given time and take up to 3 working days for safety reasons. For more information check out our F.A.Q. and Rules or Contact us if you have specific questions.</p>
            <h1 class="text-white" style="text-align: left;">Register now!</h1>
            <form class="form-group d-block" action="" method="POST">
                <input type="text" class="form-control my-3 mb-4" placeholder="Full Name" name="full_name" required>
                <input type="text" class="form-control my-3 mb-4" placeholder="Username" name="user_name" required>
                <input type="email" class="form-control my-3 mb-4" placeholder="Email" name="user_email" required>
                <!-- <input type="tel" class="form-control my-3 mb-4" placeholder="Phone" name="user_phone" required> -->
                <input type="password" class="form-control my-3 mb-3" placeholder="Password" name="user_password" minlength="8" required>
                <!--<p style="color: white;" style="display:none"><input type="checkbox" name="accept" required /> I Accept <a href="" data-toggle="modal" data-target="#exampleModal">terms & conditions</a>.</p>-->

                <button type="submit" name="reg_btn" class="form-control btn btn-submit my-2 bg-selected text-light">Register now</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        // Turn on Bootstrap
        $('[data-toggle="tooltip"]').tooltip();

        // 15 days from now!
        function get15dayFromNow() {
            return new Date(new Date().valueOf() + 16 * 24 * 60 * 60 * 1000);
        }

        var $clock = $('#clock');

        $clock.countdown(new Date("2020-10-16T15:00:00.000+00:00"), function(event) {
            $(this).html(event.strftime('%D DAYS %H HOURS %M MINUTES LEFT'));
        });
    </script>
</body>

</html>