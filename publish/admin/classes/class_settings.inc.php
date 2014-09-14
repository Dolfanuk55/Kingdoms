<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Class - Settings
----------------------------------------------*/

class programSettings {

                      var $prefix;
                      var $file;
                      var $temp;

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
                      // FUNCTION: update_sql()
                      // Desc: Update settings in db
                      // Param: 1
                      //-----------------------------
                      
                      function update_sql($arr)
                      {
                        mysql_query("UPDATE ".$this->prefix."settings SET
                                     theme          = '".($arr['theme'] ? $arr['theme'] : 'standard')."',
                                     name           = '".$this->safe_import($arr['name'])."',
                                     email          = '".$arr['email']."',
                                     website        = '".$this->safe_import($arr['website'])."',
                                     w_path         = '".$arr['w_path']."',
                                     blogname       = '".$this->safe_import($arr['blogname'])."',
                                     dateformat     = '".($arr['dateformat'] ? $arr['dateformat'] : 'D j M Y, G:ia')."',
                                     timeOffset     = '".($arr['timeOffset'] ? $arr['timeOffset'] : 0)."',
                                     language       = '".$arr['language']."',
                                     total          = '".($arr['total'] ? $arr['total'] : 25)."',
                                     hometotal      = '".($arr['hometotal'] ? $arr['hometotal'] : 5)."',
                                     rssfeeds       = '".($arr['rssfeeds'] ? $arr['rssfeeds'] : 50)."',
                                     totalArchives  = '".$arr['totalArchives']."',
                                     commentsOrder  = '".($arr['commentsOrder'] ? $arr['commentsOrder'] : 'asc')."',
                                     enableCaptcha  = '".$arr['enableCaptcha']."',
                                     modR           = '".$arr['modR']."',
                                     parseLinks     = '".$arr['parseLinks']."',
                                     meta_d         = '".$this->safe_import($arr['meta_d'])."',
                                     bookmarks      = '".(!empty($arr['bookmark']) ? implode(",",$arr['bookmark']) : '')."',
                                     meta_k         = '".$this->safe_import($arr['meta_k'])."',
                                     profile        = '".$this->safe_import($arr['profile'])."',
                                     profileUpdate  = now(),
                                     imageWidth     = '".$arr['imageWidth']."',
                                     imageHeight    = '".$arr['imageHeight']."',
                                     adsense        = '".$this->safe_import($arr['adsense'])."',
                                     snap           = '".$this->safe_import($arr['snap'])."',
                                     smtp           = '".$arr['smtp']."',
                                     smtp_host      = '".$arr['smtp_host']."',
                                     smtp_user      = '".$arr['smtp_user']."',
                                     smtp_pass      = '".$arr['smtp_pass']."',
                                     smtp_port      = '".$arr['smtp_port']."'
                                     WHERE id       = '1'
                                     LIMIT 1
                                     ") or die(mysql_error());
                      }
                      
                      //-----------------------------
                      // FUNCTION: clear_file()
                      // Desc: Clear profile image
                      // Param: 1
                      //-----------------------------
                      
                      function clear_file($rel,$prev)
                      {
                        if ($prev && file_exists($rel.'uploads/'.$prev))
                        {
                          unlink ($rel.'uploads/'.$prev);
                        }
                        
                        mysql_query("UPDATE ".$this->prefix."settings SET
                                     profileImage = ''
                                     LIMIT 1
                                     ") or die(mysql_error());
                      }
                      
                      //-----------------------------
                      // FUNCTION: upload_file()
                      // Desc: Upload profile image
                      // Param: 2
                      //-----------------------------
                      
                      function upload_file($rel,$prev)
                      {
                        if ($prev && file_exists($rel.'uploads/'.$prev))
                        {
                          @unlink ($rel.'uploads/'.$prev);
                        }
                        
                        if (is_uploaded_file($this->temp))
                        {
                          move_uploaded_file($this->temp, $rel.'uploads/'.$this->file);
                          @chmod($rel.'uploads/'.$this->file,0644);
                          
                          if (file_exists($rel.'uploads/'.$this->file))
                          {
                            @unlink($this->temp);
                            
                            mysql_query("UPDATE ".$this->prefix."settings SET
                                         profileImage = '$this->file'
                                         LIMIT 1
                                         ") or die(mysql_error());
                          }
                        }
                      }
}

?>