<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Comment Class
  Added in v4.0
----------------------------------------------*/

class blogComment {

                   var $prefix;
                   var $date;
                   
                   //---------------------------------
                   // FUNCTION: safe_import()
                   // Desc: For safe data importing
                   // Param: 1
                   //---------------------------------
               
                   function safe_import($data)
                   {
                     if (get_magic_quotes_gpc()) {
                       $data = stripslashes($data);
                     }
                     return mysql_real_escape_string(trim(htmlspecialchars($data)));
                   }
                   
                   //---------------------------------
                   // FUNCTION: add_comment_sql()
                   // Desc: Add comment
                   // Param: 1
                   //---------------------------------
                   
                   function add_comment_sql($arr,$name,$comments,$email)
                   {
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
                                  '".(int)$arr['id']."',
                                  '".$this->safe_import($name)."',
                                  '$email',
                                  '".$this->safe_import($comments)."',
                                  '$this->date',
                                  '".date("Y-m-d")."',
                                  NOW(),
                                  '0'
                                  )") or die(mysql_error());

                     mysql_query("UPDATE ".$this->prefix."blogs SET
                                  v_count   = (v_count+1)
                                  WHERE id  = '".(int)$arr['id']."'
                                  LIMIT 1
                                  ") or die(mysql_error());
                   }
}

?>