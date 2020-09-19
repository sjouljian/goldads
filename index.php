<?php

include_once 'connect/db.php';
if (isset($_GET['email'])) 
{
    $ref=$_GET['email'];
    $checkref = mysqli_query($db,"SELECT * FROM user_registration WHERE user_email='$ref'");
    $refrows = mysqli_num_rows($checkref);
    if($refrows>0)
    {
       $reflink=$ref;
    }
    else
    {
        $reflink="no ref";
    }
}
if (isset($_POST['reg_btn'])) 
{
    if( isset($_POST['accept']) )
    {
        $fullname=$_POST['full_name'];
        $username=$_POST['user_name'];
        $usermail=$_POST['user_email'];
        $userphone=$_POST['user_phone'];

        $userpassword=md5($_POST['user_password']);


        $query = mysqli_query($db,"SELECT * FROM user_registration WHERE user_email='$usermail'"); 
        $numrows = mysqli_num_rows($query);
        if($numrows<1)
        {
    
            $q =mysqli_query($db,"INSERT INTO user_registration(`full_name`,`user_name`,`user_email`,`user_phone`, `user_password`,`refral`) VALUES('$fullname','$username','$usermail','$userphone','$userpassword','$reflink')");
            if ($q) 
            {
                $_SESSION['user']=$usermail;
                header("location: users/index.php");
            }
            else
            {
                $error="Something went wrong ";
            }
        }
        else
        {
            $error="Email already Used ";
        }
    }
    else
    {
        $error="Kindly accept the terms and condittions ";
    }
  
}
 ?>



<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
  <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title >Gold Ads Pack</title>
      <base href="/goldads/" />
   <?php include('inc/head.php')?>


</head>
<body>


<?php include('inc/body.php')?>



<!-- body slider portion -->
<div class="container-fluid  slider" id="slider" >
  <div class="inner">
    <div class="container py-5 cn">
      <div class="row no-gutter justify-content-center ">
          <div class="col-xl-4 my-3">
          <form class="form-group d-block" action="" method="POST">
                  <input type="text" class="form-control my-3 mb-4" placeholder="Full Name" name="full_name" required>
                  <input type="text" class="form-control my-3 mb-4" placeholder="Username" name="user_name" required>
                  <input type="email" class="form-control my-3 mb-4" placeholder="Email" name="user_email" required>
                  <input type="tel" class="form-control my-3 mb-4" placeholder="Phone" name="user_phone" required>
                  <input type="password" class="form-control my-3 mb-3" placeholder="Password"  name="user_password" minlength="8" required>
                  <p style="color: white;"><input type="checkbox" name="accept" required/> I Accept <a href="" data-toggle="modal" data-target="#exampleModal">terms & conditions</a>.</p>
                  
                  <button type="submit"  name="reg_btn" class="form-control my-2 bg-selected text-light" style="background-color: #007c88; border-color: #007c88;">Register now</button>
                </form>
          </div>
        <div class="col-xl-4 my-3">
           <form action="">

            <marquee direction="up" height="280" scrollamount="0" style="color: white;" class="tect-center" >
                <h2>  PURCHASE GOLD ADS PACK!</h2>

                      The Gold Ads Pack offers you to earn money on viewing ad units and attracting referrals.
Watch commercial advertising, and we will credit up to 150% a month to your account.
Attract referrals and get 10% from their deposits transferred to your account.
It seems to be the most profitable offer on the market of paid advertising at the time!
Your earnings is depend on how much you invest by buying the AdPacks.
Just by viewing 10 ADS a day you will earn your % earning based on which adpack you have bought,
All earned funds are saved in your personal account.
withdraw are possible at any given time and get it within 3 working days for safety reasons
To get more information read the rules of the site or click on Contact Us if you have specific questions.
              </marquee>
           </form>
        </div>
              
<?php
if(isset($msg) || isset($error)) echo '<div class="col-xl-4 my-2">';
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
if(isset($msg) || isset($error)) echo '</div>';
?>
             

      </div>

    </div>

   </div>

