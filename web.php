<?php

$error = '';
$email = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }
 if($error == '')
 {
  require 'class/class.phpmailer.php';
  require 'class/class.smtp.php';
  $mail = new PHPMailer;
  $mail->IsSMTP();        //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
  $mail->Port = '587';        //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'xyz@gmail.com';     //Sets SMTP username
  $mail->Password = '******';     //Sets SMTP password
  $mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
  $mail->From = $_POST["email"];     //Sets the From email address for the message
  $mail->AddCC($_POST["email"]); //Adds a "Cc" address
  $mail->WordWrap = 100;       //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);       //Sets message type to HTML    
  $mail->Body = $_POST["message"];    //An HTML or plain text message body
  if($mail->Send())        //Send an Email. Return true on success or false on error
  {
   $error = '<label class="text-success">Email sent Successfully</label>';
  }
  else
  {
   $error = '<label class="text-danger">There is an Error</label>';
  }
  $email = '';
  $message = '';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
<button align="left" onclick="goBack()">Back</button>
<script>
function goBack()
{
window.location.assign("admin.html");
}
</script>
  <title>Send mail</title>
  <style>
   body{
       background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(adminbg.png);
     }
  div{
    color:white;
   }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
    <div class="col-md-8" style="margin:0 auto; float:none;">
     <h3 align="center">Send Email</h3>
     <br />
     <?php echo $error; ?>
     <form method="post">
      <div class="form-group">
       <label>Enter Email</label>
       <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
      </div>
      <div class="form-group">
       <label>Enter Message</label>
       <textarea name="message" class="form-control" placeholder="Enter Message" rows="5"><?php echo $message; ?></textarea>
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="submit" value="Submit" class="btn btn-info" />
      </div>
     </form>
   </div>
  </div>
 </body>
</html>