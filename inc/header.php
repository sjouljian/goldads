<div class="container-fluid" style="background-color: #007c88;">
    <div class="container">
        <div class="row">
           <div class="col-6">
               <img src="logo.png" id="l-logo"  onclick="window.location.href='index.php#slider';" height="70px" width="70px"/>
               <br>
               <!-- <span class="font-weight-bold" style="color: goldenrod;">Gold</span> <span  class="font-weight-bold" style="color:red;">Ads</span> <span   class="font-weight-bold"style="color:black;">Pack</span> -->
           </div>

           


        </div>
      
    </div>

</div>
<nav id="navMenu">
<div class="container-fluid" style="background-color: #007c88;">
      <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-expand-md navbar-light py-2">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  justify-content-center" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="index.php" class="nav-item nav-link text-light px-3">Home</a>
                    
                    <a href="faq.php" class="nav-item nav-link text-light px-3">F.A.Q</a>
                    <a href="rules.php" class="nav-item nav-link text-light px-3">Rules</a>
                    <a href="contact.php" class="nav-item nav-link text-light px-3">Contact us</a>
                    <?php if (!isset($_SESSION['user'])) 
                    {?>
                        <a href="login.php" class="nav-item nav-link text-light px-3">Login</a>
                    <?php }else{?>
                        <a href="users/index.php" class="nav-item nav-link text-light px-3">My Account</a>
                    <?php } ?>
                </div> 
            </div>
            </nav>



     </div>
    </div>
</div>
</nav>