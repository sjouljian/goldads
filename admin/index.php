
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include("inc/sidebar.php"); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
       <!-- Main Content -->
      <div id="content">

        <?php include("inc/nav.php"); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          

          

          <!-- Content Row -->

          <div class="row">

            <!-- Pie Chart -->
            <div class="col-xl-5 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold" style="color: #007c88;">My profile</h6>
                 </div>
<?php
if(isset($_POST['update']))
{    
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_SESSION['admin'];
    $password=$_POST['password'];
    $query=mysqli_query($db,"UPDATE admin SET name='$name',mobile='$mobile',email='$email',password='$password' WHERE email='$email'");
    if ($query) 
    {
        $msg="Successfully Updated";
    }
    else
    {
        $error="Something went wrong";
    }
}

?>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="container-fluid">
                        <center>
                            <img src="../upload/<?php echo $image; ?>" width="200px" height="200px" style="border-radius: 50%;">
                        </center>
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
            
                            <form method="POST" enctype="multipart/form-data">
                               <div class="row">
                                   <div class="col-sm-12">
                                       <div class="form-group">
                                           <label>Name:</label>
                                           <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                                       </div>
                                       <div class="form-group">
                                           <label>Mobile:</label>
                                           <input type="number" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
                                       </div>
                                       
                                       <div class="form-group">
                                           <label>Password:</label>
                                           <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                       </div>
                                   </div>
                                   <button type="submit" name="update" class="btn btn-success">Update</button>
                               </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="color: #007c88;">Add Admin</h6>
                    </div>
<?php
if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $filename=$_FILES['image']['name'];
    $tempname1=$_FILES['image']['tmp_name'];

    move_uploaded_file($tempname1,"../upload/$filename");

   $query = ("SELECT * FROM admin WHERE email='$email'");
                    
    $result = mysqli_query($db,$query);
    
    if(mysqli_num_rows($result)<1)
    {
       $sql="INSERT INTO admin(name,mobile,image,email,password) VALUES('$name','$mobile','$filename','$email','$password')";

       if(mysqli_query($db,$sql))
       {
            $addmsg="Successfully added";
       }
       else
       {
            $adderror="Something went wrong";
       } 
    }
    else
    {
        $adderror="Email already exist";
    }
}

?>
                    <!-- Card Body -->
                    <div class="card-body">
                                    <?php
            if (isset($addmsg))
            {
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> <?php echo $addmsg; ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
              <?php
              }
              if (isset($adderror))
              {
              ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops!</strong> <?php echo $adderror; ?>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
              <?php
              }
              ?>
                        <form method="POST" enctype="multipart/form-data">
                               <div class="row">
                                   <div class="col-sm-12">
                                       <div class="form-group">
                                           <label>Name:</label>
                                           <input type="text" name="name" class="form-control">
                                       </div>
                                       <div class="form-group">
                                           <label>Mobile:</label>
                                           <input type="number" name="mobile" class="form-control">
                                       </div>
                                       <div class="form-group">
                                           <label>Image:</label>
                                           <input type="file" name="image" class="form-control">
                                       </div>
                                       <div class="form-group">
                                           <label>Email:</label>
                                           <input type="email" name="email" class="form-control">
                                       </div>
                                       <div class="form-group">
                                           <label>Password:</label>
                                           <input type="password" name="password" class="form-control">
                                       </div>
                                   </div>
                                   <button type="submit" name="add" class="btn btn-success">Add Admin</button>
                               </div> 
                            </form>
                    </div>
                </div>
            </div>
        </div>


          </div>

         
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <span style="color: goldenrod;">Gold</span> <span style="color: red;">Ads</span> <span style="color:black;">Pack</span> <apan></span> 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
