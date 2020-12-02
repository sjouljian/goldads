<?php
set_include_path(get_include_path().";".$_SERVER["DOCUMENT_ROOT"]."/goldads");
session_start();
include_once '../connect/db.php';
include_once 'inc/functions.php';
if (!isset($_SESSION['user'])) 
{
    header("HTTP/1.1 401 Unauthorized");
    exit;
}
else{
    $status = 200;
    $useremail= $_SESSION['user'];
    $user_id= $_SESSION['user_id'];
    $username = $_SESSION['user_name'];
    $user_query = mysqli_query($db, "SELECT * FROM user_registration WHERE user_id = '$user_id'");
    $user_result = mysqli_fetch_assoc($user_query);
    $password = md5($_POST['password']);
    

    if( $user_result['user_password'] == $password ){
        
        if(isset($_POST['full_name']) && isset($_POST['password'])){
            $full_name = $_POST['full_name'];
            $email = $_POST['user_email'];
            $query=mysqli_query($db, "UPDATE user_registration SET full_name='$full_name',user_email='$email',user_password='$password' WHERE user_id='$user_id'");
        }
        if(isset($_POST['password']) && isset($_POST['newPassword'])){
            $query=mysqli_query($db, "UPDATE user_registration SET user_password='$password' WHERE user_id='$user_id'");
        }

        if ($query) 
        {
            $msg="Successfully Updated";
        }
        else
        {
            $msg="Something went wrong";
            $status = 400;
        }
    }
    else{
        $msg="Wrong old password!";
        $status = 400;
    }

    echo json_encode((object)[
        'message' => $msg,
        'status' => $status
   ]);
}

?>