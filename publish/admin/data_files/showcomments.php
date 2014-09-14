<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - Show Comments List
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

$q_comments = mysql_query("SELECT count(*) as c_count FROM ".$database['prefix']."comments") or die(mysql_error());
$CCOUNT = mysql_fetch_object($q_comments);

$q_count = mysql_query("SELECT count(*) as blog_count FROM ".$database['prefix']."blogs") or die(mysql_error());
$COUNT = mysql_fetch_object($q_count);

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_header7); ?></b><br><br><?php echo $msg_showcomments4; ?><br><br>
        <?php echo $msg_showblogs." <b>".number_format($CCOUNT->c_count)."</b> ".$msg_showcomments; ?>.</td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td width="75%" align="left" height="17" class="menutable"><a href="index.php?cmd=showcomments&amp;orderby=title" title="<?php echo $msg_showblogs3." ".$msg_showblogs4; ?>" style="color:#FFFFFF"><?php echo strtoupper($msg_showblogs4); ?></a></td>
        <td width="10%" align="center" height="17" class="menutable"><a href="index.php?cmd=showcomments&amp;orderby=count" title="<?php echo $msg_showblogs3." ".$msg_showcomments2; ?>" style="color:#FFFFFF"><?php echo strtoupper($msg_showcomments2); ?></a></td>
        <td width="15%" align="center" height="17" class="menutable"><?php echo strtoupper($msg_showcomments3); ?></td>
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
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
       <td width="75%" align="left" height="15" valign="middle" style="padding:5px"><?php echo ((strlen($BLOGS->title)>70) ? substr(cleanData($BLOGS->title),0,70)."..." : cleanData($BLOGS->title)); ?></td>
       <td width="10%" align="center" height="15" valign="middle" style="padding:5px"><b><?php echo number_format($BLOGS->v_count); ?></b></td>
       <td width="15%" align="center" height="15" valign="middle" style="padding:5px"><a href="index.php?cmd=addcomments&amp;id=<?php echo $BLOGS->id; ?>" title="<?php echo $msg_showcomments3; ?>"><img style="padding:2px" src="images/add.gif" alt="<?php echo $msg_showcomments3; ?>" title="<?php echo $msg_showcomments3; ?>" border="1"></a></td>
    </tr>
    </table>
     <?php
     
     }
     
     if (mysql_num_rows($q_blogs)==0)
     {
       
     ?>
     <table bgcolor="#F0F6FF" cellpadding="1" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
     <tr>
         <td width="5%" align="center" height="15" valign="middle" style="padding:5px"><?php echo $msg_showblogs10; ?></td>
     </tr>
     </table>
     <?php
     
     }
     else
     {
     ?>
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

