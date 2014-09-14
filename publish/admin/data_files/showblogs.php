<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - Show Blogs List
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

$q_count = mysql_query("SELECT count(*) as blog_count FROM ".$database['prefix']."blogs") or die(mysql_error());
$COUNT = mysql_fetch_object($q_count);

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_header6); ?></b><br><br><?php echo $msg_showblogs7; ?><br><br>
        <?php echo $msg_showblogs." <b>".number_format($COUNT->blog_count)."</b> ".$msg_showblogs2; ?>.</td>
    </tr>
    </table>
    <form method="POST" name="MyForm" action="index.php?cmd=showblogs" onsubmit="return submit_confirm('<?php echo $msg_javascript; ?>');">
    <input type="hidden" name="process" value="1">
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td width="50%" align="left" height="12" class="menutable"><a href="index.php?cmd=showblogs&amp;orderby=title" title="<?php echo $msg_showblogs3." ".$msg_showblogs4; ?>" style="color:#FFFFFF;background-color:#395D81"><?php echo strtoupper($msg_showblogs4); ?></a></td>
        <td width="30%" align="left" height="12" class="menutable"><a href="index.php?cmd=showblogs&amp;orderby=date" title="<?php echo $msg_showblogs3." ".$msg_showblogs6; ?>" style="color:#FFFFFF;background-color:#395D81"><?php echo strtoupper($msg_showblogs6); ?></a></td>
        <td width="15%" align="center" height="12" class="menutable"><?php echo strtoupper($msg_showblogs8); ?></td>
        <td width="5%" align="center" height="12" class="menutable"><input type="checkbox" name="log" onclick="selectAll();"></td>
    </tr>
    </table>
    <?php

    $q_blogs = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                            $sql_order 
                            LIMIT $limitvalue, $SETTINGS->total
                            ") or die(mysql_error());
    
    while ($BLOGS = mysql_fetch_object($q_blogs))
    {
      
    ?>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #64798E">
    <tr>
        <td width="50%" align="left" height="15" valign="middle" style="padding-left:5px"><?php echo ((strlen($BLOGS->title)>25) ? substr(cleanData($BLOGS->title),0,25)."..." : cleanData($BLOGS->title)); ?></td>
        <td width="30%" align="left" height="15" valign="middle"><?php echo $BLOGS->rawpostdate; ?></td>
        <td width="15%" align="center" height="15" valign="middle" style="padding:5px 3px 5px 0"><a href="index.php?cmd=edit&amp;id=<?php echo $BLOGS->id; ?>" title="<?php echo $msg_showblogs8; ?>"><img style="padding:2px" src="images/edit.gif" alt="<?php echo $msg_showblogs8; ?>" title="<?php echo $msg_showblogs8; ?>" border="1"></a></td>
        <td width="5%" align="center" height="15" valign="middle"><input type="checkbox" name="blogid[]" value="<?php echo $BLOGS->id; ?>"></td>
    </tr>
    </table>
    <?php
     
    }
     
    if (mysql_num_rows($q_blogs)==0)
    {
       
    ?>
    <table cellpadding="1" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td width="5%" align="center" height="15" valign="middle" style="background-color:#FFFFFF;padding:5px"><?php echo $msg_showblogs10; ?></td>
    </tr>
    </table>
    <?php
     
    }
    else
    {

    ?>
    <p align="right"><input class="formbutton" type="submit" value="<?php echo $msg_showblogs11; ?>" title="<?php echo $msg_showblogs11; ?>"></p>
    </form>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:3px;border:1px solid #64798E">
    <tr>
        <td align="right" style="padding:5px;background-color:#F0F6FF;color:#000000">
        <?php
        echo page_numbers($COUNT->blog_count,$SETTINGS->total,$page);
        ?>
        </td>
    </tr>
    </table>
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

