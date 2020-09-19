<?php
//include('../connect/db.php');

?>
<html lang="en">
<head><meta charset="windows-1252">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title >Gold Ads Pack</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    
    <script src="https://kit.fontawesome.com/19d077c931.js" crossorigin="anonymous"></script>
   <style>
       .content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}
   </style>
</head>
<body>
<!-- header logo section -->
<div class="container-fluid" style="background-color: #007c88;">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <img src="../logo.png" id="l-logo"  onclick="window.location.href='index.php#slider';" height="70px" width="70px"/><br><span class="font-weight-bold" style="color: goldenrod;">Gold</span> <span  class="font-weight-bold" style="color:red;">Ad</span> <span   class="font-weight-bold"style="color:black;">Pack</span>
      </div>  
     
    </div>     
  </div>
</div>

<!-- slider -->
<div class="container-fluid how_slider">
  <div class="how_slider2">
    <div class="container ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs1-2">
          <h1 class="text-center mt-5 mb-5 text-light">Read Solo Ads</h1>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- main -->

<div class="container-fluid mt-5">
  <div class="container">
    <div class="row">
      <!-- Pie Chart -->
      <?php include('inc/sidebar.php'); ?>
      <div class="col-xl-9 col-lg-">
        <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
          <br> <br>
<?php


$crdate=date("d.m.Y");
$useremail= $_SESSION['user'];
$chkpackage = ("SELECT * FROM package WHERE start_date<'$crdate' AND end_date>'$crdate' AND email='$useremail'");
$rchkpckg = mysqli_query($db,$chkpackage);
if (mysqli_num_rows($rchkpckg)>0) 
{
  $chkviewads=("SELECT * FROM viewads WHERE date='$crdate'");
  $rchkviewads = mysqli_query($db,$chkviewads);
  if (mysqli_num_rows($rchkviewads)<1) 
  {
    $ads = ("SELECT * FROM ads");
    $adsresult = mysqli_query($db,$ads);
    while ($row=mysqli_fetch_array($adsresult)) 
    {
      $link=$row['link'];
      $q =mysqli_query($db,"INSERT INTO viewads(`date`,`link`) VALUES('$crdate','$link')");
    }
  }
}


$query = ("SELECT * FROM ads");
$result = mysqli_query($db,$query);
$count=1;
while ($row=mysqli_fetch_array($result)) 
{

?>
          <button style="color:#007c88;" onclick="window.location.href='add.php?link=<?php echo $row['link'] ?>';" formtarget="_blank"><b>ad<?php echo $count; ?>: click to Earn Cash</b></button>
<?php
$count++;
}
?>
          
        <br><br>
    </div>
  </div>
</div>

                <!-- ////////////////////// -->
              
                 <!-- ///////////////////////////////// -->
                 
      </div>
    </div>

                     <!-- ///////////////////////////////// -->       
  </div>
</div>
                      </div>
                      <!-- logo section -->
                      

              <!--footer section -->
             <?php include('inc/footer.php'); ?>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
</body>
</html>