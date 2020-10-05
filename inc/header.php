<?php
    if(session_status() == PHP_SESSION_NONE ){
        session_start(); 
    }
    
?>
<div class="container-fluid" style="background-color: #a92069;display:none">
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

<div class="container-fluid" id="header-nav" style="background-color: #a92069;">
<div class="container">
      <div class="row">
          <div class="col-12">
<nav class="navbar navbar-expand-md navbar-light">
  <a class="navbar-brand" href="index.php#slider">
    <img src="logo.png" id="l-logo" class="d-inline-block align-top" alt="Gold Ads Pack">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
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
</div>