</div>
<!-- body our number section -->
<div class="container-fluid my-4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5 font-weight-bold" style="font-size: 26px;">Our Numbers</div>
                <div class="col-xl-3 col-md-3 col-sm-12 col-xs-12 my-4">
                    <?php
                        $sum = mysqli_query($db,"SELECT * FROM earnings");
                        $sumearn=0;
                        while($row=mysqli_fetch_array($sum))
                        {
                            $sumearn += $row['price'];
                        }
                    ?>
                    <h1  class="text-center" ><?php echo $sumearn; ?>$</h1>
                    <div class="progress my-1">
                        <div class="progress-bar" style="width: 60%; background-color: #daa520;"><?php echo $sumearn; ?></div>
                    </div>
                    <p class="text-center my-1 font-weight-bold">Total Earned</p>
                </div>
                <div class="col-xl-3 col-md-3 col-sm-12 col-xs-12 my-4">
                    <?php
                        $sum = mysqli_query($db,"SELECT * FROM withdrawreq WHERE status='paid'");
                        $sumearn=0;
                        while($row=mysqli_fetch_array($sum))
                        {
                            $sumearn += $row['amount'];
                        }
                    ?>
                    <h1  class="text-center" ><?php echo $sumearn; ?>$</h1>
                    <div class="progress my-1">
                        <div class="progress-bar" style="width: 60%; background-color: #daa520;"><?php echo $sumearn; ?></div>
                    </div>
                    <p class="text-center my-1 font-weight-bold">Total Paid</p>
                </div>
  <div class="col-xl-3 col-md-3 col-sm-12 col-xs-12 my-4">
<?php
$members = mysqli_query($db,"SELECT * FROM user_registration");
$tmembers = mysqli_num_rows($members);

?>
    <h1   class="text-center" ><?php echo $tmembers; ?></h1>
    <div class="progress my-1">
        <div class="progress-bar" style="width: 30%; background-color: #daa520;"><?php echo $tmembers; ?></div>

    </div>
    <p class="text-center my-1 font-weight-bold">Total Members</p>
  </div>
  <div class="col-xl-3 col-md-3 col-sm-12 col-xs-12 my-4">
<?php
$ads = mysqli_query($db,"SELECT * FROM ads");
$tads = mysqli_num_rows($ads);

?>
    <h1 class="text-center"  ><?php echo $tads; ?></h1>
    <div class="progress my-1">
        <div class="progress-bar" style="width: 2%; background-color: #daa520;"><?php echo $tads; ?></div>

    </div>
    <p class="text-center my-1 font-weight-bold">Total Ads</p>
  </div>
  <div class="col-xl-2 col-md-2"></div>
  
  

  <div class="col-xl-2 col-md-2"></div>
  </div>

 </div>
</div>
</div>
<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Read Terms & Conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <pre>
The following Terms and Conditions control your membership in GoldAdsPack Service. You agree that you have read and understand this Agreement and that your membership in GoldAdsPack shall be subject to the following Terms and Conditions between you GoldAdsPack. These Terms and Conditions may be modified at any time by GoldAdsPack. Please review them from time to time since your ongoing use is subject to the terms and conditions as modified. Your continued participation in GoldAdsPack. after such modification shall be deemed to be your acceptance of any such modification. If you do not agree to these Terms and Conditions, please do not register to become a member of GoldAdsPack

AGE Limit
You must be 18 years of age or older to participate and must must provide GoldAdsPack with accurate, complete and updated registration information, including an accurate name, mailing address and email address. You may cancel your account anytime.

Cheating
If you cheat or attempt to cheat in any way, your account WILL be terminated with out refund, and will not be allowed to resign up for GoldAdsPack. You will then forfeit all earnings and referrals! GoldAdsPack will regularly run a program for searching after cheating members, by scanning for IP-address, email, password, name, and e-currency account. Member?s with one of these characters showing up twice WILL have both accounts deleted, and all upgrades and referrals lost.

Commissions
You agree to receive any earned commissions through the allowed processors Only.
When you reach the treshold of the minimum required to cashout you will be allowed to request a withdraw from the Withdrawal page. We pay out with the " 3 working days " formula, we have no reason to keep the money in our accounts but we pay only 1 payout request per person at a time! .

