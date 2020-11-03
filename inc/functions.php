<?php

set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
include_once 'connect/db.php';
if(session_status() == PHP_SESSION_NONE ){
    session_start();
}

define('PREMIUM_PACKAGE_ID', 4);

function activePackageExists(){
    global $db;
    $useremail= $_SESSION['user'];
    $user_id=$_SESSION['user_id'];
    $chkpackage = ("SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id' AND status='activated' ORDER BY start_date DESC");
    
    $user_packages = mysqli_query($db,$chkpackage);
    if (mysqli_num_rows($user_packages) > 0) 
    {
        return true;
    }
  
    return false;
}

function getActivePackage(){
    global $db;
    $useremail= $_SESSION['user'];
    $user_id=$_SESSION['user_id'];
    $chkpackage = ("SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id' ORDER BY start_date DESC");
    
    $user_packages = mysqli_query($db,$chkpackage);
    if (mysqli_num_rows($user_packages) > 0) 
    {
        $package_item = mysqli_fetch_assoc($user_packages);
        $package = mysqli_query($db, "SELECT * FROM package_list WHERE id='$package_item[package_list_id]'");
        $package_result = mysqli_fetch_assoc($package);
        
        return $package_result;
    }
  
    return null;
}

  function premiumPackageExists(){
    global $db;
    $useremail= $_SESSION['user'];
    $user_id=$_SESSION['user_id'];
    $prm_pckg_id = PREMIUM_PACKAGE_ID;
    $chkpackage = ("SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id' AND package_list_id=$prm_pckg_id AND status='activated' ORDER BY start_date DESC");
    
    $user_packages = mysqli_query($db,$chkpackage);
    if (mysqli_num_rows($user_packages) > 0) 
    {
        return true;
    }
  
    return false;
  }

  function getPremiumPackage(){
    global $db;
    $useremail= $_SESSION['user'];
    $user_id=$_SESSION['user_id'];
    $prm_pckg_id = PREMIUM_PACKAGE_ID;
    $chkpackage = ("SELECT * FROM package WHERE package_list_id=$prm_pckg_id AND start_date < NOW() AND end_date > NOW() AND user_id='$user_id' AND status='activated' ORDER BY start_date DESC");
    
    $user_packages = mysqli_query($db,$chkpackage);
    if (mysqli_num_rows($user_packages) > 0) 
    {
        $result = mysqli_fetch_assoc($user_packages);
        return $result;
    }
  
    return null;
  }