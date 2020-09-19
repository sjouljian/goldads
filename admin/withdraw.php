
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
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="color: #007c88;">Withdraw Request</h6>
                        <button class="btn btn-danger" onclick="window.location.href='paidwithdraw.php';">Paid Withdraw</button>
                    </div>
<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql = "UPDATE withdrawreq SET status='paid' WHERE id='$id'";
    $query=mysqli_query($db,$sql);


    if($query)
    {
        $msg="Successfully Paid";
    }
    else
    {
        $error="Something went wrong";
    } 
   
}

?>
                    <!-- Card Body -->
                    <div class="card-body">
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
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Wallet ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
<?php

$query = ("SELECT * FROM withdrawreq WHERE status='verified'");
                    
$result = mysqli_query($db,$query);
while ($row=mysqli_fetch_array($result))
{
    $id=$row['id'];
    $email=$row['email'];
    $wallet_id=$row['wallet_id'];
    $amount=$row['amount'];
    $status=$row['status'];
                   
?>
                            <tr>
                                <th scope="row"><?php echo $id; ?></th>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $wallet_id; ?></td>
                                <td><?php echo $amount; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><button class="btn btn-success" onclick="window.location.href='withdraw.php?id=<?php echo $id; ?> ';">Paid</button></td>
                            </tr>
<?php
}
?>
                        </tbody>
                    </table>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
