<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Class - Add New Blog
----------------------------------------------*/

class Blog {
               
               var $prefix;
               var $date;
               
               //---------------------------------
               // FUNCTION: safe_import()
               // Desc: For safe data importing
               // Param: 1
               //---------------------------------
               
               function safe_import($data)
               {
                 return trim(mysql_real_escape_string($data));
               }

               //-----------------------------
               // FUNCTION: add_blog_sql()
               // Desc: Add New Blog to db
               // Param: 1
               //-----------------------------

               function add_blog_sql($arr)
               {
                 mysql_query("INSERT INTO ".$this->prefix."blogs (
                              title,
                              comments,
                              addDate,
                              postdate,
                              rawpostdate,
                              allow,
                              notify,
                              v_count,
                              archiveMonth,
                              archiveYear,
                              rss_date
                              ) VALUES (
                              '".$this->safe_import($arr['title'])."',
                              '".$this->safe_import($arr['comments'])."',
                              '".date("Y-m-d")."',
                              now(),
                              '$this->date',
                              '".(isset($arr['allow']) ? 1 : 0)."',
                              '".(isset($arr['notify']) ? 1 : 0)."',
                              '0',
                              '".date("m")."',
                              '".date("Y")."',
                              '".date("D, j M Y H:i:s")." GMT'
                              )") or die(mysql_error());
               }

               //-----------------------------
               // FUNCTION: update_blog_sql()
               // Desc: Update current blog
               // Param: 2
               //-----------------------------
               
               function update_blog_sql($arr,$id)
               {
                 $id = (int)$id;
                 mysql_query("UPDATE ".$this->prefix."blogs SET
                              title     = '".$this->safe_import($arr['title'])."',
                              comments  = '".$this->safe_import($arr['comments'])."',
                              postdate  = '".$arr['timestamp']."',
                              allow     = '".(isset($arr['allow']) ? 1 : 0)."',
                              notify    = '".(isset($arr['notify']) ? 1 : 0)."'
                              WHERE id  = '$id'
                              LIMIT 1
                              ") or die(mysql_error());
               }
               
               //-----------------------------
               // FUNCTION: add_comments_sql()
               // Desc: Add Comments to db
               // Param: 2
               //-----------------------------

               function add_comments_sql($arr,$id)
               {
                 $id = (int)$id;
                 mysql_query("INSERT INTO ".$this->prefix."comments (
                              postid,
                              name,
                              email,
                              comments,
                              rawpostdate,
                              addDate,
                              postdate,
                              adminPost
                              ) VALUES (
                              '".$id."',
                              '".$this->safe_import($arr['name'])."',
                              '".$arr['email']."',
                              '".$this->safe_import($arr['comments'])."',
                              '$this->date',
                              '".date("Y-m-d")."',
                              NOW(),
                              '1'
                              )") or die(mysql_error());

                 mysql_query("UPDATE ".$this->prefix."blogs SET
                              postdate  = '".$arr['timestamp']."',
                              allow     = '".(isset($arr['allow']) ? 0 : 1)."',
                              v_count   = (v_count+1)
                              WHERE id  = '$id'
                              LIMIT 1
                              ") or die(mysql_error());
               }

               //----------------------------------
               // FUNCTION: update_comments_sql()
               // Desc: Update Comments
               // Param: 2
               //----------------------------------

               function update_comments_sql($arr,$id)
               {
                 mysql_query("UPDATE ".$this->prefix."comments SET
                              name      = '".$this->safe_import($arr['name'])."',
                              email     = '".$arr['email']."',
                              comments  = '".$this->safe_import($arr['comments'])."',
                              postdate  = '".$arr['timestamp']."'
                              WHERE id  = '".(int)$id."'
                              LIMIT 1
                              ") or die(mysql_error());
               }
}

?>