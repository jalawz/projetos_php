<?php
include 'database.php';

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if(isset($post['submit'])) {
    // Get post variables
    $question_number = $post['question_number'];
    $question_text = $post['question_text'];
    $correct_choice = $post['correct_choice'];
    // Choices array
    $choices = array();
    $choices[1] = $post['choice1'];
    $choices[2] = $post['choice2'];
    $choices[3] = $post['choice3'];
    $choices[4] = $post['choice4'];
    $choices[5] = $post['choice5'];

    // Question query
    $query = "INSERT INTO questions (question_number, text) VALUES ({$question_number}, '{$question_text}')";
    // Run query
    $insert_row = $link->query($query) or die($link->error . __LINE__);

    // Validate insert
    if($insert_row) {
        foreach ($choices as $choice => $value) {
            if($value != '') {
                if($correct_choice == $choice) {
                    $is_correct = 1;
                } else {
                    $is_correct = 0;
                }
                // Choice query
                $query = "INSERT INTO choices (question_number, is_correct, `text`) VALUES ($question_number, $is_correct, '$value')";
                // Run query
                $insert_row = $link->query($query) or die($link->error . __LINE__);
                // Validate Insert
                if($insert_row) {
                    continue;
                } else {
                    die('Error: (' . $link->errno . ')' . $link->error);
                }
            }
        }
        $msg = 'Question has been added';
    }
}
/*
 * Get total questions
 */
$query = "SELECT * FROM questions";
// Get the results
$questions = $link->query($query);
$total = $questions->num_rows;
$next = $total + 1;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Quizzer</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="container">
                <h1>PHP Quizzer</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>Add a Question</h2>
                <?php
                    if(isset($msg)) {
                        echo '<p>'. $msg . '</p>';
                    }
                ?>
                <form method="post" action="add.php">
                    <p>
                        <label>Question Number: </label>
                        <input type="number" name="question_number" value="<?php echo $next; ?>">
                    </p>
                    <p>
                        <label>Question Text: </label>
                        <input type="text" name="question_text">
                    </p>
                    <p>
                        <label>Choice #1: </label>
                        <input type="text" name="choice1">
                    </p>
                    <p>
                        <label>Choice #2: </label>
                        <input type="text" name="choice2">
                    </p>
                    <p>
                        <label>Choice #3: </label>
                        <input type="text" name="choice3">
                    </p>
                    <p>
                        <label>Choice #4: </label>
                        <input type="text" name="choice4">
                    </p>
                    <p>
                        <label>Choice #5: </label>
                        <input type="text" name="choice5">
                    </p>
                    <p>
                        <label>Correct Choice Number: </label>
                        <input type="number" name="correct_choice">
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Submit">
                    </p>
                </form>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; <?php echo date('Y'); ?>, PHP Quizzer
            </div>
        </footer>
    </body>
</html>

