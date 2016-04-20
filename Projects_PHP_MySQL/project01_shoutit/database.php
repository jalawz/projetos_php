<?php
// Connect to MySQL
$link = mysqli_connect('localhost', 'root', 'penha269', 'shoutit');

// Test Connection
if(mysqli_connect_errno()) {
	echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}