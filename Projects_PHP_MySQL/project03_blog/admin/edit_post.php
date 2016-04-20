<?php include './includes/header.php'; ?>
<?php
$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$id = $get['id'];

// Create DB Object
$db = new Database();

// Create Query
$query = "SELECT * FROM posts WHERE id = " . $id;
// Run Query
$post = $db->select($query)->fetch_assoc();

// Create categories query
$query = "SELECT * FROM categories";
// Run Query
$categories = $db->select($query);
?>
<?php
$postForm = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if (isset($postForm['submit'])) {
    // Assign $_POST vars
    $title = mysqli_real_escape_string($db->link, $postForm['title']);
    $body = mysqli_real_escape_string($db->link, $postForm['body']);
    $category = mysqli_real_escape_string($db->link, $postForm['category']);
    $author = mysqli_real_escape_string($db->link, $postForm['author']);
    $tags = mysqli_real_escape_string($db->link, $postForm['tags']);
    // Simple validation
    if ($title == "" || $body == "" || $category == "" || $author == "" || $tags == "") {
        // Set Error
        $error = 'Please fill out all required fields';
    } else {
        $query = "UPDATE posts SET title = '{$title}', body = '{$body}', category = {$category}, author = '{$author}', tags = '{$tags}' WHERE id = " . $id;
        $update_row = $db->update($query);
    }
}

// Delete
if(isset($postForm['delete'])) {
    // Delete query
    $query = "DELETE FROM posts WHERE id = " . $id;
    $delete_row = $db->delete($query);
    
}
?>
<form method="post" action="edit_post.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control" value="<?php echo $post['title']; ?>">
    </div>

    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control"><?php echo $post['body']; ?></textarea>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
            <?php while ($row = $categories->fetch_assoc()): ?>
                <?php $selected = ($row['id'] == $post['category']) ? "selected" : ""; ?>
                <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['name']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Post Author</label>
        <input name="author" type="text" class="form-control" value="<?php echo $post['author']; ?>">
    </div>

    <div class="form-group">
        <label>Tags</label>
        <input name="tags" type="text" class="form-control" value="<?php echo $post['tags']; ?>">
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-default" value="Submit">
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger" value="Delete">
    </div><br>
</form>

<?php include './includes/footer.php'; ?>