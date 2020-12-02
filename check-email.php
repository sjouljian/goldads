<?php
session_start();
include_once 'connect/db.php';
include_once 'inc/functions.php';
if (!isset($_SESSION['user'])) 
{
    header("HTTP/1.1 401 Unauthorized");
    exit;
}
else{
  if(isset($_POST['user_email']))
  {
  $useremail= $_SESSION['user'];
  $user_id= $_SESSION['user_id'];
  $username = $_SESSION['user_name'];
  $inputMail = $_POST['user_email'];
  $user_info_query = mysqli_query($db, "SELECT * FROM user_registration WHERE user_email = '$inputMail'");
  $user_info = mysqli_num_rows($user_info_query);
  $user_info_result = mysqli_fetch_assoc($user_info_query);
  if(($user_info > 0 && $useremail == $inputMail) || $user_info <= 0)
    $result = true; 
  else 
    $result = false;
    echo json_encode($result);
  }
  die();
  //$allpackages = mysqli_query($db, "SELECT * FROM package_list WHERE published = 1");
  //$user_packages = mysqli_query($db, "SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id' AND status='activated'");
}

?>