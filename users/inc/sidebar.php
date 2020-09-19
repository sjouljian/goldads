<div class="col-xl-3 col-lg-5">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<?php
set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
include_once 'connect/db.php';
$email=$_SESSION['user'];
$sum = mysqli_query($db,"SELECT * FROM earnings WHERE email='$email'");
$sumearn=0;
while($row=mysqli_fetch_array($sum))
{
  $sumearn += $row['price'];
}


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
            <h6 class="m-0 font-weight-bold" style="color: #007c88;">Balance = <?php echo $sumearn; ?>$</h6>
          </div>
        <!-- Card Body -->
          <div class="card-body">

            <a href="<?php echo getBaseUrl();?>users/index.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black;width:180px; ">Dashboard</a>
            <a href="<?php echo getBaseUrl();?>users/uploadad.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black;width:180px; ">Add Site</a>
            <a href="<?php echo getBaseUrl();?>users/paid.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black;width:180px; "> Ads</a>
            <a href="<?php echo getBaseUrl();?>users/withdraw.php"  class="btn mb-2 bg-light " style="background-color: #007c88; color:black;width:180px; ">Withdraw</a>
            <a href="<?php echo getBaseUrl();?>users/refrals.php"  class="btn mb-2 bg-light " style=" color:black;width:180px; ">Referral Link</a>
            <a href="<?php echo getBaseUrl();?>users/contactus.php"  class="btn mb-2 bg-light " style="color:black;width:180px; ">Contact Us</a>
            <a href="<?php echo getBaseUrl();?>users/logout.php"  class="btn bg-light" style=" color:black; height:40px; width:180px; ">Log Out</a>
          </div>
        </div>
      </div>