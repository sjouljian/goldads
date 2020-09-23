<?php 
//include ('../connect/db.php');                    
if(isset($_POST['add']))
{                     
  $name = $_POST['name'];
  $link = $_POST['link'];

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