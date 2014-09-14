<?php
$pageTitle = "Blog - Miami Kingdom";
$section = "Blog";
$keywords = "Miami Dolphins Photos, Uk Dolphins Images, Dolfanuk images, Dan Marino, ricky william,  Sun Life, NFL, Dolphins, About Maimi Dolphins UK";
$description = "Blog From the KINGDOM - Miami Dolphins UK ";
?>
<?php require('includes/config.php'); ?>
<?php include('../inc/header.php'); ?>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/custom.css">

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <h1>Blog</h1>
                <hr />



                <?php
                try {

                    $stmt = $db->query('SELECT postID, postTitle, postSlug, postDesc, postDate FROM blog_posts_seo ORDER BY postDate DESC');
                    while ($row = $stmt->fetch()) {

                        echo '<h1><a href="' . $row['postSlug'] . '">' . $row['postTitle'] . '</a></h1>';
                        echo '<p>Posted on ' . date('jS M Y H:i:s', strtotime($row['postDate'])) . ' in ';

                        $stmt2 = $db->prepare('SELECT catTitle, catSlug	FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
                        $stmt2->execute(array(':postID' => $row['postID']));

                        $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                        $links = array();
                        foreach ($catRow as $cat) {
                            $links[] = "<a href='c-" . $cat['catSlug'] . "'>" . $cat['catTitle'] . "</a>";
                        }
                        echo implode(", ", $links);

                        echo '</p>';
                        echo '<p>' . $row['postDesc'] . '</p>';
                        echo '<p><a href="' . $row['postSlug'] . '">Read More</a></p>';
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                ?>
            </div>
            <div class="col-md-4">
                <img src="../images/logotrans.png" class="img-responsive img-rounded width100">
                <h1>Recent Posts</h1>
<hr />
 
<ul class="list-unstyled">
<?php
$stmt = $db->query('SELECT postTitle, postSlug FROM blog_posts_seo ORDER BY postDate DESC LIMIT 5');
while($row = $stmt->fetch()){
	echo '<li><a href="'.$row['postSlug'].'">'.$row['postTitle'].'</a></li>';
       
       
}
?>
</ul>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <hr>
            <div class="col-md-4">
                <h3>Twitter</h3>
                <hr>
                <a class="twitter-timeline" href="https://twitter.com/MiamiDolphinUk" data-widget-id="499908654544338944">Tweets by @MiamiDolphinUk</a>
                <script>!function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + "://platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, "script", "twitter-wjs");</script>



            </div>
            <div class="col-md-4">
                <h3>Facebook</h3>
                <hr>
                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fmiamidolphinsuk&amp;width&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; background-color: #fff; overflow:hidden; height:350px;" allowTransparency="true"></iframe>
                <hr>
            </div>
            <div class="col-md-4">
                <h3>Google Plus</h3>
                <hr>
                <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
                <g:page href="https://plus.google.com/103618340712437479571"></g:page>
            </div>
        </div>
    </div>
</div>








</body>
</html>
<?php include ('../inc/footer.php'); ?>