<?php

	$to = "nyxyhk@gmail.com";
	$from  = $_POST['email']; // this is the sender's Email address
	$sender_name = $_POST['name'];
	$rsvp = $_POST['rsvp'];
	$notes = $_POST['notes'];

	$subject = "Form submission";
	$message = $sender_name . " is attending! His / her rsvp is " . $rsvp . ". He / she worte the following... ". "\n\n" . $notes;

	$headers = 'From: ' . $from;
	mail($to, $subject, $message, $headers);


	$url = "https://script.google.com/macros/s/AKfycbxK5092S7JcpuZ3w3EODK9YyYUqw-A_nLotF-3xFLLvCxdB9nY/exec";
	$fields = array(
		'name' => urlencode($_POST['name']),
		'email' => urlencode($_POST['email']),
		'rsvp' => urlencode($_POST['rsvp']),
		'notes' => urlencode($_POST['notes'])
	);

	//url-ify the data for the POST
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');

	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

	//execute post
	$result = curl_exec($ch);

	//close connection
	curl_close($ch);
?>
