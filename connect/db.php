<?php
session_start();
$db=mysqli_connect('localhost','root','','goldadsp_main');
if($db){
	//echo "Database Connected";
}else{
	mysqli_error($db);
}

 ?>