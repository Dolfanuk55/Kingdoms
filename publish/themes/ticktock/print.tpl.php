<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $this->TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->CHARSET; ?>" />
<link rel="stylesheet" href="<?php echo $this->PATH; ?>/styles.css" type="text/css" />
</head>

<body onload="javascript:window.print()">
<!-- Main Content Div -->
<div id="print_wrapper">
<?php echo $this->BLOG_DATA; ?>
<?php echo $this->COMMENT_DATA; ?>
<p>[ <a href="javascript:self.close()" title="<?php echo $this->CLOSE_WINDOW; ?>"><b><?php echo $this->CLOSE_WINDOW; ?></b></a> ]</p>
</div>
<!-- End Main Content Div -->
</body>
</html>
    

