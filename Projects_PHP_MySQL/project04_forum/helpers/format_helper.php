<?php

/*
 * URL Format
 */
function urlFormat($str) {
    // Strip out all whitespace
    $str = preg_replace('/\s*/', '', $str);
    // Convert the string to all lowercase
    $str = strtolower($str);
    // URL encode
    $str = urlencode($str);
    return $str;
}

/*
 * Format Date
 */
function formatDate($date) {
    $dateFormatted = date("F j, Y, g:i a", strtotime($date));
    return $dateFormatted;
}

/*
 * Add classname active if category is active
 */
function is_active($category) {
    $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    if(isset($get['category'])) {
        if($get['category'] == $category) {
            return 'active';
        } else {
            return '';
        }
    } else {
        if($category == null) {
            return 'active';
        }
    }
}