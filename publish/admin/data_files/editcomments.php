<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - Add New Blog
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

$q_comms = mysql_query("SELECT * FROM ".$database['prefix']."comments WHERE id = '".(int)$_GET['id']."' LIMIT 1") or die(mysql_error());
$COMMENTS = mysql_fetch_object($q_comms);

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_editcomments2); ?></b><br><br><?php echo $msg_editcomments5; ?></td>
    </tr>
    <tr>
        <td align="right" style="padding:5px;background-color:#F0F6FF;color:#000000"><a href="index.php?cmd=listcomments" title="<?php echo $msg_editcomments6; ?>"><b><?php echo $msg_editcomments6; ?></b></a> &raquo;</td>
    </tr>
    </table>
    <form method="POST" name="MyForm" action="index.php?cmd=editcomments&amp;id=<?php echo $_GET['id']; ?>">
    <input type="hidden" name="process" value="1">
    <input type="hidden" name="timestamp" value="<?php echo $COMMENTS->postdate; ?>">
    <table cellpadding="4" cellspacing="4" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677">
    <tr>
        <td align="left"><b><?php echo $msg_editcomments; ?></b>:<br><br>
        <input class="formbox" type="text" name="name" size="30" maxlength="50" value="<?php echo cleanData($COMMENTS->name); ?>"><br><span class='error'><i>(<?php echo $msg_editcomments7; ?>)</i></span></td>
    </tr>
    <tr>
        <td align="left"><b><?php echo $msg_settings3; ?></b>:<br><br>
        <input class="formbox" type="text" name="email" size="30" maxlength="250" value="<?php echo cleanData($COMMENTS->email); ?>"><br><span class='error'><i>(<?php echo $msg_editcomments8; ?>)</i></td>
    </tr>
    <tr>
        <td align="left"><b><?php echo $msg_add2; ?></b>:<br><br><textarea style="width:98%" cols="50" rows="12" name="comments"><?php echo cleanData($COMMENTS->comments); ?></textarea></td>
    </tr>
    <tr>
        <td align="left"><input class="formbutton" type="submit" value="<?php echo $msg_editcomments2; ?>" title="<?php echo $msg_editcomments2; ?>"></td>
    </tr>
    </table>
    </form>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:3px;border:1px solid #64798E">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF" valign="middle">&laquo; <a href="index.php" title="<?php echo $msg_script15; ?>"><?php echo $msg_script15; ?></a></td>
        <td align="right" style="padding:5px;background-color:#F0F6FF" valign="top"><a href="#top"><img src="images/up.gif" alt="<?php echo $msg_script11; ?>" title="<?php echo $msg_script11; ?>" border="0"></a><br><?php echo $msg_script11; ?></td>
    </tr>
    </table>
    </td>
</tr>

