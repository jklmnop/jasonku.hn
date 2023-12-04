<?php
$status = (isset($_POST['message']) && strlen($_POST['message']) > 0) 
	? $_POST['message'] 
	: false;

try {
	if(!$status)
		throw(new Exception('sneaky, sneaky!'));
	
} catch (Exception $e) {
	echo $e->getMessage();
	die;
}

$to = 'spaceyraygun@gmail.com';
$headers = 'From: Anon<spaceyraygun+anon@gmail.com>\r\n';
$subject = 'Contact from website';

$status = str_replace("\n.", "\n..", $status);

mail($to, $subject, $status, $headers);

header('Location: http://jasonku.hn#thanks');
?>