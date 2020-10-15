<?php 

$section_locked = true;
set_include_path(get_include_path().":".$_SERVER["DOCUMENT_ROOT"]."/goldads");
include_once '../connect/db.php';
if(session_status() == PHP_SESSION_NONE ){
    session_start();
}


$useremail= $_SESSION['user'];
$user_id=$_SESSION['user_id'];
$chkpackage = ("SELECT * FROM package WHERE start_date < NOW() AND end_date > NOW() AND user_id='$user_id' ORDER BY start_date DESC");

$user_packages = mysqli_query($db,$chkpackage);
if (mysqli_num_rows($user_packages) > 0) 
{
  $row = mysqli_fetch_assoc($user_packages);
  $row_id = $row['package_list_id'];
  $package = mysqli_query($db,("SELECT * FROM package_list WHERE id='$row_id'"));
  $package_rows = mysqli_fetch_assoc($package);

  $user_ads = mysqli_query($db,("SELECT * FROM ads WHERE user_id='$user_id'"));

  if(mysqli_num_rows($user_ads) >= $package_rows['sites']){
    $section_locked = true;
  }

}
else{
  $section_locked = true;
}

if(isset($_POST['add']))
{                     
  $name = $_POST['name'];
  $link = $_POST['link'];

  $crdate=new DateTime();
  $crdate=$crdate->format('Y-m-d H:i:s');
  $useremail= $_SESSION['user'];
  $chkpackage = ("SELECT * FROM package WHERE start_date<'$crdate' AND end_date>'$crdate' AND email='$useremail' ORDER BY start_date DESC");

  $rchkpckg = mysqli_query($db,$chkpackage);
  if (mysqli_num_rows($rchkpckg)>0) 
  {
      $result = mysqli_fetch_assoc($rchkpckg);
  }




  $sql="INSERT INTO ads(name,link) VALUES('$name','$link')";
  
  if(mysqli_query($db,$sql))
  {
    $msg="Successfully added";
  }
  else
  {
    $error="Something went wrong";
  }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title >Gold Ad Pack</title>
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
<?php
if (isset($msg)) 
{
?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Congratulation!</strong> <?php echo $msg; ?>.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
<?php
}
if (isset($error)) 
{
?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Oops!</strong> <?php echo $error; ?>.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
<?php
}
?>
                <div class="card shadow mb-4">
                <?php if(!$section_locked){?>
                <centre><h1>Add Site</h1></centre>
                <hr>
                <div class="row">
                    <div class="col-sm-8 offset-2">
                      <form method="POST" enctype="multipart/form-data">
                        <label>Site Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter ad name">
                        <label>Link</label>
                        <input type="url" name="link" class="form-control" placeholder="http://www.example.com">
                        <br>
                        <button type="submit" name="add" class="btn btn-success">Add</button>
                        <br> 
                      </form>
                    </div>
                    <div class="col-sm-2"></div>  
                </div>
                <?php }else{?>
                <centre><h1>You don't have any active package or you have reached maximum ads.</h1></centre>
                <?php } ?>
                </div>
            </div>
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