<?php

set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
include_once 'connect/db.php';

$merchant_id = '6351bd15b4a1ed844e5c5d6a5372a982';
$secret = 'V4Uv-9Y4T+jJKu=s';

if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
  die("No HMAC signature sent");
}

$merchant = isset($_POST['merchant']) ? $_POST['merchant']:'';
if (empty($merchant)) {
  die("No Merchant ID passed");
}

if ($merchant != $merchant_id) {
  die("Invalid Merchant ID");
}

$request = file_get_contents('php://input');
if ($request === FALSE || empty($request)) {
  die("Error reading POST data");
}

$hmac = hash_hmac("sha512", $request, $secret);
if ($hmac != $_SERVER['HTTP_HMAC']) {
  die("HMAC signature does not match");
}

    $ipn_type = $_POST['ipn_type'];
    $txn_id = $_POST['txn_id'];
    $item_name = $_POST['item_name'];
    //$item_number = $_POST['item_number'];
    $amount1 = floatval($_POST['amount1']);
    $amount2 = floatval($_POST['amount2']);
    $currency1 = $_POST['currency1'];
    $currency2 = $_POST['currency2'];
    $status = intval($_POST['status']);
    $status_text = $_POST['status_text'];
    $invoice_num = $_POST['invoice'];

    $invoice_query = mysqli_query($db, "SELECT * FROM package WHERE pckg_id='$invoice_num'");

    if(mysqli_num_rows($invoice_query) > 0){

        $invoice = mysqli_fetch_assoc($invoice_query);
        $package_query = mysqli_query($db, "SELECT * FROM package_list WHERE id='$invoice[package_list_id]'");


        if(mysqli_num_rows($package_query) > 0){

            $package = mysqli_fetch_assoc($package_query);
            $order_total = $package['price'];

            if ($amount1 < $order_total) {
                die('Amount is less than order total!');
            }
        
            if ($status >= 100 || $status == 2) {

                $update_invoice=mysqli_query($db,"UPDATE package SET status='activated' WHERE pckg_id='$invoice_num'");
                $q =mysqli_query($db,"INSERT INTO transactions(`package_id`,`amount`,`reason`) VALUES('$invoice_num','$amount1','deposit')");
                

                // payment is complete or queued for nightly payout, success
            }
        }
    }
?>