Number of Accounts
You agree to only create 1 account.


Liability
GoldAdsPack is a promotional marketing tool used to help members promote all of their offers on the Internet. GoldAdsPack does not make any promises written or implied as to the amount of money that can be made from GoldAdsPack.
It is your responsibility to make sure that the registered payment address for your account is correct. Commission payments made to the wrong account because of an incorrectly entered ID# is your responsibility. Should your payment account be locked or restricted for any reason, that is also your responsibility. GoldAdsPack will not be held liable.

Policies
All policies, rules and regulations are the final decision of OneAdPack.  We reserve the right to modify, add or change any policies as we deem necessary at any time. All members agree that they will not hold GoldAdsPack liable for any items or policies within this program.

Adding sites to our rotator
To ensure the smooth operation of this service for all users, it is required that you and each site that you promote with the service must comply with the following rules:

Trojans, java applet hacks are strictly prohibited on your websites - Your Membership will be DELETED if You add such sites!
Your website MUST not contain any popups, flash flying banners, or first-page redirects!
Your website MUST not contaion any div floating layers moving around the window!
Your site must not have any kind of pop windows. eg pop-up, pop-in, fly-in, pop-under, layer ads, download window, errors, javascript, dialog box, ActiveX
must not use any forwarding or redirection or page rotator.
No code to break out of our frame or anything which could interrupt auto page rotation.
Member who add framebreaker site to our rotator will get account deleted without question ask.
We have "zero" tolerance for the following types of site:
No Paid To Promote, illegal, adult or violent content or any text or material that might reasonably cause offense, including websites promoting illegal software, warez, cracks, etc. - you will be deleted STRAIGHT if this is matched!
No broken links, under-construction or slow-loading pages.

If You break the above rules YOUR ACCOUNT WILL BE TERMINATED AND MONEY FORFEITED.

Refunds
Once you decide to make an advertising purchase, you should be aware that there is a NO REFUND POLICY on ANY and ALL purchases involved with our program.

SPAM
GoldAdsPack has a zero tolerance for spam. Anyone caught spamming will be deleted from the program and is subject to civil and criminal prosecution including up to $50,000 in fines.  If you are to include GoldAdsPack's name or URL in any email promotion, please only email to your own "double-optin" subscribers.  Safelists are also allowed as well as downline mailing programs such as YourLuckyList.

The following are grounds for termination of your account:

To send unsolicited emails to anyone that is not on your own personal double-optin list.   If this does not make sense to you, then do not include promotions for GoldAdsPack in emails.
To falsify user information provided to GoldAdsPack or to other users of the service in connection with GoldAdsPack, or any of it's other sites.
To use the GoldAdsPack name and URL via bought commercial bulk email lists.
 

GoldAdsPack considers the above practices to constitute abuse of our service and of the recipients of such unsolicited mailings and/or postings who often bear the expense. Therefore, these practices are prohibited by GoldAdsPack terms and conditions of service. Engaging in one or more of these practices will result in termination of the offender's account.
In addition, we have the right, where feasible, to implement technical mechanisms which block multiple postings as described above before they are forwarded.
Nothing contained in this policy shall be construed to limit GoldAdsPack actions or remedies in any way with respect to any of the foregoing activities.
GoldAdsPack reserves the right to take any and all additional actions it may deem appropriate with respect to such activities, including without limitation taking action to recover the costs and expenses of identifying offenders and removing them from the program.
In addition, GoldAdsPack reserves at all times all rights and remedies available to it with respect to such activities at law or in equity.
We use IP tracking devices. Any user that is found to blatantly violate this agreement will be banned from the program indefinitely and may be subject to civil and criminal prosecution.
We reserve the right to refuse service to anyone. We may also make changes to these rules, regulations, and policies at any time.
By becoming a Member of GoldAdsPack, you agree to all of the above terms and conditions.

To Your Success,
GoldAdsPack Team
                   </pre>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- footer portion -->
<?php include('users/inc/footer.php'); ?>
<?php include('inc/script.php'); ?>


</body>

</html>
