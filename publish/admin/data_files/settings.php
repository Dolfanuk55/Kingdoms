<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - Settings
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

// Explode bookmark data..
if ($SETTINGS->bookmarks)
{
  $bmarks = explode(",",$SETTINGS->bookmarks);
}

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_settings); ?></b><br><br><?php echo $msg_settings20; ?></td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677">
    <tr>
        <td align="left" height="20" class="menutable"><b><?php echo strtoupper($msg_settings27); ?></b> &raquo;</td>
    </tr>
    </table>
    <form method="POST" action="index.php?cmd=settings" enctype="multipart/form-data">
    <input type="hidden" name="process" value="1">
    <table cellpadding="4" cellspacing="4" width="100%" align="center" style="border:1px solid #164677;margin-top:3px">
    <tr>
        <td class="headbox" align="left" width="30%"><?php echo $msg_settings6; ?>:</td>
        <td align="left" width="70%"><select name="language">
        <?php

        $showlang = opendir(RELATIVE_PATH.'lang/');

        while ($read = readdir($showlang))
        {
  	      if ($read != "." && $read != ".." && $read != "index.html")
          {
        	  echo '<option'.($read == $SETTINGS->language ? ' selected' : '').'>'.$read.'</option>'."\n";
          }
        }

        closedir($showlang);
        
        ?>
        </select>
        </td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings32; ?>:</td>
        <td align="left"><select name="theme">
        <?php

        $showthemes = opendir(RELATIVE_PATH.'themes/');

        while ($read = readdir($showthemes))
        {
  	      if ($read != "." && $read != ".." && $read != "index.html" && $read != 'email')
          {
        	  echo '<option value="'.$read.'"'.($read == $SETTINGS->theme ? ' selected' : '').'>'.ucfirst($read).'</option>'."\n";
          }
        }

        closedir($showthemes);
        
        ?>
        </select> [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript8; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings2; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="name" size="30" maxlength="50" value="<?php echo cleanData($SETTINGS->name); ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings3; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="email" size="30" maxlength="60" value="<?php echo cleanData($SETTINGS->email); ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings4; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="website" maxlength="100" size="30" value="<?php echo cleanData($SETTINGS->website); ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings16; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="blogname" size="30" maxlength="200" value="<?php echo cleanData($SETTINGS->blogname); ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings31; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="w_path" size="30" maxlength="250" value="<?php echo cleanData($SETTINGS->w_path); ?>"> [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript9; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings5; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="dateformat" size="30" maxlength="30" value="<?php echo $SETTINGS->dateformat; ?>" style="width:25%"> [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript10; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings30; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="timeOffset" size="30" maxlength="4" value="<?php echo $SETTINGS->timeOffset; ?>" style="width:10%"> [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript11; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings9; ?>:</td>
        <td align="left">
        <?php
        
        echo date($SETTINGS->dateformat,strtotime("".$SETTINGS->timeOffset." hours"));

        ?>
        </td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings7; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="total" size="10" maxlength="3" style="width:10%" value="<?php echo $SETTINGS->total; ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings42; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="totalArchives" size="30" maxlength="3" value="<?php echo $SETTINGS->totalArchives; ?>" style="width:10%"> [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript18; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings18; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="hometotal" size="10" style="width:10%" maxlength="3" value="<?php echo $SETTINGS->hometotal; ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings49; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="rssfeeds" size="10" style="width:10%" maxlength="3" value="<?php echo $SETTINGS->rssfeeds; ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings14; ?>:</td>
        <td align="left"><?php echo $msg_script8; ?> <input type="radio" name="enableCaptcha" value="1"<?php echo ($SETTINGS->enableCaptcha ? " checked " : " "); ?>> <?php echo $msg_script9; ?> <input type="radio" name="enableCaptcha" value="0"<?php echo (!$SETTINGS->enableCaptcha ? " checked " : " "); ?>>
        [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript13; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings13; ?>:</td>
        <td align="left"><?php echo $msg_script8; ?> <input type="radio" name="modR" value="1"<?php echo ($SETTINGS->modR ? " checked " : " "); ?>> <?php echo $msg_script9; ?> <input type="radio" name="modR" value="0"<?php echo (!$SETTINGS->modR ? " checked " : " "); ?>>
        [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript14; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings52; ?>:</td>
        <td align="left"><?php echo $msg_script8; ?> <input type="radio" name="parseLinks" value="1"<?php echo ($SETTINGS->parseLinks ? " checked " : " "); ?>> <?php echo $msg_script9; ?> <input type="radio" name="parseLinks" value="0"<?php echo (!$SETTINGS->parseLinks ? " checked " : " "); ?>>
        [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript22; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings43; ?>:</td>
        <td align="left"><?php echo $msg_settings44; ?> <input type="radio" name="commentsOrder" value="asc"<?php echo ($SETTINGS->commentsOrder=='asc' ? " checked " : " "); ?>> <?php echo $msg_settings45; ?> <input type="radio" name="commentsOrder" value="des"<?php echo ($SETTINGS->commentsOrder=='des' ? " checked " : " "); ?>>
        [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript19; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings50; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="meta_k" size="30" value="<?php echo cleanData($SETTINGS->meta_k); ?>"> [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript20; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings51; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="meta_d" size="30" value="<?php echo cleanData($SETTINGS->meta_d); ?>"> [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript21; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings53; ?>: [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript23; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
        <td align="left">
        <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td width="25%" align="left" valign="top"><input type="checkbox" name="bookmark[]" value="1"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('1',$bmarks) ? ' checked' : ''); ?>> <a href="http://del.icio.us" title="Del.icio.us" target="_blank"><u>Del.icio.us</u></a></td>
          <td width="25%" align="left" valign="top"><input type="checkbox" name="bookmark[]" value="2"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('2',$bmarks) ? ' checked' : ''); ?>> <a href="http://digg.com" title="Digg" target="_blank"><u>Digg</u></a></td>
          <td width="25%" align="left" valign="top"><input type="checkbox" name="bookmark[]" value="3"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('3',$bmarks) ? ' checked' : ''); ?>> <a href="http://www.spurl.net" title="Spurl" target="_blank"><u>Spurl</u></a></td>
          <td width="25%" align="left" valign="top"><input type="checkbox" name="bookmark[]" value="4"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('4',$bmarks) ? ' checked' : ''); ?>> <a href="http://wists.com" title="Wists" target="_blank"><u>Wists</u></a></td>
        </tr>
        <tr>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="5"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('5',$bmarks) ? ' checked' : ''); ?>> <a href="http://www.simpy.com" title="Simpy" target="_blank"><u>Simpy</u></a></td>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="6"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('6',$bmarks) ? ' checked' : ''); ?>> <a href="http://myweb2.search.yahoo.com" title="My Web" target="_blank"><u>My Web</u></a></td>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="7"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('7',$bmarks) ? ' checked' : ''); ?>> <a href="http://www.newsvine.com" title="Newsvine" target="_blank"><u>Newsvine</u></a></td>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="8"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('8',$bmarks) ? ' checked' : ''); ?>> <a href="http://www.blinklist.com" title="Blinklist" target="_blank"><u>Blinklist</u></a></td>
        </tr>
        <tr>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="9"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('9',$bmarks) ? ' checked' : ''); ?>> <a href="http://www.furl.net" title="Furl" target="_blank"><u>Furl</u></a></td>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="10"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('10',$bmarks) ? ' checked' : ''); ?>> <a href="http://reddit.com" title="Reddit" target="_blank"><u>Reddit</u></a></td>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="11"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('11',$bmarks) ? ' checked' : ''); ?>> <a href="http://blogmarks.net" title="Blogmarks" target="_blank"><u>Blogmarks</u></a></td>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="12"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('12',$bmarks) ? ' checked' : ''); ?>> <a href="http://smarking.com" title="Smarking" target="_blank"><u>Smarking</u></a></td>
        </tr>
        <tr>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="13"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('13',$bmarks) ? ' checked' : ''); ?>> <a href="http://www.google.com/bookmarks/" title="Google" target="_blank"><u>Google</u></a></td>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="14"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('14',$bmarks) ? ' checked' : ''); ?>> <a href="http://slashdot.org" title="Slashdot" target="_blank"><u>Slashdot</u></a></td>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="15"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('15',$bmarks) ? ' checked' : ''); ?>> <a href="http://www.netvouz.com" title="Netvouz" target="_blank"><u>Netvouz</u></a></td>
          <td align="left" valign="top"><input type="checkbox" name="bookmark[]" value="16"<?php echo (isset($bmarks) & !empty($bmarks) && in_array('16',$bmarks) ? ' checked' : ''); ?>> <a href="http://www.shadows.com" title="Shadows" target="_blank"><u>Shadows</u></a></td>
        </tr>
        </table>
        </td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" height="20" class="menutable">&nbsp;<b><?php echo strtoupper($msg_settings28); ?></b> &raquo;</td>
    </tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:3px;border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000"><?php echo $msg_settings29; ?></td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="0" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="center" style="padding-top:5px;padding-bottom:5px"><textarea name="profile" rows="10" cols="100" style="width:97%"><?php echo htmlspecialchars(stripslashes($SETTINGS->profile)); ?></textarea></td>
    </tr>
    </table>
    <table cellpadding="4" cellspacing="4" width="100%" align="center" style="border:1px solid #164677;margin-top:3px">
    <tr>
        <td class="headbox" align="left" width="30%" valign="middle"><?php echo $msg_settings33; ?>:<br><br><span style="font-weight:normal"><?php echo $msg_settings35; ?><br><br>[ <a href="../index.php?cmd=profile" title="<?php echo $msg_settings34; ?>" target="_blank"><b><?php echo $msg_settings34; ?></b></a> ]</span></td>
        <td align="left" width="55%" valign="middle"><input type="file" name="pfile" size="30"><br><br><?php echo $msg_settings46; ?><br><br>
        <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" width="15%" style="padding:5px"><b><?php echo $msg_settings47; ?></b>:</td>
          <td align="left" width="35%" style="padding:5px"><input class="formbox" type="text" name="imageWidth" size="10" maxlength="3" style="width:35%" value="<?php echo $SETTINGS->imageWidth; ?>"></td>
          <td align="left" width="15%" style="padding:5px"><b><?php echo $msg_settings48; ?></b>:</td>
          <td align="left" width="35%" style="padding:5px"><input class="formbox" type="text" name="imageHeight" size="10" maxlength="3" style="width:35%" value="<?php echo $SETTINGS->imageHeight; ?>"></td>
        </tr>
        </table>
        </td>
        <td align="right" width="15%" valign="middle"><?php echo ($SETTINGS->profileImage ? '<a href="#" onclick="delete_confirm(\''.$msg_javascript15.'\',\'index.php?cmd=settings&amp;clear=1\');return false"><img src="../uploads/'.$SETTINGS->profileImage.'" height="120" width="90" alt="'.$msg_settings33.'" title="'.$msg_settings33.'" border="1" style="padding:2px"></a>' : '<img height="120" width="90" src="images/default_profile.gif" alt="'.$msg_settings33.'" title="'.$msg_settings33.'" border="1" style="padding:2px">'); ?></td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" height="20" class="menutable">&nbsp;<b><?php echo strtoupper($msg_settings36); ?></b> &raquo;</td>
    </tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:3px;border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000"><?php echo $msg_settings37; ?></td>
    </tr>
    </table>
    <table cellpadding="4" cellspacing="4" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td class="headbox" align="left" width="30%"><?php echo $msg_settings38; ?>:<br><br><span style="font-weight:normal"><?php echo $msg_settings40; ?></span></td>
        <td align="left" width="70%"><textarea name="adsense" rows="4" cols="100" style="width:97%"><?php echo htmlspecialchars(stripslashes($SETTINGS->adsense)); ?></textarea></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings39; ?>:<br><br><span style="font-weight:normal"><?php echo $msg_settings41; ?></span></td>
        <td align="left"><textarea name="snap" rows="4" cols="100" style="width:97%"><?php echo htmlspecialchars(stripslashes($SETTINGS->snap)); ?></textarea></td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" height="20" class="menutable">&nbsp;<b><?php echo strtoupper($msg_settings21); ?></b> &raquo;</td>
    </tr>
    </table>
    <table cellpadding="4" cellspacing="4" width="100%" align="center" style="border:1px solid #164677;margin-top:3px">
    <tr>
        <td class="headbox" width="30%" align="left"><?php echo $msg_settings22; ?>:</td>
        <td width="70%" align="left"><select name="smtp">
        <option<?php echo (!$SETTINGS->smtp ? " selected " : " "); ?>value="0"><?php echo $msg_script9; ?></option>
        <option<?php echo ($SETTINGS->smtp ? " selected " : " "); ?>value="1"><?php echo $msg_script8; ?></option>
        </select> [<a href="javascript:void(0);" onclick="return overlib('<?php echo $msg_javascript12; ?>', STICKY, CAPTION,'<?php echo $msg_javascript6; ?>', CENTER);" onmouseout="nd();"><b>?</b></a>]</td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings23; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="smtp_host" size="10" value="<?php echo $SETTINGS->smtp_host; ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings24; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="smtp_user" size="10" value="<?php echo $SETTINGS->smtp_user; ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings25; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="smtp_pass" size="10" value="<?php echo $SETTINGS->smtp_pass; ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_settings26; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="smtp_port" style="width:10%" size="10" value="<?php echo $SETTINGS->smtp_port; ?>"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="left"><br><input class="formbutton" type="submit" value="<?php echo $msg_settings8; ?>" title="<?php echo $msg_settings8; ?>"></td>
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