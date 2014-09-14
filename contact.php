
<?php
if (isset($_POST['send'])) {
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "graham@morby-raybould.com";
    $email_subject = "Miami Dolphins Kingdom Contact Request";

    // validation expected data exists

    $first_name = $_POST['fname']; // required
    $last_name = $_POST['lname']; // required
    $phone_number = $_POST['phone_number']; // not required
    $email_from = $_POST['email']; // required
    $city = $_POST['city']; // required
    $message = $_POST['message']; // required

    $email_message = "You have recieved this email from your http://www.morby-raybould.graphics website.\n\n";

    function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "First Name: " . clean_string($first_name) . "\n";
    $email_message .= "Last Name: " . clean_string($last_name) . "\n";
    $email_message .= "Phone Number: " . clean_string($phone_number) . "\n";
    $email_message .= "Email: " . clean_string($email_from) . "\n";
    $email_message .= "City: " . clean_string($city) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n\n";
    $email_message .= "Thanks \n";

    // create email headers
    $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    $mail = mail($email_to, $email_subject, $email_message, $headers);
    if ($mail) {
        header('location:Thank_you.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Miami Dolphins, Uk Dolphins, Dolfanuk, Don Shula, Sun Life, NFL, Dolphins, important dates, NFL">
        <meta name="description" content="Maimi Dolphins UK, The best place for all things Miami and the Dolphins in the NFL">
        <meta name="author" content="Graham Morby-Raybould">
        <link rel="shortcut icon" href="/images/favicon.ico">
        <title>Miami Dolphins Kingdom - Contact Us</title>


        <!-- Bootstrap -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="body">
        <div class="container-fluid">
            <img src="/images/header.jpg" class="width100" alt="Miami Dolphins Kingdom">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Dolphins UK</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/index.php">Home</a></li>
                            <li><a href="/about.php">About</a></li>
                            <li><a href="/images.php">Photos</a></li>
                            <li><a href="/videos.php">Videos</a></li>
                            <li><a href="/schedule.php">Schedule</a></li>
                            <li><a href="/important _dates.php">Important Dates</a></li>
                            <li><a href="/links.php">Links</a></li>
                            <li><a href="/blog/">Blog</a></li>
                            <li><a href="/contact.php">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="http://free-website-translation.com/"  id="ftwtranslation_button" hreflang="en" title="" style="border:0;"><img src="http://free-website-translation.com/img/fwt_button_en.gif" id="ftwtranslation_image" alt="Free Website Translator" style="border:0;"/></a> <script type="text/javascript" src="http://free-website-translation.com/scripts/fwt.js" /></script></li>


                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <hr/>
                    <div class="col-md-8">
                        <hr>
                        <img src="/images/tannehill.jpg" class="img-responsive img-rounded width100">
                        <hr>
                        <h1 class="text-center">Contact Us</h1>
                        <hr>

                        <form name="form" action="" method="post" id="contact_form" novalidate>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-md-3 font-size-form">Full Name<span class="red">*</span></label>
                                <div class="col-md-4">
                                    <input  type="text" class="form-control input-sm firstname form-txt-box-height" id="fname" placeholder="First Name" name="fname">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-4 ">

                                    <input type="Text" class="form-control input-sm lastname form-txt-box-height" id="lname" placeholder="Last Name" name="lname">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label  for="exampleInputEmail1" class="col-md-3 font-size-form">Phone Number<span class="red">*</span></label>
                                <div class="col-md-8">
                                    <input  type="text" class="form-control input-sm telephone form-txt-box-height" id="phone_number" name="phone_number">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label  for="exampleInputEmail1" class="col-md-3 font-size-form">Email address<span class="red">*</span></label>
                                <div class="col-md-8">
                                    <input  type="text" class="form-control input-sm telephone form-txt-box-height" id="email" placeholder="ex: myname@example.com" name="email">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label  for="exampleInputEmail1" class="col-md-3 font-size-form">City<span class="red">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control input-sm telephone form-txt-box-height" id="city" name="city">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label  for="exampleInputEmail1" class="col-md-3 font-size-form">Message</label>
                                <div class="col-md-8">
                                    <textarea  class="form-control input-sm message form-txt-box-height" id="message" rows="6" name="message"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class='col-md-11 text-right'>
                                <input type="reset" value="Clear Form" class="btn-clear">
                                <input type="submit" name="send" value="Send" class="btn-primary" >
                                <!--button class="btn-clear" >Clear Form</button-->
                                <!--button class="btn-orange" style='margin-right:16px;'>Send</button-->

                            </div>
                        </form>

                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">

                        <h3>Twitter</h3>
                        <hr>
                        <a class="twitter-timeline" href="https://twitter.com/MiamiDolphinUk" data-widget-id="497707333267382272">Tweets by @MiamiDolphinUk</a>
                        <script>!function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                if (!d.getElementById(id)) {
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = p + "://platform.twitter.com/widgets.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }
                            }(document, "script", "twitter-wjs");</script>



                        <hr>
                        <h3>Gridiron Magazine</h3>
                        <hr>
                        <a href="http://www.gridiron-magazine.com/shop/gridiron-issue-viii-print" target="_blank"><img class="img-responsive width100"src="/images/BvVjl0_CAAAwn1U.jpg" alt="subscribe to gridiron today"></a>
                        <hr>
                        <hr>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-5">
                        <div class="Flexible-container">
                            <iframe width="350" height="240" src="//w2.countingdownto.com/629362" frameborder="0"></iframe>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p><em>The NFL International Series is about to get a whole lot bigger and better!</em> So come join the Kingdom and Help Us Tear Wembley up!!</p>
                    </div>
                    <div class="col-md-5">
                        <img src="images/inter.jpg" class="width100" alt="Don Shula Super Bowl">
                    </div>
                    <hr>
                </div>
            </div>

        </div>
        <?php include ('inc/footer.php'); ?>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>









