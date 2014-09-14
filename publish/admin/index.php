<?php

 /*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Admin - Main Parsing File
 ----------------------------------------------*/
 
 session_start();
 
 error_reporting (0);
 define ('PARENT',1);
 
 //=====================================================================
 // DEFINED VARIABLES
 //=====================================================================
 //
 // INCLUDE_FILES      = For security when popups open.
 // ENABLE_DD_MENU     = If set, disables the omni system menu and
 //                      reverts back to drop down select box
 // SPAW_PATH          = Sets path for file uploads. If this isn`t
 //                      working, see the F.A.Q page in the docs
 // LATEST_BLOGS       = How many latest blogs to show on admin homepage
 //
 //=====================================================================

 define('INCLUDE_FILES', 1);
 define('ENABLE_DD_MENU', 1);
 define('SPAW_PATH', substr_replace(str_replace($_SERVER['DOCUMENT_ROOT'],'',str_replace("\\","/",realpath(dirname(__FILE__)."/..").'/')),'',0,1));
 define('LATEST_BLOGS', 5);

 //=====================================
 // Dot not edit below this line
 //=====================================
 
 define('FOLDER_PATH', dirname(__FILE__).'/');
 define('RELATIVE_PATH', '../');
 
 include(FOLDER_PATH.'inc/functions.inc.php');
 include(RELATIVE_PATH.'inc/functions.php');
 include(RELATIVE_PATH.'inc/db_connection.inc.php');
 include(FOLDER_PATH.'classes/PaginateIt.php');
 
 // Collation..
 @mysql_query("SET CHARACTER SET 'utf8'");
 @mysql_query("SET NAMES 'utf8'");

 $SETTINGS = mysql_fetch_object(mysql_query("SELECT * FROM ".$database['prefix']."settings LIMIT 1")) or die(mysql_error());

 include(RELATIVE_PATH.'lang/'.$SETTINGS->language);
 
 //----------------------------
 // Assign variables
 //----------------------------

 $cmd           = isset($_GET['cmd']) ? strip_tags($_GET['cmd']) : 'home';
 $page          = isset($_GET['page']) ? strip_tags($_GET['page']) : 1;
 $limitvalue    = $page * $SETTINGS->total - ($SETTINGS->total);
 $error_string  = array();

 //--------------------------
 //Main switch for actions
 //--------------------------

 switch ($cmd)
 {
   //-----------------
   //Case : Home
   //-----------------

   case "home":
      
   isWebmasterLoggedIn();

   if (is_dir(RELATIVE_PATH.'install/'))
   {
     $INSTALL_FILE = true;
   }     

   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/home.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;
      
   //-----------------
   // Case : Add
   //-----------------

   case "add":
      
   isWebmasterLoggedIn();
   
   //-------------------------
   // Enable/Disable WYSIWYG
   // Added in v4.0
   //-------------------------
   
   if (isset($_GET['enable']))
   {
     mysql_query("UPDATE ".$database['prefix']."settings SET wysiwyg = '".(int)$_GET['enable']."' LIMIT 1") or die(mysql_error());
   
     header("Location: index.php?cmd=add");
     exit;  
   }
      
   //-----------------------
   // SCRIPT ACTION
   // Add New Blog
   //-----------------------

   if (isset($_POST['process']))
   {
     $title     = trim($_POST['title']);
     $comments  = trim($_POST['comments']);
     
     include(FOLDER_PATH.'classes/class_blog.inc.php');
           
     $MW_ADD          = new Blog();
     $MW_ADD->prefix  = $database['prefix'];
     $MW_ADD->date    = date($SETTINGS->dateformat,strtotime("".$SETTINGS->timeOffset." hours"));

     if ($title=='')
     {
       $t_error = true;
     }
     if ($comments=='')
     {
       $c_error = true;
     }
     if (!isset($t_error) && !isset($c_error))
     {
       $MW_ADD->add_blog_sql($_POST);

       updated($msg_add7,
               'index.php?cmd=add',
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }

   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/add.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;
      
   //-----------------
   // Case : Edit
   //-----------------

   case "edit":
      
   isWebmasterLoggedIn();
   
   //-------------------------
   // Enable/Disable WYSIWYG
   // Added in v4.0
   //-------------------------
   
   if (isset($_GET['enable']))
   {
     mysql_query("UPDATE ".$database['prefix']."settings SET wysiwyg = '".(int)$_GET['enable']."' LIMIT 1") or die(mysql_error());
   
     header("Location: index.php?cmd=edit&id=".$_GET['id']."");
     exit;  
   }
      
   //-----------------------
   // SCRIPT ACTION
   // Edit Blog
   //-----------------------

   if (isset($_POST['process']))
   {
     $title      = trim($_POST['title']);
     $comments   = trim($_POST['comments']);
     
     include(FOLDER_PATH.'classes/class_blog.inc.php');
           
     $MW_EDIT          = new Blog();
     $MW_EDIT->prefix  = $database['prefix'];
     
     if ($title=='')
     {
       $t_error = true;
     }
     if ($comments=='')
     {
       $c_error = true;
     }
     if (!isset($t_error) && !isset($c_error))
     {
       $MW_EDIT->update_blog_sql($_POST,$_GET['id']);

       updated($msg_edit2,
               'index.php?cmd=edit&id='.$_GET['id'],
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }

   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/edit.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;
      
   //-----------------
   // Case : Search
   //-----------------
   
   case 'search':
   
   isWebmasterLoggedIn();
   
   if (isset($_GET['search']))
   {
     $area        = $_GET['area'];
     $keywords    = trim($_GET['keywords']);
     $from_day    = $_GET['from_day'];
     $from_month  = $_GET['from_month'];
     $from_year   = $_GET['from_year'];
     $to_day      = $_GET['to_day'];
     $to_month    = $_GET['to_month'];
     $to_year     = $_GET['to_year'];
     
     if ($keywords)
     {
       if ($area=='blogs')
       {
         $SQL = "WHERE title LIKE '%".mysql_real_escape_string($keywords)."%' OR comments LIKE '%".mysql_real_escape_string($keywords)."%'";
       }
       else
       {
         $SQL = "WHERE name LIKE '%".mysql_real_escape_string($keywords)."%' OR comments LIKE '%".mysql_real_escape_string($keywords)."%'";
       }
       if ($from_day && $from_month && $from_year && $to_day && $to_month && $to_year)
       {
         $SQL .= " AND addDate BETWEEN '".checkValidDate($from_year."-".$from_month."-".$from_day)."' AND '".checkValidDate($to_year."-".$to_month."-".$to_day)."'";
       }
       
       // Search count..
       $q_count = mysql_query("SELECT count(*) AS s_count FROM ".$database['prefix'].$area." $SQL") or die(mysql_error());
       $COUNT = mysql_fetch_object($q_count); 
       
       // Search data..
       $q_search = mysql_query("SELECT * FROM ".$database['prefix'].$area." 
                                $SQL 
                                LIMIT $limitvalue,$SETTINGS->total") or die(mysql_error());
       
       if (mysql_num_rows($q_search)>0)
       {
         $SEARCH_RESULTS = true;
       }
       else
       {
         $NO_RESULTS = true;
       }
     }
     else
     {
       header("Location: index.php?cmd=search");
     }
   }
   
   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/search.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;   
      
   //-----------------
   // Case : Settings
   //-----------------

   case "settings":
      
   isWebmasterLoggedIn();
   
   // Clear Profile Image
   if (isset($_GET['clear']))
   {
     include(FOLDER_PATH.'classes/class_settings.inc.php');

     $MW_SETTINGS          = new programSettings();
     $MW_SETTINGS->prefix  = $database['prefix'];
     
     $MW_SETTINGS->clear_file(RELATIVE_PATH,$SETTINGS->profileImage);
     
     header("Location: index.php?cmd=settings");
     exit;
   }

   //-----------------------
   // SCRIPT ACTION
   // Update Settings
   //-----------------------

   if (isset($_POST['process']))
   {
     $name        = trim($_POST['name']);
     $email       = trim($_POST['email']);
     $website     = trim($_POST['website']);
     $blogname    = trim($_POST['blogname']);
     $w_path      = trim($_POST['w_path']);
     $t_name      = $_FILES['pfile']['tmp_name'];
     $f_name      = $_FILES['pfile']['name'];
     
     include(FOLDER_PATH.'classes/class_settings.inc.php');

     $MW_SETTINGS          = new programSettings();
     $MW_SETTINGS->prefix  = $database['prefix'];
     $MW_SETTINGS->file    = $f_name;
     $MW_SETTINGS->temp    = $t_name;

     if ($name=='')
     {
       $error_string[] = $msg_settings10;
     }
     if (!eregi("^([a-z]|[0-9]|\.|-|_)+@([a-z]|[0-9]|\.|-|_)+\.([a-z]|[0-9]){2,4}$", $email))
     {
       $error_string[] = $msg_settings11;
     }
     if ($website=='')
     {
       $error_string[] = $msg_settings12;
     }
     if ($blogname=='')
     {
       $error_string[] = $msg_settings17;
     }
     if ($w_path=='')
     {
       $error_string[] = $msg_settings19;
     }
     
     if (!empty($error_string))
     {
       error($msg_script5,
             $error_string,
             $msg_script7,
             $msg_charset
             );
     }
     else
     {
       $MW_SETTINGS->update_sql($_POST);
       
       // Upload profile image..
       if ($t_name && $f_name)
       {
         $MW_SETTINGS->upload_file(RELATIVE_PATH,$SETTINGS->profileImage);
       }

       updated($msg_settings15,
               'index.php?cmd=settings',
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }

   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/settings.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;
      
   //-----------------
   // Case : Showblogs
   //-----------------

   case "showblogs":
      
   isWebmasterLoggedIn();
      
   //-----------------------
   // SCRIPT ACTION
   // Remove Selected Blogs
   //-----------------------

   if (isset($_POST['process']))
   {
     $blogid = isset($_POST['blogid']) ? $_POST['blogid'] : '';
           
     if (empty($blogid))
     {
       error($msg_script5,
             array($msg_showblogs12),
             $msg_script7,
             $msg_charset
             );
     }
     else
     {
       mysql_query("DELETE FROM ".$database['prefix']."blogs 
                    WHERE id IN (".implode(",",$blogid).") 
                    ") or die(mysql_error());
       mysql_query("DELETE FROM ".$database['prefix']."comments 
                    WHERE postid IN (".implode(",",$blogid).")
                    ") or die(mysql_error());
       
       updated($msg_showblogs13,
               'index.php?cmd=showblogs',
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }
      
   $orderby = isset($_GET['orderby']) ? strip_tags($_GET['orderby']) : 'id';
      
   switch ($orderby)
   {
     case "id":
     $sql_order  = 'ORDER BY id DESC';
     break;

     case "title":
     $sql_order  = 'ORDER BY title';
     break;

     case "date":
     $sql_order  = 'ORDER BY postdate';
     break;
   }

   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/showblogs.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;
      
   //---------------------
   // Case : Showcomments
   //---------------------

   case "showcomments":
      
   isWebmasterLoggedIn();
      
   $orderby = isset($_GET['orderby']) ? strip_tags($_GET['orderby']) : 'id';
      
   switch ($orderby)
   {
     case "id":
     $sql_order     = 'ORDER BY id DESC';
     break;

     case "title":
     $sql_order     = 'ORDER BY title';
     break;

     case "comments":
     $sql_order     = 'ORDER BY comments';
     break;

     case "count":
     $sql_order     = 'ORDER BY count DESC';
     break;
   }

   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/showcomments.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;
      
   //--------------------
   //Case : Addcomments
   //--------------------

   case "addcomments":
      
   isWebmasterLoggedIn();
   
   // Delete comments..
   if (isset($_GET['delete']))
   {
     mysql_query("DELETE FROM ".$database['prefix']."comments WHERE id = '".(int)$_GET['delete']."' LIMIT 1") or die(mysql_error());
   
     header("Location: index.php?cmd=addcomments&id=".$_GET['blog']."");
     exit;  
   }

   //-----------------------
   // SCRIPT ACTION
   // Add Admin Comment
   //-----------------------

   if (isset($_POST['process']))
   {
     $comments  = trim($_POST['comments']);
     
     include(FOLDER_PATH.'classes/class_blog.inc.php');

     $MW_COMMENTS          = new Blog();
     $MW_COMMENTS->prefix  = $database['prefix'];
     $MW_COMMENTS->date    = date($SETTINGS->dateformat,strtotime("".$SETTINGS->timeOffset." hours"));
           
     if ($comments)
     {
       $MW_COMMENTS->add_comments_sql($_POST,$_GET['id']);
                
       updated($msg_addcomments5,
               'index.php?cmd=addcomments&amp;id='.$_GET['id'],
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }

   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/addcomments.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;

   //--------------------
   // Case : Listcomments
   //--------------------

   case "listcomments":
      
   isWebmasterLoggedIn();
   
   //---------------------------
   // SCRIPT ACTION
   // Delete Multiple Comments
   //---------------------------

   if (isset($_POST['process']))
   {
     $commentid = isset($_POST['commentid']) ? $_POST['commentid'] : '';
           
     if (empty($commentid))
     {
       error($msg_script5,
             array($msg_listcomments3),
             $msg_script7,
             $msg_charset
             );
     }
     else
     {
       $post_data_id = array();

       for($i=0; $i<count($commentid); $i++)
       {
         $post_data_id[] = explode("##", $commentid[$i]);
       }

       for ($i=0; $i<count($post_data_id); $i++)
       {
         mysql_query("UPDATE ".$database['prefix']."blogs SET
                      postdate  = '".$post_data_id[$i][1]."',
                      v_count   = (v_count-1)
                      WHERE id  = '".$post_data_id[$i][2]."'
                      LIMIT 1
                      ") or die(mysql_error());

         mysql_query("DELETE FROM ".$database['prefix']."comments 
                      WHERE id = '".$post_data_id[$i][0]."'
                      LIMIT 1") or die(mysql_error());
       }
                
       updated($msg_listcomments4,
               'index.php?cmd=listcomments',
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }
      
   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/listcomments.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;

   //--------------------
   // Case : Editcomments
   //--------------------

   case "editcomments":
      
   isWebmasterLoggedIn();

   //-----------------------
   // SCRIPT ACTION
   // Update Comments
   //-----------------------

   if (isset($_POST['process']))
   {
     $timestamp  = $_POST['timestamp'];
     $name       = strip_tags(trim($_POST['name']));
     $email      = trim($_POST['email']);
     $comments   = strip_tags(trim($_POST['comments']));

     include(FOLDER_PATH.'classes/class_blog.inc.php');

     $MW_UPDATE          = new Blog();
     $MW_UPDATE->prefix  = $database['prefix'];
           
     if ($comments)
     {
       $MW_UPDATE->update_comments_sql($_POST,$_GET['id']);

       updated($msg_editcomments3,
               'index.php?cmd=editcomments&amp;id='.$_GET['id'],
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }

   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/editcomments.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;
   
   //--------------------
   // Case : Favourites
   //--------------------
   
   case 'favourites':
   
   isWebmasterLoggedIn();
   
   //-----------------------
   // SCRIPT ACTION
   // Add Favourite
   //-----------------------
   
   if (isset($_POST['process']))
   {
     $name = trim($_POST['name']);
     $url  = trim($_POST['url']);
     
     if ($name=='')
     {
       $error_string[] = $msg_favourites10;
     }
     if ($url=='' || $url=='http://')
     {
       $error_string[] = $msg_favourites11;
     }
     if ($error_string)
     {
       error($msg_script5,
             $error_string,
             $msg_script7,
             $msg_charset
             );
     }
     else
     {
       include(FOLDER_PATH.'classes/class_favourites.inc.php');

       $MW_FAVE          = new Favourites();
       $MW_FAVE->prefix  = $database['prefix'];
       
       $MW_FAVE->add_fave_sql($_POST);
       
       updated($msg_favourites12,
               'index.php?cmd=favourites',
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }
   
   //-----------------------
   // SCRIPT ACTION
   // Update Favourite
   //-----------------------
   
   if (isset($_POST['update']))
   {
     $id   = $_POST['id'];
     $name = trim($_POST['name']);
     $url  = trim($_POST['url']);
     
     if ($name=='')
     {
       $error_string[] = $msg_favourites10;
     }
     if ($url=='' || $url=='http://')
     {
       $error_string[] = $msg_favourites11;
     }
     if ($error_string)
     {
       error($msg_script5,
             $error_string,
             $msg_script7,
             $msg_charset
             );
     }
     else
     {
       include(FOLDER_PATH.'classes/class_favourites.inc.php');

       $MW_FAVE          = new Favourites();
       $MW_FAVE->prefix  = $database['prefix'];
       
       $MW_FAVE->update_fave_sql($_POST);
       
       updated($msg_favourites13,
               'index.php?cmd=favourites&edit='.$id,
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }
   
   //-----------------------
   // SCRIPT ACTION
   // Delete Favourites
   //-----------------------
   
   if (isset($_POST['remove']))
   {
     $faveid = isset($_POST['faveid']) ? $_POST['faveid'] : '';
     
     if (!empty($faveid))
     {
       mysql_query("DELETE FROM ".$database['prefix']."favourites 
                    WHERE id IN(".implode(",",$faveid).")
                    ") or die(mysql_error());
                    
       updated($msg_favourites14,
               'index.php?cmd=favourites',
               $msg_script4,
               $msg_script6,
               $msg_charset
               );             
     }
     
     header("Location: index.php?cmd=favourites");
   }
   
   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/favourites.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;

   //-----------------
   // Case : Login
   //-----------------

   case "login":
      
   if (isset($_SESSION['weblog_user']))
   {
     header("Location: index.php");
     exit;
   }

   //-----------------------
   // SCRIPT ACTION
   // Login
   //-----------------------

   if (isset($_POST['process']))
   {
     $username = $_POST['username'];
     $password = $_POST['password'];
     $cookie   = isset($_POST['cookie']) ? 1 : 0;

     include(FOLDER_PATH.'inc/password.inc.php');

     if ($admin_username != encrypt($username))
     {
       $error_string[] = $msg_login6;
     }
     if ($admin_password != encrypt($password))
     {
       $error_string[] = $msg_login7;
     }
     if ($error_string)
     {
       error($msg_script5,
             $error_string,
             $msg_script7,
             $msg_charset
             );
     }
     else
     {
       $_SESSION['weblog_user'] = $username;

       if ($cookie)
       {
         setcookie($database['cookieName'], encrypt($database['cookieKey']), time()+60*60*24*30);
       }

       updated($msg_login8,
               'index.php',
               $msg_script4,
               $msg_script6,
               $msg_charset
               );
     }
   }

   include(FOLDER_PATH.'inc/header.php');
   include(FOLDER_PATH.'data_files/login.php');
   include(FOLDER_PATH.'inc/footer.php');
   break;

   //--------------------
   // CASE: Logout
   //--------------------

   case "logout":

   session_unset();
   session_destroy();

   if (isset($_COOKIE[$database['cookieName']]))
   {
     setcookie($database['cookieName'], "");
   }

   unset ($_SESSION);

   header("Location: index.php?cmd=login");

   break;
 }

?>