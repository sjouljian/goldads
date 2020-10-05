<?php
set_include_path(get_include_path().":".$_SERVER["DOCUMENT_ROOT"]."/goldads");
?>
<html lang="en">
<head><meta charset="windows-1252">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title >Gold Ads Pack</title>
    <?php include('inc/head.php')?>

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
<?php 
      include_once 'inc/header.php';
?>

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