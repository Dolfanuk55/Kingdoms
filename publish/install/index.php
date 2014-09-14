<?php

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Weblog v4.0
  Written by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: http://www.maianscriptworld.co.uk

  +++++++++++++++++++++++++++++++++++++++++++++++++++++++

  This File: index.php
  Description: Installation File

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

error_reporting (E_ALL ^ E_NOTICE);

include('../lang/english.php');
include('../inc/db_connection.inc.php');

$step_one    = true;
$step_two    = false;
$step_three  = false;

$whichstep = 'Step One';

$cmd = (isset($_GET['cmd']) ? $_GET['cmd'] : '');

if (!empty($cmd))
{
     switch ($cmd)
     {
          case "stepone":

          $count   = 0;
          $img     = array();
          $table   = array();
          $status  = array();
          
          $whichstep = 'Step Two';

          //Install Table One: Settings =>

          $query_1 = mysql_query("CREATE TABLE ".$database['prefix']."settings (
                                 id             TINYINT(1) NOT NULL default '1',
                                 theme          VARCHAR(50) NOT NULL default 'standard',
                                 name           VARCHAR(50) NOT NULL default '',
                                 email          VARCHAR(60) NOT NULL default '',
                                 website        VARCHAR(100) NOT NULL default '',
                                 w_path         VARCHAR(250) NOT NULL default '',
                                 blogname       VARCHAR(200) NOT NULL default '',
                                 dateformat     VARCHAR(20) NOT NULL default 'D j M Y, G:ia',
                                 timeOffset     VARCHAR (4) NOT NULL default '',
                                 language       VARCHAR(30) NOT NULL default 'english.php',
                                 total          INT(3) NOT NULL default '25',
                                 hometotal      INT(3) NOT NULL default '5',
                                 rssfeeds       INT(5) NOT NULL default '50',
                                 totalArchives  TINYINT(3) NOT NULL default '18',
                                 commentsOrder  CHAR(3) NOT NULL default 'asc',
                                 enableCaptcha  ENUM('0','1') NOT NULL DEFAULT '1',
                                 modR           ENUM('0','1') NOT NULL DEFAULT '0',
                                 parseLinks     ENUM('0','1') NOT NULL DEFAULT '1',
                                 meta_k         MEDIUMTEXT NOT NULL,
                                 meta_d         MEDIUMTEXT NOT NULL,
                                 bookmarks      VARCHAR(50) NOT NULL default '',
                                 profile        MEDIUMTEXT NOT NULL,
                                 profileImage   VARCHAR(50) NOT NULL default '',
                                 profileUpdate  TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
                                 imageWidth     TINYINT(3) NOT NULL default '90',
                                 imageHeight    TINYINT(3) NOT NULL default '120',
                                 adsense        TEXT NOT NULL,
                                 snap           TEXT NOT NULL,
                                 wysiwyg        ENUM('0','1') NOT NULL DEFAULT '1',
                                 smtp           ENUM('0','1') NOT NULL DEFAULT '0',
                                 smtp_host      VARCHAR(100) NOT NULL default 'localhost',
                                 smtp_user      VARCHAR(100) NOT NULL default '',
                                 smtp_pass      VARCHAR(100) NOT NULL default '',
                                 smtp_port      VARCHAR(5) NOT NULL default '25',
                                 PRIMARY KEY(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                                 ");

          if ($query_1)
          {
               $img[]     = '<img class="install_img" src="images/install_ok.gif" alt="OK" title="OK" border="1">';
               $table[]   = $database['prefix'] . 'settings';
               $status[]  = 'Installed';
          }
          else
          {
               $img[]     = '<img class="install_img" src="images/install_error.gif" alt="Error" title="Error" border="1">';
               $table[]   = $database['prefix'] . 'settings';
               $status[]  = '<span class="error">Error!</span>';
               $count++;
          }
          
          $query_2 = mysql_query("CREATE TABLE ".$database['prefix']."comments (
                                 id           INT UNSIGNED NOT NULL auto_increment,
                                 postid       INT UNSIGNED NOT NULL default '0',
                                 name         VARCHAR(50) NOT NULL default '',
                                 email        VARCHAR(250) NOT NULL default '',
                                 comments     TEXT NOT NULL,
                                 rawpostdate  VARCHAR(50) NOT NULL default '',
                                 addDate      DATE NOT NULL default '0000-00-00',
                                 postdate     TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
                                 adminPost    ENUM('0','1') NOT NULL DEFAULT '1',
                                 PRIMARY KEY(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                                 ");

          if ($query_2)
          {
               $img[]     = '<img class="install_img" src="images/install_ok.gif" alt="OK" title="OK" border="1">';
               $table[]   = $database['prefix'] . 'comments';
               $status[]  = 'Installed';
          }
          else
          {
               $img[]     = '<img class="install_img" src="images/install_error.gif" alt="Error" title="Error" border="1">';
               $table[]   = $database['prefix'] . 'comments';
               $status[]  = '<span class="error">Error!</span>';
               $count++;
          }
          
          $query_3 = mysql_query("CREATE TABLE ".$database['prefix']."blogs (
                                 id            INT UNSIGNED NOT NULL auto_increment,
                                 title         TEXT NOT NULL,
                                 comments      TEXT NOT NULL,
                                 addDate       DATE NOT NULL default '0000-00-00',
                                 postdate      TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
                                 rawpostdate   VARCHAR(50) NOT NULL default '',
                                 allow         ENUM('0','1') NOT NULL DEFAULT '1',
                                 notify        ENUM('0','1') NOT NULL DEFAULT '1',
                                 v_count       INT(5) NOT NULL default '0',
                                 archiveMonth  CHAR(2) NOT NULL default '',
                                 archiveYear   CHAR(4) NOT NULL default '',
                                 rss_date      VARCHAR(35) NOT NULL default '',
                                 PRIMARY KEY(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                                 ");

          if ($query_3)
          {
               $img[]     = '<img class="install_img" src="images/install_ok.gif" alt="OK" title="OK" border="1">';
               $table[]   = $database['prefix'] . 'blogs';
               $status[]  = 'Installed';
          }
          else
          {
               $img[]     = '<img class="install_img" src="images/install_error.gif" alt="Error" title="Error" border="1">';
               $table[]   = $database['prefix'] . 'blogs';
               $status[]  = '<span class="error">Error!</span>';
               $count++;
          }
          
          $query_4 = mysql_query("CREATE TABLE ".$database['prefix']."favourites (
                                 id           INT(4) NOT NULL auto_increment,
                                 name         VARCHAR(100) NOT NULL default '',
                                 url          TEXT NOT NULL,
                                 PRIMARY KEY(id)) ENGINE=MyISAM DEFAULT CHARSET=latin1;
                                 ");

          if ($query_4)
          {
               $img[]     = '<img class="install_img" src="images/install_ok.gif" alt="OK" title="OK" border="1">';
               $table[]   = $database['prefix'] . 'favourites';
               $status[]  = 'Installed';
          }
          else
          {
               $img[]     = '<img class="install_img" src="images/install_error.gif" alt="Error" title="Error" border="1">';
               $table[]   = $database['prefix'] . 'favourites';
               $status[]  = '<span class="error">Error!</span>';
               $count++;
          }

          $step_one    = false;
          $step_two    = true;
          $step_three  = false;
          break;

          case "steptwo":
          
          $whichstep = 'Completed';

          mysql_query("INSERT INTO ".$database['prefix']."settings (
                      id, 
                      theme, 
                      name, 
                      email, 
                      website, 
                      w_path, 
                      blogname, 
                      dateformat, 
                      timeOffset, 
                      language, 
                      total, 
                      hometotal, 
                      rssfeeds, 
                      totalArchives, 
                      commentsOrder, 
                      enableCaptcha, 
                      modR, 
                      parseLinks,
                      meta_k, 
                      meta_d, 
                      bookmarks,
                      profile, 
                      profileImage, 
                      profileUpdate, 
                      imageWidth, 
                      imageHeight, 
                      adsense, 
                      snap, 
                      wysiwyg, 
                      smtp, 
                      smtp_host, 
                      smtp_user, 
                      smtp_pass, 
                      smtp_port
                      ) VALUES (
                      1, 
                      'standard', 
                      'Your Name or Username', 
                      'you@yoursite.com', 
                      'Website Name', 
                      'http://www.yoursite.com/weblog', 
                      'Your Blog Name', 
                      'D j M Y, G:ia', 
                      '0', 
                      'english.php', 
                      25, 
                      5, 
                      50, 
                      15, 
                      'asc', 
                      '1', 
                      '0',
                      '1', 
                      '', 
                      '', 
                      '1,2,6,13,15',
                      '',
                      '', 
                      now(), 
                      90, 
                      120, 
                      '', 
                      '', 
                      '1', 
                      '0', 
                      'localhost', 
                      '', 
                      '', 
                      '25'
                      )") or die(mysql_error());

          $step_one    = false;
          $step_two    = false;
          $step_three  = true;
          break;
     }
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $msg_charset; ?>">
<title><?php echo $msg_script . ' ' . $msg_script2; ?> - Installation</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function step_one(URL,txt)
{
     var txt;
     
     alert(txt);
     
     window.location = URL;
}
</script>
</head>

<body>
<div align="center">
<table width="760" border="0" cellpadding="0" cellspacing="1" class="logotablebg">
<tr>
    <td>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td align="center" valign="top" colspan="2"><img src="images/logo.gif" alt="<?php echo $msg_script . ' ' . $msg_script2; ?> - Installation" title="<?php echo $msg_script . ' ' . $msg_script2; ?> - Installation"></td>
    </tr>
    </table>
    </td>
</tr>
<tr>
    <td align="right" class="heading_text">[ <b><?php echo $msg_script . ' ' . $msg_script2; ?> - Installation</b> ]</td>
</tr>
<tr>
    <td align="center" class="wrapperTable"><br>
    <fieldset>
    <legend><?php echo $whichstep; ?></legend><br>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
    <?php
    
    //Installation: Step One =>

    if ($step_one && !$step_two && !$step_three)
    {

    ?>
    <tr>
        <td align="left" valign="top" colspan="2">Welcome to the <?php echo $msg_script . ' ' . $msg_script2; ?> script installation file. This file will set up your database with the required tables and information.<br><br>
        Before you begin make sure you have created a database and specified its connection information in the following file.<br><br><b>inc/db_connection.inc.php</b><br><br>
        If you are unsure of the procedure of how to set up a database, please contact your web hosting company who will be happy to advise you. Here are links for some of the popular control panels:<br><br>
        <b>- <a href="http://www.cpanel.net/docs/cpanel/" title="cPanel" target="_blank">cPanel</a></b><br>
        <b>- <a href="http://www.swsoft.com/en/products/plesk/tutorials/" title="Plesk" target="_blank">Plesk</a></b><br>
        <b>- <a href="http://www.ensim.com/index.html" title="Ensim" target="_blank">Ensim</a></b><br><br>
        When you are satisfied that the information you have specified is correct, click the following button to commence setup. Installation will only take a few seconds:
        <p align="center"><br><br><input type="button" class="formbutton" value="INSTALL TABLES &raquo;" title="INSTALL TABLES" onclick="javascript:step_one('index.php?cmd=stepone','If setup terminates for any reason, please revert to manual setup.\n\nSee the docs for more information!')"></p>
        <p>&nbsp;</p></td>
    </tr>
    <?php
    
    }
    
    //Installation: Step Two =>

    if (!$step_one && $step_two && !$step_three)
    {

    ?>
    <tr>
        <td align="left" valign="top" colspan="2">&raquo; <b>Initialising Table Setup....Complete...</b><br><br>&nbsp;&nbsp;&nbsp;Table setup has now completed. Below are the results of step one. If you see no errors, click 'Install Data' to proceed.<br><br><br>
        <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" class="tbBorder">
        <tr>
            <td height="20" width="5%" class="detailsHeader">&nbsp;</td>
            <td height="20" width="75%" class="detailsHeader">[ <b>TABLE</b> ]</td>
            <td height="20" width="20%" class="detailsHeader">[ <b>STATUS</b> ]</td>
        </tr>
        <?php
        
        //Loop through arrays and display data

        for ($i=0; $i<count($img); $i++)
        {
          
        ?>
        <tr>
            <td align="center" height="20" class="details"><?php echo $img[$i]; ?></td>
            <td height="20" class="details"><b><?php echo $table[$i]; ?></b></td>
            <td height="20" class="details"><?php echo $status[$i]; ?></td>
        </tr>
        <?php
        
        }
        
        ?>
        </table>
        <p align="center"><br><br><?php echo ($count==0 ? '<input type="button" class="formbutton" value="INSTALL DATA &raquo;" title="INSTALL DATA" onclick="parent.location=\'index.php?cmd=steptwo\'">' : '<span style="color:red;font-size:14px;font-weight:bold;">Installation Aborted!</span><br>Don`t panic, this isn`t as bad as it sounds.<br><br>Please revert to manual setup. See docs for more information.'); ?></p>
        <p>&nbsp;</p></td>
    </tr>
    <?php
    
    }
    
    //Installation: Step Three =>

    if (!$step_one && !$step_two && $step_three)
    {

    ?>
    <tr>
        <td align="left" valign="top" colspan="2">
        <table width="100%" cellpadding="0" align="center" cellspacing="0" class="tbBorder">
        <tr>
            <td align="center" class="completed">INSTALLATION COMPLETE!</td>
        </tr>
        </table><br><br>
        Congratulations, you have successfully set up <?php echo $msg_script . ' ' . $msg_script2; ?>. For security reasons it is recommended you delete the <b>/install/</b> directory and all its contents from your server. If you forget, you will see a prompt in your admin area when you log in. This will keep appearing until the directory has been removed.<br><br>
        To set up your blog, log into your admin area and update your settings:<br><br>
        <p align="center"><br><br><input type="button" class="formbutton" value="ACCESS ADMINISTRATION AREA &raquo;" title="ACCESS ADMINISTRATION AREA" onclick="parent.location='../admin/index.php?cmd=login'"></p>
        <p>&nbsp;</p></td>
    </tr>
    <?php
    
    }
    
    ?>
    </table>
    </fieldset>
    <p>&nbsp;</p>
    </td>
</tr>
</table>
</div>
<p align="center" class="copyright"><b><?php echo $msg_script3; ?></b>: <a href="http://www.maianscriptworld.co.uk/free-php-scripts/maian-weblog/free-blog-system/index.html" title="<?php echo $msg_script." ".$msg_script2; ?>" target="_blank"><?php echo $msg_script." ".$msg_script2; ?></a><br>&copy; <?php echo '2005-'.date("Y"); ?> Maian Script World. <?php echo $msg_script14; ?></p>
</body>
</html>
