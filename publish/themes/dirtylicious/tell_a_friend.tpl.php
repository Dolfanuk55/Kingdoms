<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $this->TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->CHARSET; ?>" />
<link rel="stylesheet" href="<?php echo $this->PATH; ?>/styles.css" type="text/css" />
<?php echo $this->CSS_DISPLAY; ?>
</head>

<body class="body">
<!-- Tell a Friend Heading -->
<div id="friend">
<h1><?php echo $this->HEADER; ?></h1>
<p><?php echo $this->MESSAGE; ?></p>
<!-- END Tell a Friend Message -->

<!-- Main Content Div -->
<?php
// DO NOT remove or rename the friend wrapper div
?>
<div id="friend_wrapper">
<form method="post" action="<?php echo $this->FORM_URL; ?>">
<p>
<input type="hidden" name="process" value="1" />
<label><?php echo $this->YOUR_NAME; ?>:<br /></label>
<input name="yname" type="text" value="<?php echo $this->YNAME_VALUE; ?>" /><?php echo $this->YNAME_ERROR; ?><br />
<label><?php echo $this->YOUR_EMAIL; ?>:<br /></label>
<input name="yemail" type="text" value="<?php echo $this->YEMAIL_VALUE; ?>" /><?php echo $this->YEMAIL_ERROR; ?><br />
<label><?php echo $this->FRIEND_NAME; ?>:<br /></label>
<input name="fname" type="text" value="<?php echo $this->FNAME_VALUE; ?>" /><?php echo $this->FNAME_ERROR; ?><br />
<label><?php echo $this->FRIEND_EMAIL; ?>:<br /></label>
<input name="femail" type="text" value="<?php echo $this->FEMAIL_VALUE; ?>" /><?php echo $this->FEMAIL_ERROR; ?><br />
<label><?php echo $this->COMMENTS; ?>:</label>
<textarea class="friend_textarea" rows="5" cols="40" name="comments"><?php echo $this->FEMAIL_VALUE; ?></textarea><?php echo $this->COMMENTS_ERROR; ?><br />	
<?php echo $this->CAPTCHA; ?>
<input class="button" type="submit" value="<?php echo $this->SUBMIT; ?>" title="<?php echo $this->SUBMIT; ?>" />
</p>
</form>
</div>
<p>[ <a href="javascript:self.close()" title="<?php echo $this->CLOSE_WINDOW; ?>"><b><?php echo $this->CLOSE_WINDOW; ?></b></a> ]</p>
</div>
<!-- End Main Content Div -->
</body>
</html>
    

