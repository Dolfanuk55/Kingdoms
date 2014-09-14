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
<div id="upbg"></div>
<div id="outer">

  <div id="header">
		<div id="headercontent">
			<h1><?php echo $this->BLOGNAME; ?></h1>
			<h2><?php echo $this->SUBTEXT; ?></h2>
		</div>
	</div>


	<form action="<?php echo $this->SEARCH_URL; ?>" method="get">
		<div id="search">
		  <input type="hidden" name="cmd" value="search" />
			<input name="keywords" class="search_box" type="text" value="<?php echo $this->ENTERED_KEYWORDS; ?>" size="30" />
      <input class="button" type="submit" value="<?php echo $this->SEARCH; ?>" title="<?php echo $this->SEARCH; ?>" />
		</div>
	</form>

	<div id="headerpic"></div>

	<div id="menu">
		<ul>
        <li<?php echo $this->H_CURRENT; ?>><a href="<?php echo $this->H_URL; ?>" title="<?php echo $this->HOME; ?>"><span><?php echo $this->HOME; ?></span></a></li>
        <li<?php echo $this->P_CURRENT; ?>><a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->PROFILE; ?>"><span><?php echo $this->PROFILE; ?></span></a></li>
        <li<?php echo $this->C_CURRENT; ?>><a href="<?php echo $this->C_URL; ?>" title="<?php echo $this->CONTACT; ?>"><span><?php echo $this->CONTACT; ?></span></a></li>
        <li<?php echo $this->A_CURRENT; ?>><a href="<?php echo $this->A_URL; ?>" title="<?php echo $this->ARCHIVE; ?>"><span><?php echo $this->ARCHIVE; ?></span></a></li>
        <li><a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->RSS_FEED; ?>"><span><?php echo $this->RSS_FEED; ?></span></a></li>
     </ul>
     
     <div id="date"><br />
       <?php echo date("j F Y"); ?>
     </div>	
	
  </div>
	<div id="menubottom"></div>
	
	<div id="content">
	
	<div id="secondarycontent">
			<!-- Secondary content area start -->
			
			<div class="box">
				<h4><?php echo $this->PROFILE; ?></h4>
				<div class="contentarea">
				<p>
        <?php echo $this->IMAGE; ?>
        - <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->VIEW_PROFILE; ?>"><?php echo $this->VIEW_PROFILE; ?></a>
        </p>
        </div>
			</div>
		
			<div class="box">
				<h4><?php echo $this->ARCHIVE; ?></h4>
				<div class="contentarea">
					<ul class="linklist">
						<?php echo $this->SHOW_ARCHIVE; ?>
					</ul>
				</div>
			</div>
			
			<?php echo $this->FAVOURITE_SITES; ?>
       
      <?php echo $this->ADSENSE_BLOCK; ?>

			<!-- Secondary content area end -->
	</div>
