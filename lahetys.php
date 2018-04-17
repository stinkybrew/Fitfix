<?php
$errors = '';
$myemail = 'info.fixfit@gmail.com';//<-----Put Your email address here.
if(empty($_POST['Name'])  ||
   empty($_POST['Email']) ||
   empty($_POST['Message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['Name'];
$email_address = $_POST['Email'];
$message = $_POST['Message'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $name \n ".
"Email: $email_address\n Message \n $message";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: yhteystiedot.php');
}
?>