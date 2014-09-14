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
    <div class="wrapper">
    
      <div class="container">
        <div id="searchBar">
          <div class="head"> &nbsp;<?php echo $this->SEARCH; ?></div>
          <div class="content">
          <form action="<?php echo $this->SEARCH_URL; ?>" method="get">
          <p class="search_block">
          <input type="hidden" name="cmd" value="search" />
          <input name="search_button" type="image" class="button" title="<?php echo $this->SEARCH; ?>" alt="<?php echo $this->SEARCH; ?>" src="<?php echo $this->PATH; ?>/images/search.gif" />
          <input type="text" name="keywords" class="search" value="<?php echo $this->ENTERED_KEYWORDS; ?>" />
          </p>
          </form></div>
      </div>
  
      <div class="icon">
          <img src="<?php echo $this->PATH; ?>/images/hand_logo.gif" alt="<?php echo $this->BLOGNAME; ?>" title="<?php echo $this->BLOGNAME; ?>" />
          <div>
           <?php echo date("j F Y"); ?>
          </div>	
      </div>
	
  	  <div id="title">
          <h1><?php echo $this->BLOGNAME; ?></h1>
          <h2><?php echo $this->SUBTEXT; ?></h2>
      </div>
  
      <div id="navigation">
          <ul>
            <li><a<?php echo $this->H_CURRENT_CLASS; ?> href="<?php echo $this->H_URL; ?>" title="<?php echo $this->HOME; ?>"><?php echo $this->HOME; ?></a></li> 	  
            <li><a<?php echo $this->P_CURRENT_CLASS; ?> href="<?php echo $this->P_URL; ?>" title="<?php echo $this->PROFILE; ?>"><span><?php echo $this->PROFILE; ?></span></a></li>
            <li><a<?php echo $this->C_CURRENT_CLASS; ?> href="<?php echo $this->C_URL; ?>" title="<?php echo $this->CONTACT; ?>"><span><?php echo $this->CONTACT; ?></span></a></li>
            <li><a<?php echo $this->A_CURRENT_CLASS; ?> href="<?php echo $this->A_URL; ?>" title="<?php echo $this->ARCHIVE; ?>"><span><?php echo $this->ARCHIVE; ?></span></a></li>
            <li><a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->RSS_FEED; ?>"><span><?php echo $this->RSS_FEED; ?></span></a></li>
          </ul>
      </div>
      <br class="clear" />
        
      <div id="body">
        <div class="sidebar">
        <h3><?php echo $this->PROFILE; ?></h3>
			  <div class="content">
				<p>
          <?php echo $this->IMAGE; ?>
          - <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->VIEW_PROFILE; ?>"><?php echo $this->VIEW_PROFILE; ?></a>
          </p>
			  </div>
			  <br />
		      
		    <h3><?php echo $this->ARCHIVE; ?></h3>
			  <div class="content">
				  <ul class="links">
          <?php echo $this->SHOW_ARCHIVE; ?>
          </ul>
			  </div>
			  <br />
			    
			  <?php echo $this->FAVOURITE_SITES; ?>
       
        <?php echo $this->ADSENSE_BLOCK; ?>
			   
			  <br class="clear" />
        </div>
          
          <!-- Content Starts Here -->
