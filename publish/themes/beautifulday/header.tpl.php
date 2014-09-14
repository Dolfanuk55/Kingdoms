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
<div class="top">
				
	<div class="header">

		<div class="left">
			<?php echo $this->BLOGNAME; ?>
		</div>
		
		<div class="right">

			<h2><?php echo $this->SEARCH_BLOG; ?></h2><br />
			<form action="<?php echo $this->SEARCH_URL; ?>" method="get">
      <p>
         <input type="hidden" name="cmd" value="search" />
         <input name="keywords" class="searchbox" type="text" value="<?php echo $this->ENTERED_KEYWORDS; ?>" size="30" /><br />
         <input class="search_button" type="image" src="<?php echo $this->PATH; ?>/images/search.gif" alt="<?php echo $this->SEARCH_BLOG; ?>" title="<?php echo $this->SEARCH_BLOG; ?>" />
      </p>
      </form>
			
		</div>

	</div>	

</div>

<div class="container">	

	<div class="navigation">
	  <a href="<?php echo $this->H_URL; ?>" title="<?php echo $this->HOME; ?>"><span><?php echo $this->HOME; ?></span></a>
    <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->PROFILE; ?>"><span><?php echo $this->PROFILE; ?></span></a>
    <a href="<?php echo $this->C_URL; ?>" title="<?php echo $this->CONTACT; ?>"><span><?php echo $this->CONTACT; ?></span></a>
    <a href="<?php echo $this->A_URL; ?>" title="<?php echo $this->ARCHIVE; ?>"><span><?php echo $this->ARCHIVE; ?></span></a>
    <a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->RSS_FEED; ?>"><span><?php echo $this->RSS_FEED; ?></span></a>
		<div id="date"><?php echo date("j F Y"); ?></div>
    <div class="clearer"><span></span></div>
	</div>

	<div class="main">		
		
		<div class="content">
