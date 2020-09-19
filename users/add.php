<?php
include '../connect/db.php';

if (isset($_GET['link'])) 
{
  $link=$_GET['link'];
}

function ex()
{
  $q =mysqli_query($db,"INSERT INTO user_registration(`full_name`,`user_name`,`user_email`,`user_password`,`refral`) VALUES('$fullname','$username','$usermail','$userpassword','$ref')");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title >Gold Ads Pack</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    
    <!-- <script src="https://kit.fontawesome.com/19d077c931.js" crossorigin="anonymous"></script> -->
   <style>
       .head{
           background-color:#007c88;
       }
       h1{
           font-size:25px;
           color:white;
           text-align: center; 
       }
       #txt{
        font-size:25px;
           color:white;
           text-align: center; 
       }
   </style>
</head>
<body>
<div class="container-fluid head" style="background-color: #007c88;">
  <div class="container">
    <div class="row text-centre arr">
      <div class="col-sm-2">
        <img src="../logo.png" id="l-logo"  onclick="window.location.href='index.php#slider';" height="70px" width="70px"/><br><span class="font-weight-bold" style="color: goldenrod;">Gold</span> <span  class="font-weight-bold" style="color:red;">Ads</span> <span   class="font-weight-bold"style="color:black;">Pack</span>

      </div>
      <div class="col-sm-10">
        <h1 id="txt1"><b>Please wait for 15 seconds to earn</b></h1> &nbsp; <h1 id="sec">0</h1>&nbsp;<h1 id="txt2"><b> Seconds</b></h1>
        <h id="txt"><b></b></h1>

        
      </div>
      
    </div>
    <div class="row text-centre cr">
      <script>
        var sec=0;
        var second=document.getElementById('sec');
        var interval;
        var prit=0;
        interval= setInterval(timer,1000)
        function timer(){
        sec++;
        second.innerHTML=sec;
        if (sec>=16) 
        { 
          sec=15;  
          prit++
        } 
        if (prit===1)
        {
          document.getElementById("txt").innerHTML = "credit has been deposit to your Acount";
          prit=1; 
          $('#txt1').hide(); 
          $('#sec').hide(); 
          $('#txt2').hide(); 
        }  
        }
      </script>
    </div>
  </div>
</div>




<div class="container-fluid head">
     <a href="<?php echo $link; ?>" class="btn  btn-success">Visit Site</a>
        <a href="index.php" class="btn  btn-success">Back to the site Site</a>
     <iframe src="<?php echo $link; ?>" width="100%" height="700" frameborder="0"></iframe>    
   
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>