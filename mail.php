<?php

	$to = "uddinasib@gmail.com"; // this is your Email address
	$from  = $_POST['email']; // this is the sender's Email address
	$sender_name = $_POST['name'];
	$rsvp = $_POST['rsvp'];
	$notes = $_POST['notes'];


	$subject = "Form submission";
	$message = $sender_name . " is attending! His / her rsvp is " . $rsvp . ". He / she worte the following... ". "\n\n" . $notes;

	$headers = 'From: ' . $from;
	mail($to, $subject, $message, $headers);

?>
