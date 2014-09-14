<?php

/*----------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Header
-----------------------------------*/

if (!defined('PARENT')) {
  exit;
}

$tpl_header  = new Savant2();
$tpl_header->assign('CHARSET', $msg_charset);
$tpl_header->assign('TITLE', $pageTitle);
$tpl_header->assign('BLOGNAME', cleanData($SETTINGS->blogname));
$tpl_header->assign('META_DESCRIPTION', cleanData($SETTINGS->meta_d));
$tpl_header->assign('META_KEYWORDS', cleanData($SETTINGS->meta_k));
$tpl_header->assign('PATH', $SETTINGS->w_path.'/themes/'.THEME);
$tpl_header->assign('SUBTEXT', $msg_public_header);
$tpl_header->assign('FEED_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/rss-feed.html' : $SETTINGS->w_path.'/index.php?cmd=rss-feed'));
$tpl_header->assign('H_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/index.html' : $SETTINGS->w_path.'/index.php'));
$tpl_header->assign('P_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/profile.html' : $SETTINGS->w_path.'/index.php?cmd=profile'));
$tpl_header->assign('C_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/contact.html' : $SETTINGS->w_path.'/index.php?cmd=contact'));
$tpl_header->assign('A_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/all-archive.html' : $SETTINGS->w_path.'/index.php?cmd=all-archive'));
$tpl_header->assign('SEARCH_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/index.html' : $SETTINGS->w_path.'/index.php?cmd=search'));
$tpl_header->assign('H_CURRENT', ($cmd=='home' ? ' id="current"' : ''));
$tpl_header->assign('P_CURRENT', ($cmd=='profile' ? ' id="current"' : ''));
$tpl_header->assign('C_CURRENT', ($cmd=='contact' ? ' id="current"' : ''));
$tpl_header->assign('A_CURRENT', ($cmd=='archive' || $cmd=='all-archive' ? ' id="current"' : ''));
$tpl_header->assign('H_CURRENT_CLASS', ($cmd=='home' ? ' class="selected"' : ''));
$tpl_header->assign('P_CURRENT_CLASS', ($cmd=='profile' ? ' class="selected"' : ''));
$tpl_header->assign('C_CURRENT_CLASS', ($cmd=='contact' ? ' class="selected"' : ''));
$tpl_header->assign('A_CURRENT_CLASS', ($cmd=='archive' || $cmd=='all-archive' ? ' class="selected"' : ''));
$tpl_header->assign('HOME', $msg_public_header2);
$tpl_header->assign('PROFILE', $msg_public_header3);
$tpl_header->assign('CONTACT', $msg_public_header4);
$tpl_header->assign('ARCHIVE', $msg_public_header5);
$tpl_header->assign('RSS_FEED', $msg_public_header12);
$tpl_header->assign('MENU', $msg_public_header14);
$tpl_header->assign('SHOW_ARCHIVE', buildArchive($SETTINGS->totalArchives));
$tpl_header->assign('VIEW_PROFILE', $msg_public_header8);
$tpl_header->assign('SEARCH_BLOG', $msg_public_header6);
$tpl_header->assign('SEARCH', $msg_public_header7);
$tpl_header->assign('KEYWORDS', $msg_public_header9);
$tpl_header->assign('IMAGE', ($SETTINGS->profileImage ? '<img class="profile_image" src="'.$SETTINGS->w_path.'/uploads/'.$SETTINGS->profileImage.'"'.($SETTINGS->imageWidth>0 ? ' width="'.$SETTINGS->imageWidth.'"' : ' ').' '.($SETTINGS->imageHeight>0 ? ' height="'.$SETTINGS->imageHeight.'" ' : ' ').'title="'.$msg_public_header3.'" alt="'.$msg_public_header3.'" /><br />' : ''));
$tpl_header->assign('ENTERED_KEYWORDS', (isset($_GET['keywords']) ? cleanData($_GET['keywords']) : ''));
$tpl_header->assign('FAVOURITE_SITES', loadFavouriteSites());
$tpl_header->assign('ADSENSE_BLOCK', loadAdsense());
$tpl_header->display('themes/'.THEME.'/header.tpl.php');

?>
