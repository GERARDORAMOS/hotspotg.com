<?php
	
	$name = '';
	$email = '';
	$subject = '';
	$message = '';


	if(isset($_POST['name'])) 		$name = $_POST['name'];
	if(isset($_POST['email'])) 		$email = $_POST['email'];
	if(isset($_POST['subject'])) 	$subject = $_POST['subject'];
	if(isset($_POST['message'])) 	$message = $_POST['message'];

	$headers = "From: " . $email;

	$to = 'info@hotspotg.com';

	mail($to, $subject, 'Name: '.$name.' Message: '.$message.' Email: '.$email);



?>