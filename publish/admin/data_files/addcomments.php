<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - Add New Blog Comments
----------------------------------------------*/

if(!defined('INCLUDE_FILES')) { include('index.html'); exit; }

$q_count = mysql_query("SELECT count(*) as blog_count FROM ".$database['prefix']."comments 
                        WHERE postid = '".(int)$_GET['id']."' 
                        LIMIT 1
                        ") or die(mysql_error());
$COUNT = mysql_fetch_object($q_count);

$q_blog = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                       WHERE id = '".(int)$_GET['id']."' LIMIT 1
                       ") or die(mysql_error());
$BLOG = mysql_fetch_object($q_blog);


?>
<tr>
    <td class="tdmain" style="border-top:1px solid #164677"<?php echo (ENABLE_DD_MENU ? ' colspan="2"' : ''); ?>>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border:1px solid #000000">
    <tr>
        <td align="left" style="padding:5px;background-color:#F0F6FF;color:#000000">&raquo; <b><?php echo strtoupper($msg_header7); ?></b><br><br><?php echo $msg_addcomments7; ?></td>
    </tr>
    <tr>
        <td align="right" style="padding:5px;background-color:#F0F6FF;color:#000000"><a href="index.php?cmd=showcomments" title="<?php echo $msg_edit3; ?>"><b><?php echo $msg_edit3; ?></b></a> &raquo;</td>
    </tr>
    </table>
    <form method="POST" name="MyForm" action="index.php?cmd=addcomments&amp;id=<?php echo $_GET['id']; ?>">
    <input type="hidden" name="process" value="1">
    <input type="hidden" name="name" value="<?php echo cleanData($SETTINGS->name); ?>">
    <input type="hidden" name="email" value="<?php echo $SETTINGS->email; ?>">
    <input type="hidden" name="timestamp" value="<?php echo $BLOG->postdate; ?>">
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" height="17" class="menutable"><b><?php echo strtoupper($msg_addcomments4); ?></b> &raquo;</b> <?php echo cleanData($BLOG->title); ?></td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="0" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" colspan="2" height="17" style="padding:5px;border-bottom:1px solid #164677"><?php echo autoParseLinks(cleanData($BLOG->comments)); ?></td>
    </tr>
    <tr>
        <td align="left" class="displaytd"><i><?php echo $msg_addcomments8; ?>: <?php echo $BLOG->rawpostdate; ?></i></td>
        <td align="right" class="displaytd"><a href="../index.php?cmd=blog&amp;post=<?php echo $BLOG->id; ?>" title="<?php echo $msg_addcomments6; ?>" target="_blank"><img src="images/view.gif" alt="<?php echo $msg_addcomments6; ?>" title="<?php echo $msg_addcomments6; ?>" border="0"></a> <a href="index.php?cmd=edit&amp;id=<?php echo $_GET['id']; ?>" title="<?php echo $msg_showblogs8; ?>"><img src="images/edit_small.gif" alt="<?php echo $msg_showblogs8; ?>" title="<?php echo $msg_showblogs8; ?>" border="0"></a></td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" height="17" class="menutable"><b><?php echo strtoupper($msg_addcomments); ?> (<?php echo $COUNT->blog_count; ?>)</b> &raquo;</td>
    </tr>
    </table>
    <?php

    if ($COUNT->blog_count==0)
    {
      
    ?>
    <table cellpadding="0" cellspacing="0" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="center" height="17" class="displaytd"><?php echo $msg_addcomments3; ?></td>
    </tr>
    </table>
    <?php
    
    }
    else
    {
    
      $q_comms = mysql_query("SELECT * FROM ".$database['prefix']."comments 
                              WHERE postid = '".(int)$_GET['id']."' 
                              ORDER BY id") or die(mysql_error());

      while ($COMMENTS = mysql_fetch_object($q_comms))
      {
        $find     = array('{poster}','{date}');
        $replace  = array(cleanData($COMMENTS->name),$COMMENTS->rawpostdate);
    ?>
    <table cellpadding="0" cellspacing="0" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" height="17" colspan="2" style="background-color:<?php echo ($COMMENTS->adminPost ? '#F0F6FF' : '#FFFFFF'); ?>;padding:5px;border-bottom:1px solid #164677"><?php echo nl2br(cleanData($COMMENTS->comments)); ?></td>
    </tr>
    <tr>
        <td align="left" style="background-color:<?php echo ($COMMENTS->adminPost ? '#FFFFFF' : '#F0F6FF'); ?>;padding-right:5px;padding-top:5px;padding-left:5px;padding-bottom:5px;"><i><?php echo str_replace($find,$replace,$msg_addcomments9); ?></i></td>
        <td align="right" style="background-color:<?php echo ($COMMENTS->adminPost ? '#FFFFFF' : '#F0F6FF'); ?>;padding-right:5px;padding-top:5px;padding-left:5px;padding-bottom:5px;"><a href="index.php?cmd=editcomments&amp;id=<?php echo $COMMENTS->id; ?>" title="<?php echo $msg_showblogs8; ?>"><img src="images/edit_small.gif" alt="<?php echo $msg_showblogs8; ?>" title="<?php echo $msg_showblogs8; ?>" border="0"></a> <a href="index.php?cmd=addcomments&amp;delete=<?php echo $COMMENTS->id; ?>&amp;blog=<?php echo $BLOG->id; ?>" title="<?php echo $msg_showblogs9; ?>" onclick="return submit_confirm('<?php echo $msg_javascript; ?>');"><img src="images/delete.gif" alt="<?php echo $msg_showblogs9; ?>" title="<?php echo $msg_showblogs9; ?>" border="0"></a></td>
    </tr>
    </table>
    <?php
    
      }
    
    }
    
    ?>
    <table cellpadding="0" cellspacing="1" width="100%" align="center" style="margin-top:3px;border: 1px solid #164677;">
    <tr>
        <td align="left" height="17" class="menutable"><b><?php echo strtoupper($msg_header7); ?></b> &raquo;</b></td>
    </tr>
    </table>
    <table cellpadding="0" cellspacing="0" width="100%" align="center" style="margin-top:3px">
    <tr>
        <td width="70%" align="left"><textarea cols="85" rows="10" name="comments" style="width:98%"></textarea></td>
    </tr>
    <tr>
        <td align="left">
        <table width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" style="padding:3px">
          <table width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" width="3%" style="background-color:#F0F6FF;border: 1px solid #164677"><input type="checkbox" name="allow" value="1"></td>
            <td align="left" width="97%" style="padding-left:10px"><?php echo $msg_addcomments2; ?></td>
          </tr>
          </table>
          </td>
        </tr>
        </table>
        </td>
    </tr>
    <tr>
        <td align="left"><br><input class="formbutton" type="submit" value="<?php echo $msg_header7; ?>" title="<?php echo $msg_header7; ?>"><br><br></td>
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

