<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: RSS Feed Class
  Added in v4.0
----------------------------------------------*/

class rss_Feed {

                var $xml_version  = '1.0';
                var $encoding     = 'utf-8';
                var $rss_version  = '2.0';
                var $path;

                //==============================
                // Function: open_channel()
                // Param: 0
                // Desc: Starts RSS Channel
                //==============================
                
                function open_channel()
                {
                  $xml_string = '<?xml version="'.$this->xml_version.'" encoding="'.$this->encoding.'"?>
                                 <?xml-stylesheet type="text/css" href="'.$this->path.'/rss_style.css" ?>
                                 <rss version="'.$this->rss_version.'">
                                 <channel>
                                 ';

                  return $xml_string;
                }
                
                //==============================
                // Function: add_item()
                // Param: 4
                // Desc: Loads data into Feed
                //==============================

                function add_item($title='',$link='',$date='',$desc='')
                {
                  $xml_string = '<item>
                                   <title>'.$this->render($title).'</title>
                                    <link>'.$link.'</link>
                                    <pubDate>'.$date.'</pubDate>
                                    <guid>'.$link.'</guid>
                                    <description>'.$this->render($desc,true).'</description>
                                 </item>
                                 ';

                  return $xml_string;
                }
                
                //==============================
                // Function: feed_info()
                // Param: 5
                // Desc: Loads Feed Info
                //==============================

                function feed_info($title='',$link='',$date='',$desc='',$site='')
                {
                  $xml_string = '<title>'.$this->clean($title).'</title>
                                 <link>'.$link.'</link>
                                 <description>'.$this->clean($desc).'</description>
                                 <lastBuildDate>'.$date.'</lastBuildDate>
                                 <language>en-us</language>
                                 <generator>'.$this->render($site).'</generator>
                                 ';

                  return $xml_string;
                }
                
                //==============================
                // Function: close_channel()
                // Param: 0
                // Desc: Closes RSS Channel
                //==============================

                function close_channel()
                {
                  $xml_string = '</channel>
                                 </rss>
                                 ';

                  return $xml_string;
                }
                
                //==============================
                // Function: render()
                // Param: 2
                // Desc: Renders Feed Data
                //==============================
                
                function render($data,$clean_tags=false)
                {
                  if ($clean_tags)
                  {
                    $data = $this->remove_tags($data);
                  }
                  
                  return '<![CDATA['.$this->clean($data).']]>';
                }
                
                //==========================================
                // Function: remove_tags()
                // Param: 1
                // Desc: Removes certain tags from feed
                //==========================================
                
                function remove_tags($data)
                {
                  return strip_tags($data,'<b><strong><p><br><img><i><a><u>');
                }
                
                //==============================
                // Function: clean()
                // Param: 1
                // Desc: Cleans data
                //==============================
                
                function clean($data)
                {
                  return (get_magic_quotes_gpc() ? stripslashes($data) : $data);
                }
}

?>
