<?php

set_include_path(get_include_path().":".$_SERVER["DOCUMENT_ROOT"]."/goldads");
include_once 'connect/db.php';
if(session_status() == PHP_SESSION_NONE ){
    session_start();
}

const PREMIUM_PACKAGE_ID = 4;

function activePackageExists(){
    global $db;
    $useremail= $_SESSION['user'];
    $user_id=$_SESSION['user_id'];
    $chkpackage = ("SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id' ORDER BY start_date DESC");
    
    $user_packages = mysqli_query($db,$chkpackage);
    if (mysqli_num_rows($user_packages) > 0) 
    {
        return true;
    }
  
    return false;
  }

  function premiumPackageExists(){
    global $db;
    $useremail= $_SESSION['user'];
    $user_id=$_SESSION['user_id'];
    $chkpackage = ("SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id' AND package_list_id=4 ORDER BY start_date DESC");
    
    $user_packages = mysqli_query($db,$chkpackage);
    if (mysqli_num_rows($user_packages) > 0) 
    {
        return true;
    }
  
    return false;
  }