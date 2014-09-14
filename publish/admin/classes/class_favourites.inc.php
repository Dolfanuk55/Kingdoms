<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Class - Favourites
  Added in v4.0
----------------------------------------------*/

class Favourites {
                  
                  var $prefix;
                  
                  //---------------------------------
                  // FUNCTION: safe_import()
                  // Desc: For safe data importing
                  // Param: 1
                  //---------------------------------
               
                  function safe_import($data)
                  {
                    return trim(mysql_real_escape_string($data));
                  }
                  
                  //---------------------------------
                  // FUNCTION: add_fave_sql()
                  // Desc: Add Favourite
                  // Param: 1
                  //---------------------------------
                  
                  function add_fave_sql($arr)
                  {
                    mysql_query("INSERT INTO ".$this->prefix."favourites (
                                 name,
                                 url
                                 ) VALUES (
                                 '".$this->safe_import($arr['name'])."',
                                 '".$this->safe_import($arr['url'])."'
                                 )") or die(mysql_error());
                  }
                  
                  //---------------------------------
                  // FUNCTION: update_fave_sql()
                  // Desc: Update Favourite
                  // Param: 1
                  //---------------------------------
                  
                  function update_fave_sql($arr)
                  {
                    mysql_query("UPDATE ".$this->prefix."favourites SET
                                 name      = '".$this->safe_import($arr['name'])."',
                                 url       = '".$this->safe_import($arr['url'])."'
                                 WHERE id  = '".(int)$arr['id']."'
                                 LIMIT 1
                                 ") or die(mysql_error());
                  }
}

?>