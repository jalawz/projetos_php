<?php include './includes/header.php'; ?>
<?php
    $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $id = $get['id'];
    // Create DB Object
    $db = new Database();
    
    // Create query
    $query = "SELECT * FROM posts WHERE id = " . $id;
    // Run query
    $post = $db->select($query)->fetch_assoc();
    // Create query
    $query = "SELECT * FROM categories";
    // Run query
    $categories = $db->select($query);
?>
<div class="blog-post">
    <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
    <p class="blog-post-meta"><?php echo formatDate($post['date']); ?> by <a href="#"><?php echo $post['author']; ?></a></p>
    <p>
        <?php echo $post['body']; ?> 
    </p>
    <a class="readmore" href="index.php">Back</a>
</div><!-- /.blog-post -->

<?php include './includes/footer.php'; ?>