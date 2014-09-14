<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $this->TITLE; ?></title>
<meta name="description" content="<?php echo $this->META_DESCRIPTION; ?>" />
<meta name="keywords" content="<?php echo $this->META_KEYWORDS; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->CHARSET; ?>" />
<script type="text/javascript" src="<?php echo $this->PATH; ?>/javascript.js"></script>
<link rel="stylesheet" href="<?php echo $this->PATH; ?>/styles.css" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $this->FEED_URL; ?>" />
</head>

<body>
<div class="outer-container">

<div class="inner-container">

	<div class="header">
		
		<div class="title">

			<span class="sitename"><?php echo $this->BLOGNAME; ?></span>
			<div class="slogan"><?php echo $this->SUBTEXT; ?></div>

		</div>
		
	</div>

	<div class="path">
		<a href="<?php echo $this->H_URL; ?>" title="<?php echo $this->HOME; ?>"><?php echo $this->HOME; ?></a> |
    <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->PROFILE; ?>"><?php echo $this->PROFILE; ?></a> |
    <a href="<?php echo $this->C_URL; ?>" title="<?php echo $this->CONTACT; ?>"><?php echo $this->CONTACT; ?></a> |
    <a href="<?php echo $this->A_URL; ?>" title="<?php echo $this->ARCHIVE; ?>"><?php echo $this->ARCHIVE; ?></a> |
    <a href="#" onclick="javascript:toggle_box('s_path')" title="<?php echo $this->SEARCH; ?>"><?php echo $this->SEARCH; ?></a> |
    <a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->RSS_FEED; ?>"><?php echo $this->RSS_FEED; ?></a>
  </div>
  
  <div id="s_path" style="display:none">
  <form action="<?php echo $this->SEARCH_URL; ?>" method="get">
  <p>
     <input type="hidden" name="cmd" value="search" />
     <?php echo $this->KEYWORDS; ?>:
     <input name="keywords" class="searchbox" type="text" value="<?php echo $this->ENTERED_KEYWORDS; ?>" size="30" />
     <input class="search_button" type="submit" value="<?php echo $this->SEARCH; ?>" title="<?php echo $this->SEARCH; ?>" />
  </p>
  </form>
  </div>
	
	<div class="main">		
		
		<div class="content">
