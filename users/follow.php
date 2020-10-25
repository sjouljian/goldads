<?php
set_include_path(get_include_path() . ";" . $_SERVER["DOCUMENT_ROOT"] . "/goldads");
session_start();
include_once '../connect/db.php';
include_once 'inc/functions.php';
if (!isset($_SESSION['user'])) {
  header("location: ../login.php");
} else {
  $activePackageExists = activePackageExists();
  $link_id = (int)$_GET['link'];
  //$premiumPackageExists = premiumPackageExists();
  $useremail = $_SESSION['user'];
  $user_id = $_SESSION['user_id'];
  //$allpackages = mysqli_query($db, "SELECT * FROM package_list WHERE published = 1");
  //$user_packages = mysqli_query($db, "SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id'");
  if ($activePackageExists) {
    $ad = mysqli_query($db, "SELECT * FROM ads AS A 
      WHERE A.`id`='$link_id'");
    //AND (B.`ad_id` IS NULL OR B.`ad_id` IS NOT NULL AND B.`user_id` != '$user_id' B.`date` < CURDATE() - INTERVAL 1 DAY)");
    if (mysqli_num_rows($ad) > 0) {

      $ad_item = mysqli_fetch_assoc($ad);
      $date1 = new DateTime();
      $date2 = new DateTime($ad_item['date_created']);
      $difference = $date2->diff($date1)->days;
      if ($difference <= 30) {
        $ad_view = mysqli_query($db, "SELECT * FROM viewads AS A WHERE A.`user_id`='$user_id' AND A.`date` >= DATE_SUB(NOW(), INTERVAL 24 HOUR)");
        if (mysqli_num_rows($ad_view) < 1) {
          //continue and record visit
          $q = mysqli_query($db, "INSERT INTO viewads(`user_id`,`ad_id`) VALUES('$user_id','$ad_item[id]')");
          header("location: ".$ad_item['link']);
        } else {
          die("Page already visited. Try again later!");
        }
      }
    }
    die("Access denied");
  } else {
    die("Access denied");
  }
}
