<?php
if(!isset($_POST['status']))
	die('silly bear!');
	
$url = 'http://twitter.com/home?status=@jklmnop '.$_POST['status'];

header('Location: '. $url);
?>