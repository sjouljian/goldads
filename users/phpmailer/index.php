
 <?php
include("../connect/db.php");

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
if(isset($_GET['email']))
{
    $email=$_GET['email'];
    $code=rand(10,10000);
    $encode=md5($code);
    $mail = new PHPMailer(true);

    try 
    {
            //Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'goladspack533@gmail.com';                     // SMTP username
        $mail->Password   = 'goldads@533';                               // SMTP password
        $mail->SMTPSecure = 'TLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
        $mail->setFrom('goladspack533@gmail.com', 'Gold Ads Pack');
           
        $mail->addAddress($email);   
 
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Confirmation code';
        $mail->Body    = 'Your Code is</b>'.$code;
        $mail->AltBody = 'Enter use it to confirm';

        $mail->send();
        header("location: ../verify.php?code=$encode");
    } 
    catch (Exception $e) 
    {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    } 
   
}