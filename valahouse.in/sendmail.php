<?php
ob_start();
//session_start(); 
use PHPMailer\PHPMailer\PHPMailer;
include_once "PHPMailer/PHPMailer.php";
include_once "PHPMailer/SMTP.php";
include_once "PHPMailer/Exception.php";
$password = strip_tags($_GET["pass"]);

//print_r($password);exit;
$name = strip_tags($_POST['name']);
$cmnt = strip_tags($_POST['message']);
$pno = strip_tags($_POST['phone']);
$email = strip_tags($_POST['email']);

//	print_r($email);exit;
$message =<<<EOF
<html>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
	font-style: italic;
}
-->
</style>
<body bgcolor="#999999">
<table bgcolor="#CCCCCC" align="center" width="650" border="" cellspacing="0" cellpadding="0"><tr><td width="550" align="left" valign="middle"><table align="center" width="650"  border="" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC"><p align="center"><a href="http://voxinnov.com/demo/valahouse/assets/images/logo_Vala.png" width="263" height="263"></a><br>
        <strong>Contact Alert</strong></p>
      </td>
    </tr>
  <tr bgcolor="#FFFFFF">
    <td width="206" height="30" align="left" valign="middle"> <strong>Name:</strong></td>
    <td width="438" align="left" valign="middle"><strong>$name</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="30" align="left" valign="middle"><strong>Email:</strong></td>
    <td align="left" valign="middle"><strong>$email</strong></td>
  </tr>
      <tr bgcolor="#FFFFFF">
    <td height="30" align="left" valign="middle"><strong>Contact Number:</strong></td>
    <td align="left" valign="middle"><strong>$pno</strong></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="40" align="left" valign="top"><strong>Comment:</strong></td>
    <td align="left" valign="top"><strong>$cmnt</strong></td>
  </tr>
    <tr>
    <td height="30" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC"><p align="center"><br>
      © 2022 &amp; All Rights Reserved by valahouse.in. Powered by <a href="http://www.voxinnov.com/" target="_blank">VOXINNOV</a></p>
      </td>
    </tr>
</table>
</body>

</html>
EOF;
//	print_r($message);exit;
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title></title>
</head>
<body>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;



//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
//$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
//$mail->isSMTP();
//$mail->isSMTP();
$mail->SMTPAuth= true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
//or more succinctly:
$mail->Host = 'tls://smtp.gmail.com:587';

//Set the hostname of the mail server
//$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
//$mail->Port = 587;

//Whether to use SMTP authentication
//$mail->SMTPAuth = true;

/* $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );*/
 
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "rithudmc@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "rithudmc@123";
//Set who the message is to be sent from
$mail->setFrom('rithudmc@gmail.com', 'Contact Enquiry of Vala House');

//Set an alternative reply-to address
// $mail->addReplyTo('maurya.shubham5@gmail.com', 'First Last');

//Set who the message is to be sent to
//$mail->addAddress('sinna@rithudmc.com', 'Booking Enquiry of Vala House');
$mail->addAddress('sinna@rithudmc.com', 'Contact Enquiry of Vala House');
$mail->addAddress('contact@valahouse.in', 'Contact Enquiry of Vala House');
//$mail->addAddress('id2', 'John Doe');
//Set the subject line
$mail->Subject = 'Contact Enquiry :: Vala House';


//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('image.html'), __DIR__);

$mail->msgHTML("$message");
$mail->Body    = $message;

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body,<h1>Congratulations</h1>';

//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
	//header("location:../onetimematrimony_backend/profile.php");
} else {
    echo "Message sent!";
    	
    echo '<script>alert("Message Sent... Thanks For Contacing Us...We will be in touch soon...");window.location.href="contact.php";</script>';
//	header("location:payment.php?room=$no_room&name=$name&email=$email&ardate=$ad&amount=$amount");
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
?>

</body>
</html>
