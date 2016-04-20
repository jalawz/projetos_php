<?php include './includes/header.php'; ?>
<?php
// Create DB Object
$db = new Database();

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if(isset($post['submit'])) {
    // Assign $_POST vars
    $title = mysqli_real_escape_string($db->link, $post['title']);
    $body = mysqli_real_escape_string($db->link, $post['body']);
    $category = mysqli_real_escape_string($db->link, $post['category']);
    $author = mysqli_real_escape_string($db->link, $post['author']);
    $tags = mysqli_real_escape_string($db->link, $post['tags']);
    // Simple validation
    if($title == "" || $body == "" || $category == "" || $author == "" || $tags == "") {
        // Set Error
        $error = 'Please fill out all required fields';
    } else {
        $query = "INSERT INTO posts (title, body, category, author, tags) "
                . "VALUES ('{$title}', '{$body}', {$category}, '{$author}', '{$tags}')";
        $insert_row = $db->insert($query);
    }
    
}
?>
<?php

// Create categories query
$query = "SELECT * FROM categories";
// Run Query
$categories = $db->select($query);
?>

<form method="post" action="">
    <div class="form-group">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title">
    </div>

    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control" placeholder="Enter Post Body"></textarea>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
            <?php while($row = $categories->fetch_assoc()): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Post Author</label>
        <input name="author" type="text" class="form-control" placeholder="Enter Author Name">
    </div>
    
    <div class="form-group">
        <label>Tags</label>
        <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit">
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div><br>
</form>

<?php include './includes/footer.php'; ?>