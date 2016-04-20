<?php include './includes/header.php'; ?>
<?php

// Create DB Object
$db = new Database();

// Check URL for Category
$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
if (isset($get['category'])) {
    $category = $get['category'];
    // Create query
    $query = "SELECT * FROM posts WHERE category = " . $category;
    // Run query
    $posts = $db->select($query);
} else {
    // Create query
    $query = "SELECT * FROM posts";
    // Run query
    $posts = $db->select($query);
}

// Create query
$query = "SELECT * FROM categories";
// Run query
$categories = $db->select($query);
?>
<?php if ($posts): ?>
    <?php while ($row = $posts->fetch_assoc()): ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
            <p>
                <?php echo shortenText($row['body']); ?> 
            </p>
            <a class="readmore" href="post.php?id=<?php echo $row['id']; ?>">Read More</a>
        </div><!-- /.blog-post -->
    <?php endwhile; ?>
<?php else: ?>
    <p>There are no posts yet</p>
<?php endif; ?>
<?php
include './includes/footer.php';
