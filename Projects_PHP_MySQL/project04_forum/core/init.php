<?php
// Start Session
session_start();

// Include configuration
require_once 'config/config.php';

// Helper Function Files
require_once 'helpers/system_helper.php';
require_once 'helpers/format_helper.php';
require_once 'helpers/db_helper.php';

// Autoloader
function __autoload($class_name) {
    require_once('libraries/' . $class_name . '.php');
}