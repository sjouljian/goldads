<?php

if (!function_exists('getBaseUrl')) {
    function getBaseUrl()
    {
        // output: /myproject/index.php
        $currentPath = $_SERVER['PHP_SELF'];

        // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
        $pathInfo = pathinfo($currentPath);

        // output: localhost
        $hostName = $_SERVER['HTTP_HOST'];

        // output: http://
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';

        // return: http://localhost/myproject/
        if (substr_count($pathInfo["dirname"], "/") == 1) {
            return $protocol . '://' . $hostName . $pathInfo['dirname'] . "/";
        }
        return $protocol . '://' . $hostName . substr($pathInfo['dirname'], 0, strpos($pathInfo['dirname'], '/', strpos($pathInfo['dirname'], '/') + strlen('/'))) . "/";
    }
}
?>
<div class="container-fluid mb-0" style="background-color: #a91c68;">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-12 my-2 text-center d-table">
                <div class="card-body d-table-cell">
                    <img src="assets/img/coinpayments-logo.png" alt="Coin Payments Logo">
                </div>
            </div>
            <!-- <div class="col-xl-8 col-md-8 col-sm-12 my-2 text-center d-block font-weight-bold text-white">
            © 2020 - All Rights Reserved - Gold Ads Pack
        </div> -->

            <div class="col-xl-4 col-md-4 col-sm-12 my-2 text-center d-flex">
                <div class="card-body d-table-cell align-middle font-weight-bold text-white my-auto">
                    © 2020 - All Rights Reserved - Gold Ads Pack
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12 my-2 text-center d-flex">
                <div class="card-body d-table-cell align-middle font-weight-bold text-white my-auto">
                    <span id='ct' ></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/script.php'); ?>
<script type="text/javascript">
    function display_c() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct()', refresh)
    }

    function display_ct() {
        var x = new Date();
        var x1=x.toLocaleString("en-GB", {timeZone: "Asia/Yerevan"});
        document.getElementById('ct').innerHTML = x1 + " UTC +4";
        display_c();
    }

    $(document).ready(function(){
        display_ct();
    })
</script>