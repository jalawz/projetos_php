<?php include './includes/header.php'; ?>
<?php
// Create DB Object
$db = new Database();

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if (isset($post['submit'])) {
    // Assign $_POST vars
    $name = mysqli_real_escape_string($db->link, $post['name']);
    // Simple validation
    if ($name == "") {
        // Set Error
        $error = 'Please fill out all required fields';
    } else {
        $query = "INSERT INTO categories (`name`) VALUES ('{$name}')";
        $insert_row = $db->insert($query);
    }
}
?>
<form method="post" action="">
    <div class="form-group">
        <label>Category Name</label>
        <input name="name" type="text" class="form-control" placeholder="Enter Category">
    </div>

    <div>
        <button name="submit" type="submit" class="btn btn-default">Submit</button>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div><br>
</form>
<?php include './includes/footer.php'; ?>