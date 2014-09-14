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
	<div id="header">
		<h1><?php echo $this->BLOGNAME; ?></h1>
		<p><?php echo $this->SUBTEXT; ?></p>
		<ul>
        <li><a href="<?php echo $this->H_URL; ?>" title="<?php echo $this->HOME; ?>"><span><?php echo $this->HOME; ?></span></a></li>
        <li><a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->PROFILE; ?>"><span><?php echo $this->PROFILE; ?></span></a></li>
        <li><a href="<?php echo $this->C_URL; ?>" title="<?php echo $this->CONTACT; ?>"><span><?php echo $this->CONTACT; ?></span></a></li>
        <li><a href="<?php echo $this->A_URL; ?>" title="<?php echo $this->ARCHIVE; ?>"><span><?php echo $this->ARCHIVE; ?></span></a></li>
        <li><a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->RSS_FEED; ?>"><span><?php echo $this->RSS_FEED; ?></span></a></li>
    </ul>	
	</div>
	
	<div id="content">
		<div id="sidebar">
			<h1><?php echo $this->PROFILE; ?></h1>
			<p><?php echo $this->IMAGE; ?>
       - <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->VIEW_PROFILE; ?>"><?php echo $this->VIEW_PROFILE; ?></a>
      </p>
      
      <h1><?php echo $this->ARCHIVE; ?></h1>
			<ul>
        <?php echo $this->SHOW_ARCHIVE; ?>
      </ul>
			
      <h1><?php echo $this->SEARCH_BLOG; ?></h1>
      <form action="<?php echo $this->SEARCH_URL; ?>" method="get">
      <p class="search">
         <input type="hidden" name="cmd" value="search" />
         <?php echo $this->KEYWORDS; ?>:<br />
         <input name="keywords" class="searchbox" type="text" value="<?php echo $this->ENTERED_KEYWORDS; ?>" size="30" /><br /><br />
         <input class="button" type="submit" value="<?php echo $this->SEARCH; ?>" title="<?php echo $this->SEARCH; ?>" />
      </p>
      </form>
			
      <?php echo $this->FAVOURITE_SITES; ?>
      
      <?php echo $this->ADSENSE_BLOCK; ?>
		</div>
