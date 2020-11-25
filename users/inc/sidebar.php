<div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
          <div style="background-color:#a92069;text-align:center" class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<?php
set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
include_once 'connect/db.php';

if(session_status() == PHP_SESSION_NONE ){
  session_start();
}
include_once 'inc/functions.php';

$email = $_SESSION['user'];
$user_id = $_SESSION['user_id'];
$balance_query = mysqli_query($db,"SELECT * FROM user_registration WHERE user_id='$user_id'");
$user_row = mysqli_fetch_assoc($balance_query);
//$sum = mysqli_query($db,"SELECT * FROM earnings WHERE user_id='$user_id'");
//$sumearn=0;
//while($row=mysqli_fetch_array($sum))
//{
//  $sumearn += $row['price'];
//}


function getBaseUrl() 
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF']; 

    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    $pathInfo = pathinfo($currentPath); 

    // output: localhost
    $hostName = $_SERVER['HTTP_HOST']; 

    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

    // return: http://localhost/myproject/
    if(substr_count($pathInfo["dirname"], "/") == 1){
        return $protocol.'://'.$hostName.$pathInfo['dirname']."/";
    }
    return $protocol.'://'.$hostName.substr($pathInfo['dirname'], 0,strpos($pathInfo['dirname'], '/', strpos($pathInfo['dirname'], '/') + strlen('/')))."/";
}

?>
            <h6 class="m-auto font-weight-bold" style="color: #fff;">Balance = <?php echo $user_row['balance']; ?>$</h6>
          </div>
        <!-- Card Body -->
          <div class="card-body left-sidebar">

            <a href="users/index.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black; ">Dashboard</a>
            <a href="users/profile.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black; ">Profile</a>
            <a href="users/uploadad.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black; ">My ads</a>
            <?php if(activePackageExists()){?>
                <a href="users/paid.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black; "> Ads</a>
            <?php } ?>
            <a href="users/withdraw.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black; ">Withdraw</a>
            <a href="users/refrals.php"  class="btn mb-2 bg-light " style=" color:black; ">Referral Link</a>
            <a href="users/contactus.php"  class="btn mb-2 bg-light " style="color:black; ">Contact Us</a>
            <a href="users/logout.php"  class="btn bg-light" style=" color:black; height:40px;  ">Log Out</a>
          </div>
        </div>
      </div>