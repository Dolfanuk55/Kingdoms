<?php

/*----------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Footer
-----------------------------------*/

if (!defined('PARENT')) {
  exit;
}

$tpl_footer  = new Savant2();
$tpl_footer->assign('FOOTER', $msg_script3.': <a href="http://www.maianweblog.com/" title="'.$msg_script.' '.$msg_script2.'"><b>'.$msg_script.' '.$msg_script2.'</b></a> &copy; 2003-'.date("Y").' Maian Script World. <a href="http://validator.w3.org/check?uri=referer" title="'.$msg_public_footer.'"><b>'.$msg_public_footer.'</b></a>/<a href="http://jigsaw.w3.org/css-validator/check/referer" title="'.$msg_public_footer2.'"><b>'.$msg_public_footer2.'</b></a>');
$tpl_footer->assign('SNAP_CODE', cleanData($SETTINGS->snap));
$tpl_footer->assign('P_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/profile.html' : $SETTINGS->w_path.'/index.php?cmd=profile'));
$tpl_footer->assign('FEED_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/rss-feed.html' : $SETTINGS->w_path.'/index.php?cmd=rss-feed'));
$tpl_footer->assign('H_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/index.html' : $SETTINGS->w_path.'/index.php'));
$tpl_footer->assign('C_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/contact.html' : $SETTINGS->w_path.'/index.php?cmd=contact'));
$tpl_footer->assign('A_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/all-archive.html' : $SETTINGS->w_path.'/index.php?cmd=all-archive'));
$tpl_footer->assign('HOME', $msg_public_header2);
$tpl_footer->assign('PROFILE', $msg_public_header3);
$tpl_footer->assign('CONTACT', $msg_public_header4);
$tpl_footer->assign('ARCHIVE', $msg_public_header5);
$tpl_footer->assign('RSS_FEED', $msg_public_header12);
$tpl_footer->assign('MENU', $msg_public_header14);
$tpl_footer->assign('SEARCH_URL', ($SETTINGS->modR ? $SETTINGS->w_path.'/index.html' : $SETTINGS->w_path.'/index.php?cmd=search'));
$tpl_footer->assign('IMAGE', ($SETTINGS->profileImage ? '<img class="profile_image" src="'.$SETTINGS->w_path.'/uploads/'.$SETTINGS->profileImage.'"'.($SETTINGS->imageWidth>0 ? ' width="'.$SETTINGS->imageWidth.'"' : ' ').' '.($SETTINGS->imageHeight>0 ? ' height="'.$SETTINGS->imageHeight.'" ' : ' ').'title="'.$msg_public_header3.'" alt="'.$msg_public_header3.'" /><br />' : ''));
$tpl_footer->assign('VIEW_PROFILE', $msg_public_header8);
$tpl_footer->assign('TOP',$msg_script11);
$tpl_footer->assign('FAVOURITE_SITES', loadFavouriteSites());
$tpl_footer->assign('SEARCH_BLOG', $msg_public_header6);
$tpl_footer->assign('SEARCH', $msg_public_header7);
$tpl_footer->assign('KEYWORDS', $msg_public_header9);
$tpl_footer->assign('ENTERED_KEYWORDS', (isset($_GET['keywords']) ? cleanData($_GET['keywords']) : ''));
$tpl_footer->assign('ADSENSE_BLOCK', loadAdsense());
$tpl_footer->assign('SHOW_ARCHIVE', buildArchive($SETTINGS->totalArchives));
$tpl_footer->display('themes/'.THEME.'/footer.tpl.php');

?>
