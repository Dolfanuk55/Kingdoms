<?php

 /*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Weblog Display
 ----------------------------------------------*/

 error_reporting (0);
 
 //=====================================================================
 // DEFINED VARIABLES
 //=====================================================================
 //
 // INCLUDE_FILES       = Do not alter. Important for security.
 // WRAP_TEXT           = Wraps text in comments if set higher than 0
 // CHECK_TEMPLATES     = Checks templates are present. Enable if creating
 //                       a new theme 
 // SHOW_ARCHIVE_COUNT  = Show total blogs for each archive?
 //
 //===================================================================== 
 
 define('INCLUDE_FILES', 1);
 define('WRAP_TEXT',70);
 define('CHECK_TEMPLATES', 1);
 define('SHOW_ARCHIVE_COUNT', 1);
 define('PARENT',1);
 
 //===============================
 // Do not edit below this line
 //===============================
 
 define('FOLDER_PATH', dirname(__FILE__).'/');
 
 include(FOLDER_PATH.'inc/db_connection.inc.php');
 include(FOLDER_PATH.'lib/Savant2.php');
 include(FOLDER_PATH.'classes/class_mail.inc.php');
 include(FOLDER_PATH.'classes/php-captcha.inc.php');
 include(FOLDER_PATH.'classes/class_comments.inc.php');
 include(FOLDER_PATH.'classes/class_rss.inc.php');
 include(FOLDER_PATH.'classes/PaginateIt.php');
 
 // Collation..
 @mysql_query("SET CHARACTER SET 'utf8'");
 @mysql_query("SET NAMES 'utf8'");
 
 $SETTINGS = mysql_fetch_object(mysql_query("SELECT * FROM ".$database['prefix']."settings LIMIT 1")) or die(mysql_error());

 // Set theme. Use standard as default..
 define('THEME', ($SETTINGS->theme ? $SETTINGS->theme : 'standard'));

 include(FOLDER_PATH.'lang/'.$SETTINGS->language);
 include(FOLDER_PATH.'inc/functions.php');
 
 // Before we continue, lets check the integrity of some system variables..
 // Technically, these vars are only live when search engine friendly urls are enabled..
 // If one of these vars are present and not numeric, its invalid..
 if (isset($month) && !ctype_digit($month)) { 
   header("Location: index.php"); 
 }
 if (isset($year) && !ctype_digit($year)) { 
   header("Location: index.php"); 
 }
 if (isset($post) && !ctype_digit($post)) { 
   header("Location: index.php");
 }

 // Default vars..
 // Create class objects..
 $cmd         = isset($_GET['cmd']) ? strip_tags($_GET['cmd']) : (isset($cmd) ? strip_tags($cmd) : 'home');
 $page        = isset($_GET['page']) ? strip_tags($_GET['page']) : '1';
 $a_month     = isset($_GET['month']) ? strip_tags($_GET['month']) : (isset($month) ? strip_tags($month) : '0');
 $a_year      = isset($_GET['year']) ? strip_tags($_GET['year']) : (isset($year) ? strip_tags($year) : '0');
 $b_post      = isset($_GET['post']) ? strip_tags($_GET['post']) : (isset($post) ? strip_tags($post) : '0');
 $pageTitle   = cleanData($SETTINGS->blogname);
 $limitvalue  = $page * $SETTINGS->total - ($SETTINGS->total);
 $count       = 0;
 $rError      = false;
 $MW_MAIL     = new mailClass();
 $MW_COMMENT  = new blogComment();
 $MW_FEED     = new rss_Feed();
 
 // SMTP mail vars..
 $MW_MAIL->smtp_host  = $SETTINGS->smtp_host;
 $MW_MAIL->smtp_port  = $SETTINGS->smtp_port;
 $MW_MAIL->smtp_user  = $SETTINGS->smtp_user;
 $MW_MAIL->smtp_pass  = $SETTINGS->smtp_pass;
 $MW_MAIL->smtp       = $SETTINGS->smtp;
 
 // Lets make sure page var is numeric..
 // Only needs checking for pages greater than 1..
 // Prevents someone changing the var to something malicious..
 if ($page>1 && !ctype_digit($page))
 {
   header("Location: index.php");
   exit;
 }

 // Check system templates to make sure that all are loading ok..
 
 if (CHECK_TEMPLATES)
 {
   checkTemplatesAreLoading();
 } 
 
 switch ($cmd)
 {
   //==============
   // Case : Home
   //==============       
   
   case 'home':
   
   $lPosts = '';
   
   $q_blogs = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                          ORDER BY id DESC 
                          LIMIT $SETTINGS->hometotal
                          ") or die(mysql_error());
   
   while ($BLOGS = mysql_fetch_object($q_blogs))
   {
     // Get comment count..
     $q_c = mysql_query("SELECT count(*) AS c_count FROM ".$database['prefix']."comments
                         WHERE postid = '$BLOGS->id'
                         ") or die(mysql_error());
     $COMMENTS = mysql_fetch_object($q_c);
     
     // Load tpl file and parse data..
     $find     = array('{post_title}','{post_content}','{post_friend_url}','{tell_a_friend}',
                       '{post_comments_url}','{view_comments}','{comments_count}','{post_date}',
                       '{path}','{comments}','{view_blog}');
                       
     $replace  = array(cleanData($BLOGS->title),autoParseLinks(cleanData($BLOGS->comments)),($SETTINGS->modR ? $SETTINGS->w_path.'/friend_'.$BLOGS->id.'.html' : $SETTINGS->w_path.'/index.php?cmd=tell-a-friend&amp;blog='.$BLOGS->id),$msg_index,
                       ($SETTINGS->modR ? $SETTINGS->w_path.'/blog/'.$BLOGS->id.'/'.addTitleToUrl(cleanData($BLOGS->title)).'.html' : $SETTINGS->w_path.'/index.php?cmd=blog&amp;post='.$BLOGS->id),
                       $msg_index2,number_format($COMMENTS->c_count),$BLOGS->rawpostdate,
                       $SETTINGS->w_path.'/themes/'.THEME,$msg_viewblog7,$msg_viewblog8);
     
     $lPosts   .= str_replace($find,$replace,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/blog_post.tpl'));
   }
   
   include(FOLDER_PATH.'inc/header.php');

   $tpl_index = new Savant2();
   $tpl_index->assign('LATEST_POSTS', $lPosts.'<p>&nbsp;</p>');
   $tpl_index->assign('PATH', $SETTINGS->w_path.'/themes/'.THEME);
   $tpl_index->display('themes/'.THEME.'/index.tpl.php');
 
   include(FOLDER_PATH.'inc/footer.php');
   break;
   
   //================
   // Case : Search
   //================
   
   case 'search':
   
   $pageTitle   = cleanData($SETTINGS->blogname).' - '.$msg_publicsearch;
   $keywords    = strip_tags($_GET['keywords']);
   $sql_string  = '';
   $sData       = '';
   $pData       = '';
   
   // If no keywords have been entered, redirect back to main page..
   if ($keywords)
   {
     // Split keywords..
     $new_words = explode(" ",$keywords);
     
     // Build blogs and comments tables for match..
     for ($i=0; $i<count($new_words); $i++)
     {
       $sql_string .= ($i ? 
                       " OR title LIKE '%".mysql_real_escape_string($new_words[$i])."%' OR comments LIKE '%".mysql_real_escape_string($new_words[$i])."%' " : 
                       "WHERE title LIKE '%".mysql_real_escape_string($new_words[$i])."%' OR comments LIKE '%".mysql_real_escape_string($new_words[$i])."%'"
                       );
     }
     
     // First query gets the count of data returned..
     $q_search_count = mysql_query("SELECT count(*) AS s_count FROM ".$database['prefix']."blogs 
                                    $sql_string
                                    ") or die(mysql_error());
     $COUNT = mysql_fetch_object($q_search_count);
     
     // Second query returns the data with limit clause for pagination..
     $q_search = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                              $sql_string
                              ORDER BY title
                              LIMIT $limitvalue,$SETTINGS->total") or die(mysql_error());
     
     // Are there any search results to display?
     if ($COUNT->s_count>0)
     {
       $sData = str_replace(array('{results}','{results_message}','{display_message}','{path}'),
                            array($msg_publicsearch,$msg_publicsearch4,str_replace(array('{count}','{pages}'),
                                                                                   array($COUNT->s_count,ceil($COUNT->s_count/$SETTINGS->total)),
                                                                                   $msg_publicsearch5),
                                                                                   $SETTINGS->w_path.'/themes/'.THEME
                                                                                   ),
                            file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/search_results_header.tpl')
                            );
                            
       // Now loop and show results..
       while ($SEARCH = mysql_fetch_object($q_search))
       {
         $sData .= str_replace(array('{blog_title}','{blog_url}','{path}'),
                               array(cleanData($SEARCH->title),($SETTINGS->modR ? $SETTINGS->w_path.'/blog/'.$SEARCH->id.'/'.addTitleToUrl(cleanData($SEARCH->title)).'.html' : $SETTINGS->w_path.'/index.php?cmd=blog&amp;post='.$SEARCH->id),$SETTINGS->w_path.'/themes/'.THEME),
                               file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/search_results.tpl')
                               );
       }  
       
       // Assign data for page numbers..
       $pData = str_replace(array('{pages}','{path}'),array(public_page_numbers($COUNT->s_count,$SETTINGS->total,$page),$SETTINGS->w_path.'/themes/'.THEME),
                            file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/page_numbers.tpl')
                            );                  
     }
     else
     {
       $sData = str_replace(array('{no_results}','{no_results_message}','{path}'),
                            array($msg_publicsearch2,$msg_publicsearch3,$SETTINGS->w_path.'/themes/'.THEME),
                            file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/no_search_results.tpl')
                            );
     }
   }
   else
   {
     header("Location: index.php");
     exit;
   }
   
   include(FOLDER_PATH.'inc/header.php');

   $tpl_search = new Savant2();
   $tpl_search->assign('SEARCH_DATA',$sData);
   $tpl_search->assign('PAGE_NUMBERS',$pData);
   $tpl_search->assign('PATH', $SETTINGS->w_path.'/themes/'.THEME);
   $tpl_search->display('themes/'.THEME.'/search.tpl.php');
 
   include(FOLDER_PATH.'inc/footer.php');
   break;
   
   //================
   // Case : Contact
   //================
   
   case 'contact':
   
   if (isset($_POST['process'])) {
     $name      = cleanData(htmlspecialchars($_POST['name']));
     $email     = cleanData(htmlspecialchars($_POST['email']));
     $subject   = cleanData(htmlspecialchars($_POST['subject']));
     $comments  = cleanData(htmlspecialchars($_POST['comments']));
     $code      = isset($_POST['code']) ? cleanData(htmlspecialchars($_POST['code'])) : '';
     
     if ($name=='') {
      $n_error = true;
      $count++;
     } 
     if (!eregi("^([a-z]|[0-9]|\.|-|_)+@([a-z]|[0-9]|\.|-|_)+\.([a-z]|[0-9]){2,4}$", $email)) {
      $e_error = true;
      $count++;
     }
     if ($subject=='') {
      $s_error = true; 
      $count++;
     }
     if ($comments=='') {
      $c_error = true;
      $count++;
     }
     if ($SETTINGS->enableCaptcha)
     {
       if (!PhpCaptcha::Validate($code)) {
        $code_error = true;
        $count++;
       }
     }
     if ($count==0)
     {
       $MW_MAIL->sendMail($SETTINGS->name,
                          $SETTINGS->email,
                          $name,
                          $email,
                          '['.$SETTINGS->website.'] '.$subject,
                          $comments
                          );
       
       // Clear vars..
       $name      = '';
       $email     = '';
       $subject   = '';
       $comments  = '';
       
       $SENT = true;
     }
   }
   
   $pageTitle = cleanData($SETTINGS->blogname).' - '.$msg_public_header4;
   
   include(FOLDER_PATH.'inc/header.php');

   //$tpl_contact->assign('CODE_ERROR', (isset($code_error) ? '<br /><span class="error">'.$msg_contact12.'</span>' : ''));
   //$tpl_contact->assign('CODE', $msg_contact6);

   $tpl_contact = new Savant2();
   $tpl_contact->assign('MESSAGE', (isset($SENT) ? $msg_contact13 : $msg_contact));
   $tpl_contact->assign('C_URL', $SETTINGS->w_path.'/'.($SETTINGS->modR ? 'contact.html' : 'index.php?cmd=contact'));
   $tpl_contact->assign('NAME', $msg_contact2);
   $tpl_contact->assign('EMAIL', $msg_contact3);
   $tpl_contact->assign('SUBJECT', $msg_contact4);
   $tpl_contact->assign('COMMENTS', $msg_contact5);
   $tpl_contact->assign('NAME_VALUE', (isset($name) ? $name : ''));
   $tpl_contact->assign('EMAIL_VALUE', (isset($email) ? $email : ''));
   $tpl_contact->assign('SUBJECT_VALUE', (isset($subject) ? $subject : ''));
   $tpl_contact->assign('COMMENTS_VALUE', (isset($comments) ? $comments : ''));
   $tpl_contact->assign('NAME_ERROR', (isset($n_error) ? '<br /><span class="error">'.$msg_contact8.'</span>' : ''));
   $tpl_contact->assign('EMAIL_ERROR', (isset($e_error) ? '<br /><span class="error">'.$msg_contact9.'</span>' : ''));
   $tpl_contact->assign('SUBJECT_ERROR', (isset($s_error) ? '<br /><span class="error">'.$msg_contact10.'</span>' : ''));
   $tpl_contact->assign('COMMENTS_ERROR', (isset($c_error) ? '<span class="error">'.$msg_contact11.'</span><br />' : ''));
   $tpl_contact->assign('CAPTCHA',showCaptcha($msg_contact6,(isset($code_error) ? '<br /><span class="error">'.$msg_contact12.'</span>' : '')));
   $tpl_contact->assign('SUBMIT', $msg_contact7);
   $tpl_contact->assign('CONTACT_ME', $msg_public_header4);
   $tpl_contact->assign('PATH', $SETTINGS->w_path.'/themes/'.THEME);
   $tpl_contact->display('themes/'.THEME.'/contact.tpl.php');
 
   include(FOLDER_PATH.'inc/footer.php');
   break;
   
   //===================
   // Case : View Blog
   //===================
   
   case 'blog':
   
   // Check month and year vars...
   // If they don`t equal 0, are they numeric?..
   if ($b_post==0 && !ctype_digit($b_post))
   {
     header("Location: index.php");
     exit;
   }
   
   $vBlog      = '';
   $vComments  = '';
   $vFormBox   = '';
   
   // Get blog data..
   $q_blog = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                          WHERE id = '$b_post' 
                          LIMIT 1
                          ") or die(mysql_error());
   $BLOG = mysql_fetch_object($q_blog);   
   
   // At this point, lets see if the last query fetched anything..
   // If it didn`t, blog id is invalid. Might be someone bookmarked an old link..
   // If no data, redirect to homepage..
   if (mysql_num_rows($q_blog)==0)
   {
     header("Location: index.php");
     exit;
   }    
   
   // Submit form and add comments..
   if (isset($_POST['process']) && $BLOG->allow)
   {
     $_POST     = array_map('htmlspecialchars',$_POST);
	 $id        = $_POST['id'];
     $name      = cleanEvilTags($_POST['name'],true);
     $email     = $_POST['email'];
     $comments  = cleanEvilTags($_POST['comments'],true);
     $code      = isset($_POST['code']) ? trim($_POST['code']) : '';
     
     if ($name=='') {
      $n_error = true;
      $count++;
     } 
     if (!eregi("^([a-z]|[0-9]|\.|-|_)+@([a-z]|[0-9]|\.|-|_)+\.([a-z]|[0-9]){2,4}$", $email)) {
      $e_error = true;
      $count++;
     }
     if ($comments=='') {
      $c_error = true;
      $count++;
     }
     if ($SETTINGS->enableCaptcha)
     {
       if (!PhpCaptcha::Validate($code)) {
        $code_error = true;
        $count++;
       }
     }
     if ($count==0)
     {
       $MW_COMMENT->prefix  = $database['prefix'];
       $MW_COMMENT->date    = date($SETTINGS->dateformat,strtotime("".$SETTINGS->timeOffset." hours"));
       
       // Add comments..
       $MW_COMMENT->add_comment_sql($_POST,$name,$comments,$email);
       
       // Send notification to webmaster if enabled..
       if ($BLOG->notify)
       {
         $MW_MAIL->addTag('{BLOGTITLE}',$BLOG->title);
         $MW_MAIL->addTag('{BLOGURL}',($SETTINGS->modR ? $SETTINGS->w_path.'/blog/'.$id.'/'.addTitleToUrl(cleanData($BLOG->title)).'.html' : $SETTINGS->w_path.'/index.php?cmd=blog&post='.$id));
         $MW_MAIL->addTag('{COMMENTS}',$comments);
         $MW_MAIL->addTag('{VISITOR}',$name);
         $MW_MAIL->addTag('{EMAIL}',$email);
         $MW_MAIL->addTag('{IP}',$_SERVER['REMOTE_ADDR']);
         $MW_MAIL->addTag('{DATE}',date($SETTINGS->dateformat,strtotime("".$SETTINGS->timeOffset." hours")));
         $MW_MAIL->addTag('{SITEPATH}',$SETTINGS->w_path);
         
         $MW_MAIL->sendMail($SETTINGS->name,
                            $SETTINGS->email,
                            $name,
                            $email,
                            '['.$SETTINGS->website.'] '.$msg_viewblog5,
                            $MW_MAIL->template('themes/email/notification.txt')
                            );
       }
       
       // Reload to blog page..
       $url = ($SETTINGS->modR ? $SETTINGS->w_path.'/blog/'.$id.'/'.addTitleToUrl(cleanData($BLOG->title)).'.html' : $SETTINGS->w_path.'/index.php?cmd=blog&post='.$id);
       
       header("Location: $url");
       exit;
     }
   }   
   
   // Get comments for this blog..
   $q_comments = mysql_query("SELECT * FROM ".$database['prefix']."comments
                              WHERE postid = '$b_post'
                              ORDER BY id ".($SETTINGS->commentsOrder=='asc' ? 'ASC' : 'DESC')."
                              ") or die(mysql_error());               
   
   // Load tpl file and parse data..
   $find     = array('{post_title}','{post_content}','{post_friend_url}','{print_url}','{print}',
                     '{tell_a_friend}','{comments_count}','{post_date}','{path}','{bookmarks}');
                       
   $replace  = array(cleanData($BLOG->title),autoParseLinks(cleanData($BLOG->comments)),($SETTINGS->modR ? $SETTINGS->w_path.'/friend_'.$BLOG->id.'.html' : $SETTINGS->w_path.'/index.php?cmd=tell-a-friend&amp;blog='.$BLOG->id),
                     ($SETTINGS->modR ? $SETTINGS->w_path.'/print_'.$BLOG->id.'.html' : $SETTINGS->w_path.'/index.php?cmd=print&amp;blog='.$BLOG->id),$msg_script12,$msg_index,
                     str_replace("{count}",number_format(mysql_num_rows($q_comments)),$msg_index3),$BLOG->rawpostdate,
                     $SETTINGS->w_path.'/themes/'.THEME,($SETTINGS->bookmarks ? loadBookmarks(($SETTINGS->modR ? $SETTINGS->w_path.'/friend_'.$BLOG->id.'.html' : $SETTINGS->w_path.'/index.php?cmd=tell-a-friend&blog='.$BLOG->id),$BLOG->title) : ''));
     
   $vBlog    = str_replace($find,$replace,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/single_blog_post.tpl'));
   
   // Load comment data..
   if (mysql_num_rows($q_comments)>0)
   {
     while ($COMMENTS = mysql_fetch_object($q_comments))
     {
       $find       = array('{comment_class}','{post_content}','{post_date}','{path}');
       $replace    = array(($COMMENTS->adminPost ? 'comment_admin' : 'comment_visitor'),
                           autoParseLinks(nl2br(cleanData($COMMENTS->comments))),str_replace(array('{poster}','{date}'),array(cleanData($COMMENTS->name),$COMMENTS->rawpostdate),$msg_viewblog),
                           $SETTINGS->w_path.'/themes/'.THEME);
       $vComments  .= str_replace($find,$replace,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/comments.tpl'));
     }
   }
   else
   {
       $vComments  = str_replace('{message}',$msg_viewblog2,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/system_message.tpl'));
   }
   
   // Are comments enabled for this blog?..
   if ($BLOG->allow)
   {
     $find      = array('{add_reply}','{comments_url}','{id}','{name}','{name_value}','{email}',
                        '{email_value}','{comments}','{comments_value}','{submit}','{path}',
                        '{name_error}','{email_error}','{comments_error}','{captcha}');
     $replace   = array($msg_viewblog4,($SETTINGS->modR ? $SETTINGS->w_path.'/blog/'.$BLOG->id.'/'.addTitleToUrl(cleanData($BLOG->title)).'.html' : $SETTINGS->w_path.'/index.php?cmd=blog&amp;post='.$BLOG->id),$BLOG->id,
                        $msg_contact2,(isset($name) ? cleanData($name) : ''),$msg_contact3,(isset($email) ? cleanData($email) : ''),$msg_contact5,(isset($comments) ? cleanData($comments) : ''),$msg_contact7,$SETTINGS->w_path.'/themes/'.THEME,
                        (isset($n_error) ? '<br /><span class="error">'.$msg_contact8.'</span>' : ''),
                        (isset($e_error) ? '<br /><span class="error">'.$msg_contact9.'</span>' : ''),
                        (isset($c_error) ? '<span class="error">'.$msg_contact11.'</span><br />' : ''),
                         showCaptcha($msg_contact6,(isset($code_error) ? '<br /><span class="error">'.$msg_contact12.'</span>' : '')));
     $vFormBox  = str_replace($find,$replace,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/reply_box.tpl'));
   }
   else
   {
     $vFormBox  = str_replace(array('{message}','{path}'),
                              array($msg_viewblog3,$SETTINGS->w_path.'/themes/'.THEME),
                              file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/system_message.tpl')
                              );
   }
   
   $pageTitle = cleanData($SETTINGS->blogname).' - '.cleanData($BLOG->title);
   
   include(FOLDER_PATH.'inc/header.php');

   $tpl_blog = new Savant2();
   $tpl_blog->assign('BLOG_DATA', $vBlog);
   $tpl_blog->assign('COMMENT_COUNT', str_replace("{count}",number_format(mysql_num_rows($q_comments)),$msg_index3));
   $tpl_blog->assign('COMMENT_DATA', $vComments);
   $tpl_blog->assign('ADD_COMMENTS', $msg_viewblog4);
   $tpl_blog->assign('REPLY_BOX', $vFormBox);
   $tpl_blog->assign('PATH', $SETTINGS->w_path.'/themes/'.THEME);
   $tpl_blog->display('themes/'.THEME.'/view_blog.tpl.php');
 
   include(FOLDER_PATH.'inc/footer.php');
   break;
   
   //================
   // Case : Archive
   //================
   
   case 'archive':
   case 'all-archive':
   
   $aData  = '';
   $pData  = '';
   
   // Check month and year vars...
   // If they don`t equal 0, are they numeric?..
   if (!ctype_digit($a_month) || !ctype_digit($a_year))
   {
     header("Location: index.php");
     exit;
   }
   
   $pageTitle = cleanData($SETTINGS->blogname).' - '.$msg_public_header5.($cmd=='archive' ? ' - '.getMonthName(($a_month<10 ? '0'.$a_month : $a_month)).' '.$a_year : '');
   
   // First query gets the count of data returned..
   $q_archive_count = mysql_query("SELECT count(*) AS a_count FROM ".$database['prefix']."blogs 
                                  ".($cmd=='archive' ? 
                                  'WHERE archiveMonth = \''.$a_month.'\' && archiveYear = \''.$a_year.'\'' : 
                                  '')."
                                  ") or die(mysql_error());
   $COUNT = mysql_fetch_object($q_archive_count);
     
   // Second query returns the data with limit clause for pagination..
   $q_archive = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                            ".($cmd=='archive' ? 
                            'WHERE archiveMonth = \''.$a_month.'\' && archiveYear = \''.$a_year.'\'' : 
                            '')."
                            ORDER BY title
                            LIMIT $limitvalue,$SETTINGS->total") or die(mysql_error());
   
   $aData = str_replace(array('{results}','{results_message}','{display_message}','{path}'),
                        array(($cmd=='archive' ? str_replace(array('{month}','{year}'),
                                                             array(getMonthName($a_month),$a_year),$msg_archive2) : $msg_archive),
                                                            ($cmd=='archive' ? $msg_archive4 : $msg_archive3),
                                                 str_replace(array('{count}','{pages}'),
                                                             array($COUNT->a_count,ceil($COUNT->a_count/$SETTINGS->total)),
                                                             $msg_publicsearch5),
                                                             $SETTINGS->w_path.'/themes/'.THEME
                        ),
                        file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/search_results_header.tpl')
                        );
                            
   // Now loop and show results..
   while ($ARCHIVE = mysql_fetch_object($q_archive))
   {
     $aData .= str_replace(array('{blog_title}','{blog_url}','{path}'),
                           array(cleanData($ARCHIVE->title),($SETTINGS->modR ? $SETTINGS->w_path.'/blog/'.$ARCHIVE->id.'/'.addTitleToUrl(cleanData($ARCHIVE->title)).'.html' : $SETTINGS->w_path.'/index.php?cmd=blog&amp;post='.$ARCHIVE->id),$SETTINGS->w_path.'/themes/'.THEME),
                           file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/search_results.tpl')
                           );
   }  
       
   // Assign data for page numbers..
   $pData = str_replace(array('{pages}','{path}'),
                        array(public_page_numbers($COUNT->a_count,$SETTINGS->total,$page),$SETTINGS->w_path.'/themes/'.THEME),
                        file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/page_numbers.tpl')
                        );      
                                    
   include(FOLDER_PATH.'inc/header.php');

   $tpl_archive = new Savant2();
   $tpl_archive->assign('ARCHIVE_DATA',$aData);
   $tpl_archive->assign('PAGE_NUMBERS',($COUNT->a_count>0 ? $pData : ''));
   $tpl_archive->assign('PATH', $SETTINGS->w_path.'/themes/'.THEME);
   $tpl_archive->display('themes/'.THEME.'/archive.tpl.php');
 
   include(FOLDER_PATH.'inc/footer.php');
   break;
   
   //================
   // Case : Profile
   //================
   
   case 'profile':
   
   $pageTitle = cleanData($SETTINGS->blogname).' - '.$msg_public_header3;
   
   include(FOLDER_PATH.'inc/header.php');

   $profile = '';
   
   if ($SETTINGS->profile)
   {
     $find     = array('{profile}','{profile_text}','{last_updated}','{date}','{path}');
     $replace  = array($msg_public_header8,autoParseLinks(nl2br(stripslashes($SETTINGS->profile))),$msg_profile,date($SETTINGS->dateformat,strtotime($SETTINGS->profileUpdate)),$SETTINGS->w_path.'/themes/'.THEME);
     $profile  = str_replace($find,$replace,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/profile.tpl'));
   }

   $tpl_profile = new Savant2();
   $tpl_profile->assign('PROFILE', $profile);
   $tpl_profile->assign('PATH', $SETTINGS->w_path.'/themes/'.THEME);
   $tpl_profile->display('themes/'.THEME.'/profile.tpl.php');
 
   include(FOLDER_PATH.'inc/footer.php');
   break;
   
   //==================
   // Case : Print
   //==================
   
   case 'print':
   
   $blog = strip_tags($_GET['blog']);
   
   // Check integrity of link..
   if ($blog==0 || !ctype_digit($blog))
   {
     exit;
   }
   
   $vBlog      = '';
   $vComments  = '';
   
   // Get blog data..
   $q_blog = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                          WHERE id = '$blog' 
                          LIMIT 1
                          ") or die(mysql_error());
   $BLOG = mysql_fetch_object($q_blog);   
   
   // At this point, lets see if the last query fetched anything..
   // If it didn`t, blog id is invalid. What is the visitor doing on this page?
   // If no data, terminate script execution..
   if (mysql_num_rows($q_blog)==0)
   {
     exit;
   }
   
   // Get comments for this blog..
   $q_comments = mysql_query("SELECT * FROM ".$database['prefix']."comments
                              WHERE postid = '$blog'
                              ORDER BY id ".($SETTINGS->commentsOrder=='asc' ? 'ASC' : 'DESC')."
                              ") or die(mysql_error());               
   
   // Load tpl file and parse data..
   $find     = array('{post_title}','{post_content}','{comments_count}','{post_date}','{path}');
                       
   $replace  = array(cleanData($BLOG->title),autoParseLinks(cleanData($BLOG->comments)),
                     str_replace("{count}",number_format(mysql_num_rows($q_comments)),$msg_index3),$BLOG->rawpostdate,
                     $SETTINGS->w_path.'/themes/'.THEME);
     
   $vBlog    = str_replace($find,$replace,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/print_blog_post.tpl'));
   
   // Load comment data..
   if (mysql_num_rows($q_comments)>0)
   {
     while ($COMMENTS = mysql_fetch_object($q_comments))
     {
       $find       = array('{comment_class}','{post_content}','{post_date}','{path}');
       $replace    = array(($COMMENTS->adminPost ? 'comment_admin' : 'comment_visitor'),
                           autoParseLinks(nl2br(cleanData($COMMENTS->comments))),str_replace(array('{poster}','{date}'),array(cleanData($COMMENTS->name),$COMMENTS->rawpostdate),$msg_viewblog),
                           $SETTINGS->w_path.'/themes/'.THEME);
       $vComments  .= str_replace($find,$replace,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/comments.tpl'));
     }
   }
   else
   {
       $vComments  = str_replace(array('{message}','{path}'),
                                 array($msg_viewblog2,$SETTINGS->w_path.'/themes/'.THEME),
                                 file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/system_message.tpl'));
   }
   
   $tpl_print = new Savant2();
   $tpl_print->assign('CHARSET', $msg_charset);
   $tpl_print->assign('TITLE', $msg_print);
   $tpl_print->assign('PATH', $SETTINGS->w_path.'/themes/'.THEME);
   $tpl_print->assign('BLOG_DATA', $vBlog);
   $tpl_print->assign('COMMENT_DATA', $vComments);
   $tpl_print->assign('CLOSE_WINDOW', $msg_script18);
   $tpl_print->display('themes/'.THEME.'/print.tpl.php');
   
   break;
   
   //========================
   // Case : Tell a Friend
   //========================
   
   case 'tell-a-friend':
   
   $blog = strip_tags($_GET['blog']);
   
   // Check integrity of link..
   if ($blog==0 || !ctype_digit($blog))
   {
     exit;
   }
   
   // Get blog data..
   $q_blog = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                          WHERE id = '$blog' 
                          LIMIT 1
                          ") or die(mysql_error());
   $BLOG = mysql_fetch_object($q_blog);   
   
   // At this point, lets see if the last query fetched anything..
   // If it didn`t, blog id is invalid. What is the visitor doing on this page?
   // If no data, terminate script execution..
   if (mysql_num_rows($q_blog)==0)
   {
     exit;
   }
   
   // Process form..
   if (isset($_POST['process']))
   {
     $_POST     = array_map('htmlspecialchars',$_POST);
	 $yname     = cleanEvilTags($_POST['yname'],true);
     $yemail    = trim($_POST['yemail']);
     $fname     = cleanEvilTags($_POST['fname'],true);
     $femail    = trim($_POST['femail']);
     $comments  = cleanEvilTags($_POST['comments'],true);
     $code      = isset($_POST['code']) ? trim($_POST['code']) : '';
     
     if ($yname=='') {
      $yn_error = true;
      $count++;
     } 
     if (!eregi("^([a-z]|[0-9]|\.|-|_)+@([a-z]|[0-9]|\.|-|_)+\.([a-z]|[0-9]){2,4}$", $yemail)) {
      $ye_error = true;
      $count++;
     }
     if ($fname=='') {
      $fn_error = true;
      $count++;
     } 
     if (!eregi("^([a-z]|[0-9]|\.|-|_)+@([a-z]|[0-9]|\.|-|_)+\.([a-z]|[0-9]){2,4}$", $femail)) {
      $fe_error = true;
      $count++;
     }
     if ($comments=='') {
      $c_error = true;
      $count++;
     } 
     if ($SETTINGS->enableCaptcha)
     {
       if (!PhpCaptcha::Validate($code)) {
        $code_error = true;
        $count++;
       }
     }
     if ($count==0)
     {
       $MW_MAIL->addTag('{BLOGTITLE}',$BLOG->title);
       $MW_MAIL->addTag('{BLOGURL}',($SETTINGS->modR ? $SETTINGS->w_path.'/blog/'.$BLOG->id.'/'.addTitleToUrl(cleanData($BLOG->title)).'.html' : $SETTINGS->w_path.'/index.php?cmd=blog&post='.$BLOG->id));
       $MW_MAIL->addTag('{COMMENTS}',$comments);
       $MW_MAIL->addTag('{VISITOR}',$yname);
       $MW_MAIL->addTag('{FRIEND}',$fname);
       $MW_MAIL->addTag('{DATE}',date($SETTINGS->dateformat,strtotime("".$SETTINGS->timeOffset." hours")));
       $MW_MAIL->addTag('{WEBSITE}',$SETTINGS->website);
       $MW_MAIL->addTag('{WEBSITE_URL}',$SETTINGS->w_path.'/');
       
       $MW_MAIL->sendMail($fname,
                          $femail,
                          $yname,
                          $yemail,
                          '['.$SETTINGS->website.'] '.str_replace("{name}",$fname,$msg_friend11),
                          $MW_MAIL->template('themes/email/tell_a_friend.txt')
                          );
       
       // Clear vars..
       $yname     = '';
       $yemail    = '';
       $comments  = '';
       
       $SENT = true;
     }
   }
   
   $tpl_friend = new Savant2();
   $tpl_friend->assign('CHARSET', $msg_charset);
   $tpl_friend->assign('TITLE', $msg_friend);
   $tpl_friend->assign('FORM_URL', ($SETTINGS->modR ? 'friend_'.$BLOG->id.'.html' : 'index.php?cmd=tell-a-friend&amp;blog='.$BLOG->id));
   $tpl_friend->assign('PATH', $SETTINGS->w_path.'/themes/'.THEME);
   $tpl_friend->assign('CSS_DISPLAY', (isset($SENT) ? '<style type="text/css">#friend_wrapper{display:none}</style>' : ''));
   $tpl_friend->assign('HEADER', (isset($SENT) ? $msg_friend10 : $msg_friend));
   $tpl_friend->assign('MESSAGE', (isset($SENT) ? str_replace(array('{friend}','{email}'),array(cleanData($fname),$femail),$msg_friend8) : $msg_friend9));
   $tpl_friend->assign('YOUR_NAME', $msg_friend2);
   $tpl_friend->assign('YOUR_EMAIL', $msg_friend3);
   $tpl_friend->assign('FRIEND_NAME', $msg_friend4);
   $tpl_friend->assign('FRIEND_EMAIL', $msg_friend5);
   $tpl_friend->assign('COMMENTS', $msg_contact5);
   $tpl_friend->assign('YNAME_VALUE', (isset($yname) ? cleanData($yname) : ''));
   $tpl_friend->assign('YEMAIL_VALUE', (isset($yemail) ? cleanData($yemail) : ''));
   $tpl_friend->assign('FNAME_VALUE', (isset($fname) ? cleanData($fname) : ''));
   $tpl_friend->assign('FEMAIL_VALUE', (isset($femail) ? cleanData($femail) : ''));
   $tpl_friend->assign('COMMENTS_VALUE', (isset($comments) ? cleanData($comments) : ''));
   $tpl_friend->assign('YNAME_ERROR', (isset($yn_error) ? '<br /><span class="error">'.$msg_contact8.'</span>' : ''));
   $tpl_friend->assign('YEMAIL_ERROR', (isset($ye_error) ? '<br /><span class="error">'.$msg_contact9.'</span>' : ''));
   $tpl_friend->assign('FNAME_ERROR', (isset($fn_error) ? '<br /><span class="error">'.$msg_friend6.'</span>' : ''));
   $tpl_friend->assign('FEMAIL_ERROR', (isset($fe_error) ? '<br /><span class="error">'.$msg_contact9.'</span>' : ''));
   $tpl_friend->assign('COMMENTS_ERROR', (isset($c_error) ? '<span class="error">'.$msg_contact11.'</span><br />' : ''));
   $tpl_friend->assign('CAPTCHA',showCaptcha($msg_contact6,(isset($code_error) ? '<br /><span class="error">'.$msg_contact12.'</span>' : '')));
   $tpl_friend->assign('SUBMIT', $msg_contact7);
   $tpl_friend->assign('CLOSE_WINDOW', $msg_script18);
   $tpl_friend->display('themes/'.THEME.'/tell_a_friend.tpl.php');
   break;
   
   //==================
   // Case : RSS Feed
   //==================
   
   case 'rss-feed':
   
   $rss_feed       = '';
   $build_date     = date('D, j M Y H:i:s').' GMT';
   $MW_FEED->path  = $SETTINGS->w_path.'/themes/'.THEME;
   
   // Open channel..
   $rss_feed = $MW_FEED->open_channel();
   
   // Feed info..
   $rss_feed .= $MW_FEED->feed_info(str_replace("{website_name}",$SETTINGS->website,$msg_rss),
                                    ($SETTINGS->modR ? $SETTINGS->w_path.'/index.html' : $SETTINGS->w_path.'/index.php'),
                                    $build_date,
                                    str_replace("{website_name}",$SETTINGS->website,$msg_rss2),
                                    $SETTINGS->website
                                    );
   
   // Get latest posts..
   $query = mysql_query("SELECT * FROM ".$database['prefix']."blogs 
                         ORDER BY id DESC 
                         LIMIT ".$SETTINGS->rssfeeds."
                         ") or die(mysql_error());

   while ($RSS = mysql_fetch_object($query))
   {
     $rss_feed .= $MW_FEED->add_item($msg_rss3.$RSS->title,
                                     ($SETTINGS->modR ? $SETTINGS->w_path.'/blog/'.$RSS->id.'/'.addTitleToUrl(cleanData($RSS->title)).'.html' : $SETTINGS->w_path.'/index.php?cmd=blog&amp;post='.$RSS->id),
                                     ($RSS->rss_date ? $RSS->rss_date : $build_date),
                                     $RSS->comments
                                     );
   }
   
   // Close channel..
   $rss_feed .= $MW_FEED->close_channel();
   
   // Display RSS feed..
   header('Content-Type: text/xml');
   echo (get_magic_quotes_gpc() ? stripslashes(trim($rss_feed)) : trim($rss_feed));
   
   break;
   
   //==================
   // Case : Captcha
   //==================
   
   case 'captcha':
  
   $MWC = new PhpCaptcha();
   $MWC->Create();
  
   break;
   
   //==============
   // Default
   //==============
   
   default:
   header("Location: index.php");
   break;
 }

?>