<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title><?php echo $this->TITLE; ?></title>
<meta name="description" content="<?php echo $this->META_DESCRIPTION; ?>" />
<meta name="keywords" content="<?php echo $this->META_KEYWORDS; ?>" />
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=<?php echo $this->CHARSET; ?>" />
<base href="<?php echo $this->PATH; ?>/" />
<script type="text/javascript" src="<?php echo $this->PATH; ?>/javascript.js"></script>
<link rel="stylesheet" href="<?php echo $this->PATH; ?>/styles.css" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $this->FEED_URL; ?>" />
</head>

<body>
<!-- System Wrapper -->
<div id="wrap">
		
    <!-- Blog Header -->
    <div id="header">
     <h1 id="logo"><?php echo $this->BLOGNAME; ?></h1>
     <h2 id="slogan"><?php echo $this->SUBTEXT; ?></h2>
    </div>
    <!-- End Blog Header -->
		
    <!-- Blog Menu/Date -->
    <div id="menu">
     <ul>
        <li<?php echo $this->H_CURRENT; ?>><a href="<?php echo $this->H_URL; ?>" title="<?php echo $this->HOME; ?>"><span><?php echo $this->HOME; ?></span></a></li>
        <li<?php echo $this->P_CURRENT; ?>><a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->PROFILE; ?>"><span><?php echo $this->PROFILE; ?></span></a></li>
        <li<?php echo $this->C_CURRENT; ?>><a href="<?php echo $this->C_URL; ?>" title="<?php echo $this->CONTACT; ?>"><span><?php echo $this->CONTACT; ?></span></a></li>
        <li<?php echo $this->A_CURRENT; ?>><a href="<?php echo $this->A_URL; ?>" title="<?php echo $this->ARCHIVE; ?>"><span><?php echo $this->ARCHIVE; ?></span></a></li>
        <li><a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->RSS_FEED; ?>"><span><?php echo $this->RSS_FEED; ?></span></a></li>
     </ul>
			
     <div id="date">
     <?php echo date("j F Y"); ?>
     </div>	
    </div>	
    <!-- End Blog Menu/Date -->
		 
    <!-- Content Wrapper -->
    <div id="content-wrap">
    
      <!-- Sidebar. Profile, Search, Archive,Fave Sites & Adsense -->
      <div id="sidebar">
       <h1 class="sidebar_profile"><?php echo $this->PROFILE; ?></h1>
       <p class="profile">
       <?php echo $this->IMAGE; ?>
       - <a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->VIEW_PROFILE; ?>"><?php echo $this->VIEW_PROFILE; ?></a>
       </p>
       
       <h1 class="sidebar_search"><?php echo $this->SEARCH_BLOG; ?></h1>
       <form action="<?php echo $this->SEARCH_URL; ?>" method="get">
       <p>
         <input type="hidden" name="cmd" value="search" />
         <label><?php echo $this->KEYWORDS; ?>:</label>
         <input name="keywords" class="searchbox" type="text" value="<?php echo $this->ENTERED_KEYWORDS; ?>" size="30" /><br /><br />
         <input class="button" type="submit" value="<?php echo $this->SEARCH; ?>" title="<?php echo $this->SEARCH; ?>" />
       </p>
       </form>
       
       <h1 class="sidebar_archive"><?php echo $this->ARCHIVE; ?></h1>
       <ul class="sidemenu">
          <?php echo $this->SHOW_ARCHIVE; ?>
       </ul>
       
       <?php echo $this->FAVOURITE_SITES; ?>
       
       <?php echo $this->ADSENSE_BLOCK; ?>
       
       <p>&nbsp;</p>
      </div>
      <!-- End Sidebar. Profile, Search & Archive -->
