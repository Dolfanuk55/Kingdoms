<h1>Recent Posts</h1>
<hr />

<ul>
    <?php
    $stmt = $db->query('SELECT postTitle, postSlug FROM blog_posts_seo ORDER BY postID DESC LIMIT 5');
    while ($row = $stmt->fetch()) {
        echo '<li><a href="' . $row['postSlug'] . '">' . $row['postTitle'] . '</a></li>';
    }
    ?>
</ul>


