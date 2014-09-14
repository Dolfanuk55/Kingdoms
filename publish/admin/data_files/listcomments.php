<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - List Blogs/Comments
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

$q_count = mysql_query("SELECT count(*) as blog_count FROM ".$database['prefix']."blogs") or die(mysql_error());
$COUNT = mysql_fetch_object($q_count);

?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_header8); ?></b><br><br><?php echo $msg_listcomments; ?></td>
    </tr>
    </table>
    <form method="POST" action="index.php?cmd=listcomments" onsubmit="return submit_confirm('<?php echo $msg_javascript; ?>');">
    <input type="hidden" name="process" value="1">
    <?php

    //Get entries
    
    $count = 0;

    $q_all = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                          ORDER BY id DESC 
                          LIMIT $limitvalue, $SETTINGS->total
                          ") or die(mysql_error());
    
    while ($blogs = mysql_fetch_assoc($q_all))
    {

      $comcount = mysql_query("SELECT * FROM ".$database['prefix']."comments WHERE postid = '".$blogs['id']."'") or die(mysql_error());

    ?>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" height="20" class="menutable" width="80%"><b><?php echo strtoupper(cleanData($blogs['title'])); ?></b> &raquo;</td>
        <td align="center" height="20" class="menutable" width="10%"><?php echo strtoupper($msg_showblogs8); ?></td>
        <td align="center" height="20" class="menutable" width="10%"><b><?php echo number_format(mysql_num_rows($comcount)); ?></b></td>
    </tr>
    </table>
    <?php

    if (mysql_num_rows($comcount)==0)
    {

    ?>
    <table bgcolor="#F0F6FF" cellpadding="1" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="center" height="15" valign="middle" style="padding:5px"><?php echo $msg_addcomments3; ?></td>
    </tr>
    </table>
     <?php
     
     }
     else
     {
       $count++;

       ?>
       <table bgcolor="#F0F6FF" cellpadding="1" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
       <tr>
        <td align="center" height="15" valign="middle" style="padding:5px"><?php echo str_replace("{count}", number_format(mysql_num_rows($comcount)),$msg_listcomments5); ?> [<a href="#" onclick="toggle_box('<?php echo $blogs['id']; ?>');return false" title="<?php echo $msg_addcomments6; ?>"><b><?php echo $msg_addcomments6; ?></b></a>]</td>
       </tr>
       </table>
       <div id="<?php echo $blogs['id']; ?>" style="display:none">
       <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px">
       <?php

       while ($comments = mysql_fetch_array($comcount))
       {
         $find     = array('{poster}','{date}');
         $replace  = array('<b>'.cleanData($comments['name']).'</b>',$comments['rawpostdate']);
       ?>
       <tr>
           <td align="left" width="80%" valign="middle"><img src="images/tree.gif" border="0"><?php echo str_replace($find,$replace,$msg_addcomments9); ?></td>
           <td align="center" width="10%" valign="middle"><a href="index.php?cmd=editcomments&amp;id=<?php echo $comments['id']; ?>" title="<?php echo $msg_showblogs8; ?>"><img src="images/edit.gif" alt="<?php echo $msg_showblogs8; ?>" title="<?php echo $msg_showblogs8; ?>" border="1" style="padding:2px"></a></td>
           <td align="center" valign="middle" width="10%"><input type="checkbox" name="commentid[]" value="<?php echo $comments['id']; ?>##<?php echo $blogs['postdate']; ?>##<?php echo $blogs['id']; ?>"></td>
       </tr>
       <?php

       } //end while
       
       ?>
       </table>
       </div>
       <?php

     } //end if
     
    }  //end while
     
     if (mysql_num_rows($q_all)==0)
     {

     ?>
     <table bgcolor="#F0F6FF" cellpadding="1" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
     <tr>
         <td align="center" height="15" valign="middle" style="padding:5px"><?php echo $msg_showblogs10; ?></td>
     </tr>
     </table>
     <?php
     
     }
     
     if ($count>0)
     {
     
     ?>
     <p align="right"><input class="formbutton" type="submit" value="<?php echo $msg_listcomments2; ?>" title="<?php echo $msg_listcomments2; ?>"></p>
     <?php
     }
     
     ?>
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
    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top:3px;border:1px solid #64798E">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF" valign="middle">&laquo; <a href="index.php" title="<?php echo $msg_script15; ?>"><?php echo $msg_script15; ?></a></td>
        <td align="right" style="padding:5px;background-color:#F0F6FF" valign="top"><a href="#top"><img src="images/up.gif" alt="<?php echo $msg_script11; ?>" title="<?php echo $msg_script11; ?>" border="0"></a><br><?php echo $msg_script11; ?></td>
    </tr>
    </table>
    </td>
</tr>

