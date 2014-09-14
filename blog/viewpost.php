<?php
require('includes/config.php');
include('../inc/header.php');




$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts_seo WHERE postSlug = :postSlug');
$stmt->execute(array(':postSlug' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if ($row['postID'] == '') {
    header('Location: ./');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Blog - <?php echo $row['postTitle']; ?></title>
        <link rel="stylesheet" href="style/bootstrap.css">
        <link rel="stylesheet" href="style/custom.css">

    </head>
    <body>

        <div class="container">

            <h1 class="text-center">Miami Dolphins Kingdom Blog</h1>
            <hr />
            <p><a href="./">Blog Index</a></p>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-10 col-md-offset-1">

                        <?php
                        echo '<div>';
                        echo '<h1>' . $row['postTitle'] . '</h1>';
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
                        echo '<p>' . $row['postCont'] . '</p>';
                        echo '</div>';
                        ?>

                    </div>

                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
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
            <div id='clear'></div>

        </div>

        <?php include ('../inc/footer.php'); ?>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>