<?php
// fixfitin mailiosoite
$webmaster_email = "info.fixfit@gmail.com";

// testpages for testing...
$feedback_page = "yhteystiedot.php";
$error_page = "error_message.html";
$thankyou_page = "kiitos.php";

/*
Seuraavassa annettu data muuttujiin.
Form fieltdit tähän, jos haluaa sellaisen.
*/
$email_address = $_POST["email"] ;
$comments = $_POST["message"] ;
$name = $_POST["name"] ;
$msg = 
"Name: " . $name . "\r\n" . 
"Email: " . $email_address . "\r\n" . 
"Comments: " . $comments ;

// Seurava toiminto tarkastaaa maili-osoitteen syötön.
function isInjected($str) {
	$injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0A+)',
	'(%0D+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}

// If the user tries to access this script directly, redirect them to the feedback form,
if (!isset($_POST['email'])) {
header( "Location: $feedback_page" );
}

// jos formfield on tyhjä, tämä ohjaa errorpagelle.
elseif (empty($first_name) || empty($email_address)) {
header( "Location: $error_page" );
}

// Jos email ei ole oikein, tämä lähettää errorpagelle.
elseif ( isInjected($email_address) || isInjected($first_name)  || isInjected($comments) ) {
header( "Location: $error_page" );
}

// jos kaikki edellä oleet testit läpäistään, maili lähetetään ja ohjataan "kiitos!" sivulle.
else {

	mail( "$webmaster_email", "Feedback Form Results", $msg );

	header( "Location: $thankyou_page" );
}
?>