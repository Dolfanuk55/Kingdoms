<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - Home
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <?php
    if (isset($INSTALL_FILE))
    {
    ?>
    <table width="100%" cellpadding="3" cellspacing="3" border="0" style="border: 1px solid #FF0000;">
    <tr>
        <td align="center" class="error"><?php echo $msg_adminhome; ?></td>
    </tr>
    </table>
    <?php
    }
    ?>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:3px">
    <tr>
        <td align="left">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
        <tr>
           <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000"><?php echo $msg_adminhome2; ?></td>
        </tr>
        </table>
        <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border:1px solid #164677">
        <tr>
            <td align="left" height="20" class="menutable" width="85%">&raquo; <b><?php echo str_replace("{count}",LATEST_BLOGS,$msg_adminhome6); ?></b></td>
        </tr>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:3px;border:1px solid #164677">
        <tr>
           <td align="left" style="padding:2px;background-color:#F0F6FF;color:#000000">
           <?php
           
           $q_latest = mysql_query("SELECT * FROM ".$database['prefix']."blogs ORDER BY id DESC LIMIT ".LATEST_BLOGS."") or die(mysql_error());
           
           while ($BLOGS = mysql_fetch_object($q_latest))
           {
           ?>
           <table width="100%" cellspacing="0" cellpadding="0" style="margin-top:3px;border:1px solid #64798E">
           <tr>
             <td align="left" width="90%" style="padding:5px;background-color:#FFFFFF"><a href="../index.php?cmd=blog&amp;post=<?php echo $BLOGS->id; ?>" target="_blank" title="<?php echo cleanData($BLOGS->title); ?>"><b><?php echo cleanData($BLOGS->title); ?></b></a></td>
             <td align="right" style="padding:5px;background-color:#FFFFFF"><a href="index.php?cmd=edit&amp;id=<?php echo $BLOGS->id; ?>"><img src="images/edit_small.gif" alt="<?php echo $msg_showblogs8; ?>" title="<?php echo $msg_showblogs8; ?>" border="0"></a></td>
           </tr>
           </table>
           <?php
           }
           
           ?>
           </td>
        </tr>
        </table>
        <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border:1px solid #164677">
        <tr>
            <td align="left" height="20" class="menutable" width="85%">&raquo; <b><?php echo $msg_adminhome3; ?></b></td>
        </tr>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" style="margin-top:3px;border:1px solid #164677">
        <tr>
          <td style="padding:5px" align="left">
          <?php echo $msg_adminhome4; ?><br><br>
          <a href="http://www.maianweblog.com/" target="_blank"><img src="images/donation.gif" border="0" alt="<?php echo $msg_adminhome3; ?>" title="<?php echo $msg_adminhome3; ?>"></a><br><br>
          <?php echo $msg_adminhome5; ?>
          <br><a href="http://www.maianscriptworld.co.uk" target="_blank" title="Maian Script World">www.maianscriptworld.co.uk</a><br><br>
          </td>
        </tr>
        </table>
        </td>
    </tr>
    </table>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="border:1px solid #64798E;margin-top:3px">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF" valign="middle">&nbsp;</td>
        <td align="right" style="padding:5px;background-color:#F0F6FF" valign="top"><a href="#top"><img src="images/up.gif" alt="<?php echo $msg_script11; ?>" title="<?php echo $msg_script11; ?>" border="0"></a><br><?php echo $msg_script11; ?></td>
    </tr>
    </table>
    </td>
</tr>

