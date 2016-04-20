<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
    // set question number
    $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $number = (int) $get['n'];

    /*
     * Get total questions
     */
    $query = "SELECT * FROM questions";
    // Get Result
    $result1 = $link->query($query) or die($link->error . __LINE__);
    $total = $result1->num_rows;
    
    /*
     * Get Question
     */
    $query = "SELECT * FROM questions WHERE question_number = {$number}";
    
    // Get Result
    $result = $link->query($query) or die($link->error . __LINE__);
    
    $question = $result->fetch_assoc();
    
    /*
     * Get Choices
     */
    $query = "SELECT * FROM choices WHERE question_number = {$number}";
    
    // Get Results
    $choices = $link->query($query) or die();
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
                <div class="current">Question <?php echo $question['question_number'] ?> of <?php echo $total; ?></div>
                <p class="question">
                    <?php echo $question['text']; ?>
                </p>
                <form method="post" action="process.php">
                    <ul class="choices">
                        <?php while($row = $choices->fetch_assoc()): ?>
                        <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"><?php echo $row['text'] ?></li>
                        <?php endwhile; ?>
                    </ul>
                    <input type="submit" value="Submit" name="submit">
                    <input type="hidden" name="number" value="<?php echo $number; ?>">
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
