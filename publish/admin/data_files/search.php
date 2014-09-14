<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - Search
  Added in v4.0
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

include(FOLDER_PATH.'inc/cal_array.inc.php');

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <?php
    
    // Show search results..
    if (isset($SEARCH_RESULTS))
    {
    ?>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_search8); ?></b><br><br><?php echo $msg_search9; ?></td>
    </tr>
    <tr>
        <td align="right" style="padding:5px;background-color:#F0F6FF;color:#000000"><a href="index.php?cmd=search" title="<?php echo $msg_search10; ?>"><b><?php echo $msg_search10; ?></b></a> &raquo;</td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" height="20" class="menutable" width="80%"><b><?php echo $msg_search11; ?></b> &raquo;</td>
        <td align="center" height="20" class="menutable" width="20%"><b><?php echo ($area=='blogs' ? $msg_search12 : $msg_search13); ?></b></td>
    </tr>
    </table>
    <?php
    
    while ($SEARCH = mysql_fetch_object($q_search))
    {
      if ($area=='comments')
      {
        $q_blog = mysql_query("SELECT * FROM ".$database['prefix']."blogs WHERE id = '$SEARCH->postid' LIMIT 1") or die(mysql_error());
        $BLOG = mysql_fetch_object($q_blog);
        
        $find     = array('{poster}','{date}');
        $replace  = array(cleanData($SEARCH->name),$SEARCH->rawpostdate);
      }
    ?>
    <table width="100%" cellspacing="0" cellpadding="0" style="margin-top:3px;border:1px solid #64798E">
    <tr>
      <td align="left" width="80%" style="padding:5px">- <?php echo ($area=='blogs' ? cleanData($SEARCH->title) : cleanData($BLOG->title).'<br>- '.str_replace($find,$replace,$msg_addcomments9)); ?></td>
      <td align="center" style="padding:5px"><a href="index.php?cmd=<?php echo ($area=='blogs' ? 'edit' : 'editcomments'); ?>&amp;id=<?php echo $SEARCH->id; ?>"><img src="images/edit.gif" alt="<?php echo ($area=='blogs' ? $msg_search12 : $msg_search13); ?>" title="<?php echo ($area=='blogs' ? $msg_search12 : $msg_search13); ?>" border="1" style="padding:2px"></a></td>
    </tr>
    </table>
    <?php
    }
    
    ?>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:3px;border:1px solid #64798E">
    <tr>
        <td align="right" style="padding:5px;background-color:#F0F6FF;color:#000000">
        <?php
        echo page_numbers($COUNT->s_count,$SETTINGS->total,$page);
        ?>
        </td>
    </tr>
    </table>
    <?php
    
    }
    else
    {
    ?>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_header14); ?></b><br><br><?php echo $msg_search; ?></td>
    </tr>
    </table>
    <?php
    if (isset($NO_RESULTS))
    {
    ?>
    <table width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #64798E;margin-top:3px">
    <tr>
       <td align="left" style="padding:5px;color:#64798E"><?php echo $msg_search7; ?></td>
    </tr>
    </table>
    <?php
    }
    ?>
    <form method="GET" action="index.php">
    <input type="hidden" name="cmd" value="search">
    <input type="hidden" name="search" value="1">
    <table cellpadding="4" cellspacing="4" width="100%" align="center" style="border:1px solid #164677;margin-top:3px">
    <tr>
        <td class="headbox" align="left" width="30%"><?php echo $msg_search4; ?>:</td>
        <td align="left" width="70%"><select name="area">
        <option<?php echo (isset($area) && $area=='blogs' ? " selected " : " "); ?>value="blogs"><?php echo $msg_search5; ?></option>
        <option<?php echo (isset($area) && $area=='comments' ? " selected " : " "); ?>value="comments"><?php echo $msg_search6; ?></option>
        </select></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_search2; ?>:</td>
        <td align="left"><input class="formbox" type="text" name="keywords" size="30" maxlength="50" value="<?php echo (isset($keywords) ? cleanData($keywords) : ''); ?>"></td>
    </tr>
    <tr>
        <td class="headbox" align="left"><?php echo $msg_search3; ?>:</td>
        <td valign="top" align="left"><select name="from_day">
        <option selected value="0"> - </option>
        <?php

        foreach ($days as $s_days)
        {
          echo '<option'.(isset($from_day) && $from_day==$s_days ? ' selected ' : ' ').'value="'.$s_days.'">'.$s_days.'</option>'."\n";
        }

        ?>
        </select>
        <select name="from_month">
        <option selected value="0"> - </option>
        <?php

        foreach ($months as $s_months => $s_months_value)
        {
          echo '<option'.(isset($from_month) && $from_month==$s_months ? ' selected ' : ' ').'value="'.$s_months.'">'.$s_months_value.'</option>'."\n";
        }
        
        ?>
        </select>
        <select name="from_year">
        <option selected value="0"> - </option>
        <?php

        foreach ($years as $s_years)
        {
          echo '<option'.(isset($from_year) && $from_year==$s_years ? ' selected ' : ' ').'value="'.$s_years.'">'.$s_years.'</option>'."\n";
        }

        ?>
        </select>
        </td>
    </tr>
    <tr>
        <td align="left">&nbsp;</td>
        <td valign="top" align="left"><select name="to_day">
        <option selected value="0"> - </option>
        <?php

        foreach ($days as $s_days)
        {
          echo '<option'.(isset($to_day) && $to_day==$s_days ? ' selected ' : ' ').'value="'.$s_days.'">'.$s_days.'</option>'."\n";
        }

        ?>
        </select>
        <select name="to_month">
        <option selected value="0"> - </option>
        <?php

        foreach ($months as $s_months => $s_months_value)
        {
          echo '<option'.(isset($to_month) && $to_month==$s_months ? ' selected ' : ' ').'value="'.$s_months.'">'.$s_months_value.'</option>'."\n";
        }
        
        ?>
        </select>
        <select name="to_year">
        <option selected value="0"> - </option>
        <?php

        foreach ($years as $s_years)
        {
          echo '<option'.(isset($to_year) && $to_year==$s_years ? ' selected ' : ' ').'value="'.$s_years.'">'.$s_years.'</option>'."\n";
        }

        ?>
        </select>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="left"><br><input class="formbutton" type="submit" value="<?php echo $msg_header14; ?>" title="<?php echo $msg_header14; ?>"></td>
    </tr>
    </table>
    </form>
    <?php
    }
    ?>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:3px;border:1px solid #64798E">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF" valign="middle">&laquo; <a href="index.php" title="<?php echo $msg_script15; ?>"><?php echo $msg_script15; ?></a></td>
        <td align="right" style="padding:5px;background-color:#F0F6FF" valign="top"><a href="#top"><img src="images/up.gif" alt="<?php echo $msg_script11; ?>" title="<?php echo $msg_script11; ?>" border="0"></a><br><?php echo $msg_script11; ?></td>
    </tr>
    </table>
    </td>
</tr>

