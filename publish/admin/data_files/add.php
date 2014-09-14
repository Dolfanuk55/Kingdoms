<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - Add New Blog
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

include(FOLDER_PATH.'spaw/spaw.inc.php');

// This is for the file upload options for Spaw and overwrites the default..
$spawSiteDir = array(
     array(
         'dir'     => SPAW_PATH.'uploads/flash/',
         'caption' => 'Flash movies',
         'params'  => array(
                            'allowed_filetypes' => array('flash')
                           )
          ),
     array(
         'dir'     => SPAW_PATH.'uploads/images/',
         'caption' => 'Images',
         'params'  => array(
                            'default_dir' => true,
                            'allowed_filetypes' => array('images')
                           )
          ),
);

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_header5); ?></b><br><br><?php echo $msg_add8; ?></td>
    </tr>
    </table>
    <form method="POST" name="MyForm" action="index.php?cmd=add">
    <input type="hidden" name="process" value="1">
    <table cellpadding="4" cellspacing="4" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677">
    <tr>
        <td align="left" style="padding:3px;border-bottom:1px dashed #164677">
        <?php
        
        // Only show tutorial link if WYSIWYG is enabled..
        if ($SETTINGS->wysiwyg)
        {
        ?>
        <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" width="8%"><img src="images/tutorials.gif" style="padding:2px;background-color:#F0F6FF;border:1px solid #164677" alt="<?php echo $msg_add11; ?>" title="<?php echo $msg_add11; ?>"></td>
          <td align="left"><a href="http://www.maianscriptworld.co.uk/index.php?p=wysiwyg" title="<?php echo $msg_add11; ?>"><b><?php echo $msg_add11; ?></b></a></td>
        </tr>
        </table>
        <?php
        }
        else
        {
          echo '&nbsp;';
        }
        
        ?>
        </td>
        <td align="right" style="padding:3px;border-bottom:1px dashed #164677">&#8226; <b><?php echo ($SETTINGS->wysiwyg ? '<a href="#" onclick="delete_confirm(\''.$msg_javascript16.'\',\'index.php?cmd=add&amp;enable=0\');return false" title="'.$msg_add10.'">'.$msg_add10.'</a>' : '<a href="#" onclick="delete_confirm(\''.$msg_javascript17.'\',\'index.php?cmd=add&amp;enable=1\');return false" title="'.$msg_add9.'">'.$msg_add9.'</a>'); ?></b> &#8226;</td>
    </tr>
    <tr>
        <td align="left" colspan="2"><b><?php echo $msg_add; ?></b>:<br><br><input class="formbox" type="text" name="title" size="30" value="<?php echo (isset($title) ? cleanData($title) : ''); ?>"><?php echo (isset($t_error) ? '<br><span class="error">'.$msg_add5.'</span>' : ''); ?></td>
    </tr>
    <tr>
        <td align="left" colspan="2"><b><?php echo $msg_add2; ?></b>:<br><br>
        <?php
        if ($SETTINGS->wysiwyg)
        {
          // Display WYSIWYG Editor..
          $SPAW = new SpawEditor('comments',(isset($comments) ? cleanData($comments) : ''));
          $SPAW->setConfigItem("PG_SPAWFM_DIRECTORIES",$spawSiteDir,SPAW_CFG_TRANSFER_SECURE);
          $SPAW->show();
          
          if (isset($c_error))
          {
            echo '<span class="error">'.$msg_add6.'</span><br><br>';
          }
        }
        else
        {
        ?>
        <textarea rows="20" name="comments" style="width:98%"><?php echo (isset($comments) ? cleanData($comments) : ''); ?></textarea><?php echo (isset($c_error) ? '<br><span class="error">'.$msg_add6.'</span>' : ''); ?><br>
        <?php
        }
        ?>
        <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" width="49%" style="padding:3px">
          <table width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" width="5%" style="background-color:#F0F6FF;border: 1px solid #164677"><input type="checkbox" name="allow" value="1"<?php echo (isset($allow) && $allow ? ' checked' : ''); ?>></td>
            <td align="left" width="95%" style="padding-left:10px"><?php echo $msg_add3; ?></td>
          </tr>
          </table>
          </td>
          <td width="1%">&nbsp;</td>
          <td align="left" width="50%" style="padding:3px">
          <table width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" width="5%" style="background-color:#F0F6FF;border: 1px solid #164677"><input type="checkbox" name="notify" value="1"<?php echo (isset($notify) && $notify ? ' checked' : ''); ?>></td>
            <td align="left" width="95%" style="padding-left:10px"><?php echo $msg_add4; ?></td>
          </tr>
          </table>
          </td>
        </tr>
        </table>
        </td>
    </tr>
    <tr>
        <td align="left" colspan="2"><input class="formbutton" type="submit" value="<?php echo $msg_header5; ?>" title="<?php echo $msg_header5; ?>"></td>
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

