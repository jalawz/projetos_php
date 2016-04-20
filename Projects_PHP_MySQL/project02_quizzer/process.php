<?php include 'database.php';
session_start();

// Check to see if score is set
if(!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if(isset($post['submit'])) {
    $number = $post['number'];
    $selected_choice = $post['choice'];
    $next_number = $number + 1;

    /*
     * Get total questions
     */
    $query = "SELECT * FROM questions";
    // Get results
    $results = $link->query($query) or die($link->error . __LINE__);
    $total = $results->num_rows;

    /*
     * Get correct choice
     */
    $query = "SELECT * FROM choices WHERE question_number = {$number} AND is_correct = 1";
    // Get Result
    $result = $link->query($query) or die($link->error . __LINE__);

    // Get row
    $row = $result->fetch_assoc();

    // Set correct choice
    $correct_choice = $row['id'];

    // Compare
    if($correct_choice == $selected_choice) {
        // Answer is correct
        $_SESSION['score']++;
    }

    if($number == $total) {
        header("Location: final.php");
        exit();
    } else {
        header("Location: question.php?n=".$next_number);
    }
}