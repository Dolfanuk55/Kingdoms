<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Favourites - Add/Edit Fave Sites
  Added in v4.0
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

// Only load data if in edit mode..
if (isset($_GET['edit']))
{
  $EDIT = mysql_fetch_object(mysql_query("SELECT * FROM ".$database['prefix']."favourites
                                          WHERE id = '".$_GET['edit']."' 
                                          LIMIT 1
                                          ")) or die(mysql_error());
}

// Get favourites..
$q_faves = mysql_query("SELECT * FROM ".$database['prefix']."favourites ORDER BY name") or die(mysql_error());

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_header15); ?></b><br><br><?php echo $msg_favourites; ?></td>
    </tr>
    </table>
    <form method="POST" name="MyForm" action="index.php?cmd=favourites">
    <input type="hidden" name="<?php echo (isset($EDIT) ? 'update' : 'process'); ?>" value="1">
    <?php echo (isset($EDIT) ? '<input type="hidden" name="id" value="'.$_GET['edit'].'">'."\n" : ''); ?>
    <table cellpadding="4" cellspacing="4" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677">
    <tr>
        <td align="left"><b><?php echo $msg_favourites2; ?></b>:<br><br><input class="formbox" type="text" name="name" maxlength="200" size="30" value="<?php echo (isset($EDIT) ? cleanData($EDIT->name) : ''); ?>"> <i>(<?php echo $msg_favourites7; ?>)</i></td>
    </tr>
    <tr>
        <td align="left"><b><?php echo $msg_favourites3; ?></b>:<br><br><input class="formbox" type="text" name="url" size="30" value="<?php echo (isset($EDIT) ? cleanData($EDIT->url) : 'http://'); ?>"></td>
    </tr>
    <tr>
        <td align="left"><input class="formbutton" type="submit" value="<?php echo (isset($EDIT) ? $msg_favourites5 : $msg_favourites4); ?>" title="<?php echo (isset($EDIT) ? $msg_favourites5 : $msg_favourites4); ?>"></td>
    </tr>
    </table>
    </form>
    <form method="POST" name="MyForm" action="index.php?cmd=favourites" onsubmit="return submit_confirm('<?php echo $msg_javascript; ?>');">
    <input type="hidden" name="remove" value="1">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:3px;border:1px solid #000000">
    <tr>
        <td height="20" class="menutable">&raquo; <?php echo strtoupper($msg_favourites6); ?> (<?php echo mysql_num_rows($q_faves); ?>):</td>
    </tr>
    </table>
    <?php
    
    // Display faves..
    if (mysql_num_rows($q_faves)>0)
    {
      while ($FAVES = mysql_fetch_object($q_faves))
      {
      ?>
      <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #64798E">
      <tr>
         <td width="80%" align="left" height="15" valign="middle" style="padding-left:5px">
         <b><?php echo cleanData($FAVES->name); ?></b><br>
         <a href="<?php echo $FAVES->url; ?>" target="_blank" title="<?php echo cleanData($FAVES->name); ?>"><?php echo $FAVES->url; ?></a></td>
         <td width="15%" align="center" height="15" valign="middle" style="padding:5px 3px 5px 0"><a href="index.php?cmd=favourites&amp;edit=<?php echo $FAVES->id; ?>" title="<?php echo $msg_showblogs8; ?>"><img style="padding:2px" src="images/edit.gif" alt="<?php echo $msg_showblogs8; ?>" title="<?php echo $msg_showblogs8; ?>" border="1"></a></td>
         <td width="5%" align="center" height="15" valign="middle"><input type="checkbox" name="faveid[]" value="<?php echo $FAVES->id; ?>"></td>
      </tr>
      </table>
      <?php
      }
      ?>
      <p align="right"><input class="formbutton" type="submit" value="<?php echo $msg_favourites9; ?>" title="<?php echo $msg_favourites9; ?>"></p>
      <?php
    }
    else
    {
    ?>
    <table bgcolor="#F0F6FF" cellpadding="1" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="center" height="15" valign="middle" style="padding:5px"><?php echo $msg_favourites8; ?></td>
    </tr>
    </table>
    <?php
    }
    
    ?>
    </form>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:3px;border:1px solid #64798E">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF" valign="middle">&laquo; <a href="index.php" title="<?php echo $msg_script15; ?>"><?php echo $msg_script15; ?></a></td>
        <td align="right" style="padding:5px;background-color:#F0F6FF" valign="top"><a href="#top"><img src="images/up.gif" alt="<?php echo $msg_script11; ?>" title="<?php echo $msg_script11; ?>" border="0"></a><br><?php echo $msg_script11; ?></td>
    </tr>
    </table>
    </td>
</tr>

