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
<!-- Main -->
<div id="main" class="box">

    <!-- Header -->
    <div id="header">

        <!-- Logo -->
        <h1 id="logo"><a id="top"></a><?php echo $this->BLOGNAME; ?><span></span></h1>
        <hr class="noscreen" />          
        <!-- /Logo -->

        <!-- Search -->
        <div id="search" class="noprint">
            <form action="<?php echo $this->SEARCH_URL; ?>" method="get">
                <fieldset><legend><?php echo $this->SEARCH_BLOG; ?></legend>
                <input type="hidden" name="cmd" value="search" />
                    <label><span class="noscreen"><?php echo $this->SEARCH_BLOG; ?>:</span>
                    <span id="search-input-out"><input name="keywords" id="search-input" type="text" value="<?php echo $this->ENTERED_KEYWORDS; ?>" size="30" /></span></label>
                    <input type="image" src="<?php echo $this->PATH; ?>/images/search_submit.gif" alt="<?php echo $this->SEARCH_BLOG; ?>" title="<?php echo $this->SEARCH_BLOG; ?>" id="search-submit" />
                </fieldset>
            </form>
        </div> 
        <!-- /search -->

    </div> 
    <!-- /header -->

     <!-- Main menu (tabs) -->
     <div id="tabs" class="noprint">
            <h3 class="noscreen">Navigation</h3>
            <ul class="box">
                <li<?php echo $this->H_CURRENT; ?>><a href="<?php echo $this->H_URL; ?>" title="<?php echo $this->HOME; ?>"><?php echo $this->HOME; ?><span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li<?php echo $this->P_CURRENT; ?>><a href="<?php echo $this->P_URL; ?>" title="<?php echo $this->PROFILE; ?>"><?php echo $this->PROFILE; ?><span class="tab-l"></span><span class="tab-r"></span></a></li> <!-- Active -->
                <li<?php echo $this->C_CURRENT; ?>><a href="<?php echo $this->C_URL; ?>" title="<?php echo $this->CONTACT; ?>"><?php echo $this->CONTACT; ?><span class="tab-l"></span><span class="tab-r"></span></a></li>
                <li<?php echo $this->A_CURRENT; ?>><a href="<?php echo $this->A_URL; ?>" title="<?php echo $this->ARCHIVE; ?>"><?php echo $this->ARCHIVE; ?><span class="tab-l"></span><span class="tab-r"></span></a></li>
            </ul>

        <hr class="noscreen" />
     </div> 
     <!-- /tabs -->

    <!-- Page (2 columns) -->
    <div id="page" class="box">
    <div id="page-in" class="box">

        <!-- RSS Strip -->
        <div id="strip" class="box noprint">

            <!-- RSS feeds -->
            <p id="rss"><a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->RSS_FEED; ?>"><b><?php echo $this->RSS_FEED; ?></b></a></p>
            <hr class="noscreen" />
            
        </div> 
        <!-- /strip -->
