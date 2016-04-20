<?php
include 'database.php';
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

// Check if form was submitted
if(isset($post['submit'])) {
	$user = mysqli_real_escape_string($link, $post['user']);
	$message = mysqli_real_escape_string($link, $post['message']);
	
	// Set the timezone
	date_default_timezone_set('America/Sao_Paulo');
	$time = date('h:i:s a', time());
	
	// Validate input
	if($user == "" || $message == "") {
		$error = "Please fill in your name and a message";
		header("Location: index.php?error=". urlencode($error));
		exit();
	} else {
		$query = "INSERT INTO shouts (user, message, time) VALUES ('$user', '$message', '$time')";
		
		if(!mysqli_query($link, $query)) {
			die('Error: ' . mysqli_error($link));
		} else {
			header("Location: index.php");
			exit();
		}
	}
}