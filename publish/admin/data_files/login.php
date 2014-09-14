<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin Login
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_login); ?></b><br><br><?php echo $msg_login10; ?></td>
    </tr>
    </table>
    <form method="POST" name="MWform" action="index.php?cmd=login">
    <input type="hidden" name="process" value="1">
    <table cellpadding="4" cellspacing="4" width="100%" align="center" style="margin-top:3px;border:1px solid #164677">
    <tr>
        <td class="headbox" width="30%" align="left"><?php echo $msg_login2; ?>:</td>
        <td width="70%" align="left"><input class="formbox" type="text" name="username" size="30"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_login3; ?>:</td>
        <td align="left"><input class="formbox" type="password" name="password" size="30"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_login4; ?>:</td>
        <td valign="middle" align="left"><input type="checkbox" name="cookie" size="30" value="1"> [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript7; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="left"><br><input class="formbutton" type="submit" value="<?php echo $msg_login5; ?>" title="<?php echo $msg_login5; ?>"></td>
    </tr>
    </table>
    </form>
    </td>
</tr>

