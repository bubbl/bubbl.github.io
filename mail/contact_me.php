<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if ($email === FALSE) {
    echo 'Invalid email';
    exit(1);
}
$message = $_POST['message'];

$to = 'contact@bartbania.com';
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail:$email_address\n\nMessage:\n$message";
$headers = "From: noreply@bartbania.com\n"; 
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
