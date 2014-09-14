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
<div id="menu">
	<ul>
      <li<?php echo $this->H_CURRENT_CLASS; ?>><a href="<?php echo $this->H_URL; ?>" title="<?php echo $this->HOME; ?>"><span><?php echo $this->HOME; ?></span></a></li>
      <li<?php echo $this->P_CURRENT_CLASS; ?>><a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->PROFILE; ?>"><span><?php echo $this->PROFILE; ?></span></a></li>
      <li<?php echo $this->C_CURRENT_CLASS; ?>><a href="<?php echo $this->C_URL; ?>" title="<?php echo $this->CONTACT; ?>"><span><?php echo $this->CONTACT; ?></span></a></li>
      <li<?php echo $this->A_CURRENT_CLASS; ?>><a href="<?php echo $this->A_URL; ?>" title="<?php echo $this->ARCHIVE; ?>"><span><?php echo $this->ARCHIVE; ?></span></a></li>
      <li><a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->RSS_FEED; ?>"><span><?php echo $this->RSS_FEED; ?></span></a></li>
  </ul>
</div>
<!-- end #menu -->
<div id="header">
  <form action="<?php echo $this->SEARCH_URL; ?>" method="get">
	<h1>
   <input type="hidden" name="cmd" value="search" />
   <label><?php echo $this->SEARCH_BLOG; ?>:</label>
   <input name="keywords" class="searchbox" type="text" value="<?php echo $this->ENTERED_KEYWORDS; ?>" size="30" /><br />
   <input class="button" type="submit" value="<?php echo $this->SEARCH; ?>" title="<?php echo $this->SEARCH; ?>" />
  </h1>
  </form>
	<h2><?php echo $this->BLOGNAME; ?></h2>
</div>
<!-- end #header -->
<div id="wrapper">
	<div id="content">
		
		<div id="links">
			<ul>
			  <li>
					<h2><?php echo $this->PROFILE; ?></h2>
					<ul>
						<li><?php echo $this->IMAGE; ?>
                - <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->VIEW_PROFILE; ?>"><?php echo $this->VIEW_PROFILE; ?></a>
            </li>
					</ul>
				</li>
				<li>
					<h2><?php echo $this->ARCHIVE; ?></h2>
					<ul>
						<?php echo $this->SHOW_ARCHIVE; ?>
					</ul>
				</li>
				<?php echo $this->FAVOURITE_SITES; ?>
				<?php echo $this->ADSENSE_BLOCK; ?>
			</ul>
		</div>
		<!-- end #links -->
