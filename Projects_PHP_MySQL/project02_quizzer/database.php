<?php
// Create connection credentials
$db_host = "localhost";
$db_user = "root";
$db_pass = "penha269";
$db_name = "quizzer";

// Create mysqli object
$link = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Error handler
if($link->connect_error) {
    printf("Connection failed: %s\n", $link->connect_error);
    exit();
}