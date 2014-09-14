<?php

/*-------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: English Language File
--------------------------------------*/

/******************************************************************************************************
 * LANGUAGE FILE - PLEASE READ                                                                        *
 * This is a language file for the Maian Weblog script. Edit it to suit your own preferences.         *
 * DO NOT edit the $msg variable names in any way and be careful NOT to remove any of the             *
 * apostrophe`s (') that contain the variable info. This will cause the script to malfunction.        *
 * USING APOSTROPHES IN MESSAGES                                                                      *
 * If you need to use an apostrophe, escape it with a backslash. ie: d\'apostrophe                    *
 * SYSTEM VARIABLES                                                                                   *
 * Single letter variables with a percentage sign or data in braces are system variables.             *
 * ie: %d, %s, {%d}, {count} etc                                                                      *
 * The system will not fail if you accidentally delete these, but some language may not display       *
 * correctly. DO NOT translate text between braces.                                                   *
 ******************************************************************************************************/

/*---------------------------------------------
  CHARACTER SET
  For encoding HTML characters
  Unless specified, this does not need altering
----------------------------------------------*/


$msg_charset               = 'utf-8';


//------------------------
// Theme/*/index.tpl.php
//------------------------
  
  
$msg_index                 = 'Tell a Friend'; 
$msg_index2                = 'View Comments'; 
$msg_index3                = '<b>{count}</b> comment(s)';


//--------------------------
// Theme/*/archive.tpl.php
//--------------------------


$msg_archive               = 'Viewing All Posts';
$msg_archive2              = 'Viewing All Posts For {month} {year}';
$msg_archive3              = 'A list of all blogs are shown below. Click a blog to view it.';
$msg_archive4              = 'A list of blogs for this month are shown below. Click a blog to view it.';


//------------------------
// Theme/*/contact.tpl.php
//------------------------
  
  
$msg_contact               = 'If you would like to contact me, please use the form below:';
$msg_contact2              = 'Name';
$msg_contact3              = 'E-Mail';
$msg_contact4              = 'Subject';
$msg_contact5              = 'Comments';
$msg_contact6              = 'Enter Code';
$msg_contact7              = 'Submit';
$msg_contact8              = 'Please enter your name..';
$msg_contact9              = 'Please enter a valid e-mail address..';
$msg_contact10             = 'Please enter a subject..';
$msg_contact11             = 'Please enter some comments..';
$msg_contact12             = 'Incorrect security code. Please try again..';
$msg_contact13             = 'Thank You!<br /><br />Your message has been sent. A reply will follow as soon as possible.';


//------------------------
// Theme/*/footer.tpl.php
//------------------------
  

$msg_public_footer        = 'XHTML 1.0';
$msg_public_footer2       = 'CSS';
  

//------------------------
// Theme/*/header.tpl.php
//------------------------


$msg_public_header         = 'Blogging system for your website...';
$msg_public_header2        = 'Home';
$msg_public_header3        = 'Profile';
$msg_public_header4        = 'Contact Me';
$msg_public_header5        = 'Archive';
$msg_public_header6        = 'Search Blog';
$msg_public_header7        = 'Search';
$msg_public_header8        = 'View My Profile';
$msg_public_header9        = 'Keywords';
$msg_public_header10       = 'View Archive for';
$msg_public_header11       = 'Advertisements';
$msg_public_header12       = 'RSS Feed';
$msg_public_header13       = 'Favourite Sites';
$msg_public_header14       = 'Menu';


//------------------------
// Theme/*/profile.tpl.php
//------------------------


$msg_profile               = 'Last Updated';


//------------------------
// Theme/*/print.tpl.php
//------------------------


$msg_print                 = 'Printer Friendly Version';


//------------------------
// Theme/*/search.tpl.php
//------------------------


$msg_publicsearch          = 'Search Results';
$msg_publicsearch2         = 'No Results Found';
$msg_publicsearch3         = 'There were no results found that matched your search query.<br /><br />Please try again seperating multiple keywords with a space for a more detailed search.';
$msg_publicsearch4         = 'Thank you, your search results are shown below:';
$msg_publicsearch5         = 'Displaying {count} results on {pages} page(s).';


//----------------------------------
// Theme/*/tell_a_friend.tpl.php
//----------------------------------


$msg_friend                = 'Tell a Friend';
$msg_friend2               = 'Your Name';
$msg_friend3               = 'Your E-Mail';
$msg_friend4               = 'Friends Name';
$msg_friend5               = 'Friends E-Mail';
$msg_friend6               = 'Please enter your friends name..';
$msg_friend7               = 'Incorrect security code. Please try again..';
$msg_friend8               = 'Your message has been sent to:<br /><br />
                              <b>{friend}</b><br />{email}<br /><br />
                              To recommend this blog to another friend, click <a href="javascript:history.go(-1)" title="Go Back"><u>here</u></a>.';
$msg_friend9               = 'There is no need to include the blog title or url, this is sent automatically.';
$msg_friend10              = 'THANK YOU!';
$msg_friend11              = '{name}, check out this blog!';


//----------------------------
// Theme/*/view_blog.tpl.php
//----------------------------


$msg_viewblog              = 'Posted by <b>{poster}</b> on {date}';
$msg_viewblog2             = 'There are no comments for this blog.';
$msg_viewblog3             = 'Comments are currently disabled for this blog.';
$msg_viewblog4             = 'Add Comments';
$msg_viewblog5             = 'Weblog Comment Notification!';
$msg_viewblog6             = 'If you enjoyed this blog, add it to your bookmarks:';
$msg_viewblog7             = 'Comments';
$msg_viewblog8             = 'View Blog';


//------------------------------
// admin/data_files/add.php
//------------------------------


$msg_add                   = 'Blog Title';
$msg_add2                  = 'Comments';
$msg_add3                  = 'Allow Visitor Comments';
$msg_add4                  = 'Notification if Comments are Posted';
$msg_add5                  = 'Please enter a blog title';
$msg_add6                  = 'Please enter some blog comments';
$msg_add7                  = 'New Blog Added!';
$msg_add8                  = 'Add a new blog entry below. Note that HTML may be used in the comments, but some HTML, 
                              while not upsetting the display, will cause the XHTML/CSS validation to break. If you
                              are unsure, keep to simple bold, url, underline and italic tags only and disable the <acronym title="What You See Is What You Get">WYSIWYG</acronym> editor.<br><br>
                              Click the link below to view tutorials on how to use the editor.';
$msg_add9                  = 'Enable WYSIWYG Editor';
$msg_add10                 = 'Disable WYSIWYG Editor';
$msg_add11                 = 'WYSIWYG Editor Tutorials';


//-----------------------------------
// admin/data_files/addcomments.php
//-----------------------------------


$msg_addcomments           = 'Blog Comments';
$msg_addcomments2          = 'Disable comments after posting';
$msg_addcomments3          = 'This blog currently has 0 comments.';
$msg_addcomments4          = 'Original Blog';
$msg_addcomments5          = 'Comments Added!';
$msg_addcomments6          = 'View';
$msg_addcomments7          = 'Add a new comment for this blog below.';
$msg_addcomments8          = 'Date Posted';
$msg_addcomments9          = 'Posted by <b>{poster}</b> on {date}.';


//----------------------------------
// admin/data_files/favourites.php
//----------------------------------


$msg_favourites            = 'This feature enables you to show a list of your favourite sites in the right hand column on your blog. If no sites are specified, this feature is disabled. Manage your favourite sites below.';
$msg_favourites2           = 'Site Name';
$msg_favourites3           = 'Site URL';
$msg_favourites4           = 'Add Favourite Site';
$msg_favourites5           = 'Update Site';
$msg_favourites6           = 'List of Favourite Sites';
$msg_favourites7           = 'Max 200 Chars';
$msg_favourites8           = 'There are currently 0 favourite sites.';
$msg_favourites9           = 'Remove Selected Favourites';
$msg_favourites10          = 'Please enter a site name..';
$msg_favourites11          = 'Please enter a site url..';
$msg_favourites12          = 'Favourite Successfully Added!';
$msg_favourites13          = 'Favourite Successfully Updated!';
$msg_favourites14          = 'Selected Favourites Deleted!';


//------------------------------
// admin/data_files/home.php
//------------------------------


$msg_adminhome             = '<b>WARNING!</b><br><br>Please remove the &#039;/install/&#039; folder from your installation directory.';
$msg_adminhome2            = 'Welcome to Maian Weblog, a simple blog system that enables you to post your thoughts on your website. Use the links
                              on the menu to manage your system. [<b>?</b>] links can be clicked for help. This is aimed to be a nice simple system, so please don&#096;t expect too many advanced features in the future. :)<br><br>
                              For details on how to get started with your blog system, please see the <a href="../docs/setup/" target="_blank" title="Documentation"><u>documentation</u></a>. If you have any problems, please use the support link on the menu.
                              ';
$msg_adminhome3            = 'Donations';
$msg_adminhome4            = 'If you like this script and would like to send a small donation as a token of appreciation, please click the following link:';
$msg_adminhome5            = 'Donations help towards to continued development of Maian Weblog.<br><br>Hope you enjoy this script,<br><br>David.';
$msg_adminhome6            = 'Latest {count} Blogs';


//------------------------------
// admin/data_files/edit.php
//------------------------------


$msg_edit                  = 'Update Blog';
$msg_edit2                 = 'Blog Updated!';
$msg_edit3                 = 'Back to Entries';
$msg_edit4                 = 'Update this blog entry below. Note that HTML may be used in the comments, but some HTML, 
                              while not upsetting the display, will cause the XHTML/CSS validation to break. If you
                              are unsure, keep to simple bold, url, underline and italic tags only and disable the <acronym title="What You See Is What You Get">WYSIWYG</acronym> editor.<br><br>
                              Click the link below to view tutorials on how to use the editor.';


//------------------------------------
// admin/data_files/editcomments.php
//------------------------------------


$msg_editcomments          = 'Name';
$msg_editcomments2         = 'Update Comments';
$msg_editcomments3         = 'Comments Updated!';
$msg_editcomments4         = 'Comment Deleted!';
$msg_editcomments5         = 'Update this comment below. Note that HTML may be used in the comments, but some HTML, 
                              while not upsetting the display, will cause the XHTML/CSS validation to break. If you
                              are unsure, keep to simple bold, url, underline and italic tags only.';
$msg_editcomments6         = 'Back to Comments';
$msg_editcomments7         = 'Max 50 Chars';
$msg_editcomments8         = 'Max 250 Chars';


//------------------------------------
// admin/data_files/listcomments.php
//------------------------------------


$msg_listcomments          = 'Total';
$msg_listcomments2         = 'Remove Selected Comments';
$msg_listcomments3         = 'Please select at least 1 comment for removal';
$msg_listcomments4         = 'Selected Comments Removed!';
$msg_listcomments5         = 'This blog currently has {count} comments.';


//------------------------------
// admin/inc/footer.php
//------------------------------


$msg_footer                = 'Back to Main Page';


//------------------------------
// admin/inc/header.php
//------------------------------


$msg_header                = 'Settings';
$msg_header2               = 'Blog Management';
$msg_header3               = 'View Weblog';
$msg_header4               = 'Logout';
$msg_header5               = 'Add New Blog';
$msg_header6               = 'Edit/Delete Blogs';
$msg_header7               = 'Add New Comments';
$msg_header8               = 'Edit/Delete Comments';
$msg_header9               = 'Home';
$msg_header10              = 'Support';
$msg_header11              = 'Menu';
$msg_header12              = 'Administration';
$msg_header13              = 'SYSTEM MENU';
$msg_header14              = 'Search Weblog';
$msg_header15              = 'Favourite Sites';


//-------------------------------------
// admin/data_files/listcomments.php
//-------------------------------------


$msg_listcomments          = 'Here you can update or delete any comments in the system.';


//------------------------------
// admin/data_files/login.php
//------------------------------


$msg_login                 = 'Administration Login';
$msg_login2                = 'Username';
$msg_login3                = 'Password';
$msg_login4                = 'Set Cookie?';
$msg_login5                = 'Login';
$msg_login6                = 'Invalid Username. Please try again.';
$msg_login7                = 'Invalid Password. Please try again.';
$msg_login8                = 'Login Successful!';
$msg_login9                = 'Not Logged In!';
$msg_login10               = 'Log in to your administration area below:';


//--------------------------------
// admin/data_files/settings.php
//--------------------------------


$msg_settings              = 'Settings';
$msg_settings2             = 'Your Name';
$msg_settings3             = 'E-Mail Address';
$msg_settings4             = 'Website Name';
$msg_settings5             = 'Date Format';
$msg_settings6             = 'Language';
$msg_settings7             = 'Entries Per Page';
$msg_settings8             = 'Update Settings';
$msg_settings9             = 'Date/Time Example';
$msg_settings10            = 'Please enter your name';
$msg_settings11            = 'Please enter your valid e-mail address';
$msg_settings12            = 'Please enter your website name';
$msg_settings13            = 'Search Engine Friendly URLs';
$msg_settings14            = 'Enable Captcha';
$msg_settings15            = 'Settings Updated!';
$msg_settings16            = 'Blog Name';
$msg_settings17            = 'Please enter a name for your blog';
$msg_settings18            = 'Blogs to show on Homepage';
$msg_settings19            = 'Please include your website path';
$msg_settings20            = 'Update your program settings below:';
$msg_settings21            = 'SMTP Settings';
$msg_settings22            = 'Enable SMTP';
$msg_settings23            = 'SMTP Host';
$msg_settings24            = 'SMTP Username';
$msg_settings25            = 'SMTP Password';
$msg_settings26            = 'SMTP Port';
$msg_settings27            = 'General Settings';
$msg_settings28            = 'Profile';
$msg_settings29            = 'If applicable, enter your profile information below. HTML may be used here, but note that the use of some HTML code will not upset the actual display, but
                              it may break the validation for the XHTML/CSS code. If you are unsure, use simple tags such as bold, italic, link and/or underline.';
$msg_settings30            = 'Time Offset';
$msg_settings31            = 'Installation Path';
$msg_settings32            = 'Choose Theme';
$msg_settings33            = 'Profile Image';
$msg_settings34            = 'View Profile Page';
$msg_settings35            = 'Upload a profile image if you want people to see your picture. A preview will appear on the right. Upload again to overwrite or click picture to clear.';
$msg_settings36            = 'Adsense/Snap Code';
$msg_settings37            = 'Maian Weblog enables you to include <a href="http://www.google.co.uk/intl/en/ads/" target="_blank" title="Adsense"><u>Adsense</u></a> or <a href="http://www.snap.com/about/shots.php" target="_blank" title="Adsense"><u>SNAP</u></a> code to your blog. Adsense can earn some revenue if visitors click your links and is a good idea
                              if you have lots of visitors. SNAP code creates a preview popup when anyone hovers their cursor over an <b>external</b> link on your site. Click the links for more information. Leave blank to disable.';
$msg_settings38            = 'Adsense Code';
$msg_settings39            = 'Snap Code';
$msg_settings40            = 'If enabled, adsense displays in right hand column beneath archive.';
$msg_settings41            = 'If enabled, works for all external links ONLY.';
$msg_settings42            = 'Total Archive Links in Menu';
$msg_settings43            = 'Order Comments By';
$msg_settings44            = 'Ascending';
$msg_settings45            = 'Descending';
$msg_settings46            = 'Display sizes for image in pixels. Set as 0 for full size:';
$msg_settings47            = 'Width';
$msg_settings48            = 'Height';
$msg_settings49            = 'Total Blogs for RSS Feed';
$msg_settings50            = 'Meta Keywords';
$msg_settings51            = 'Meta Description';
$msg_settings52            = 'Auto Parse Links in Comments';
$msg_settings53            = 'Enable Bookmark Links';


//----------------------------------
// admin/data_files/search.php
//----------------------------------


$msg_search                = 'This function lets you search your weblog. Useful if you have lots of entries and are trying to locate a specific one.';
$msg_search2               = 'Keywords';
$msg_search3               = 'Where date posted between';
$msg_search4               = 'Search Area';
$msg_search5               = 'Blogs';
$msg_search6               = 'Comments';
$msg_search7               = '<b>No Results Found.</b><br><br>No results have been found that matched your query. Please try again.';
$msg_search8               = 'Search Results';
$msg_search9               = 'Your search results are shown below. Click the link if you wish to perform a new search.';
$msg_search10              = 'New Search';
$msg_search11              = 'Blog Title';
$msg_search12              = 'Edit Blog';
$msg_search13              = 'Edit Comments';


//-----------------------------------
// admin/data_files/showblogs.php
//-----------------------------------


$msg_showblogs             = 'There are currently';
$msg_showblogs2            = 'blogs in the system';
$msg_showblogs3            = 'Order by';
$msg_showblogs4            = 'Title';
$msg_showblogs5            = 'Comments';
$msg_showblogs6            = 'Date';
$msg_showblogs7            = 'Update or delete your blog entries below. Click the headings to change the order by options. Note that deleting a blog will also delete ALL comments attached to that blog!';
$msg_showblogs8            = 'Edit';
$msg_showblogs9            = 'Delete';
$msg_showblogs10           = 'There are currently 0 blogs in the system.';
$msg_showblogs11           = 'Remove Selected Blogs';
$msg_showblogs12           = 'Please select at least 1 blog for removal';
$msg_showblogs13           = 'Selected Blogs Deleted!';
$msg_showblogs14           = 'Blog Deleted!';


//-------------------------------------
// admin/data_files/showcomments.php
//-------------------------------------


$msg_showcomments          = 'comments in the system';
$msg_showcomments2         = 'Replies';
$msg_showcomments3         = 'Add';
$msg_showcomments4         = 'If you would like to add a new comment to any of your blogs, use the image links below.';


//--------------------------------------
// admin/data_files/popup/support.php
//--------------------------------------


$msg_support               = 'Script Support';
$msg_support2              = 'Before you request support, have you read the F.A.Q page in the documentation to see if your question
                              has already been answered?<br><br>If you ask a question that is answered in the F.A.Q. page your ticket will be ignored. Thank you.';
$msg_support3              = 'To open a support ticket click';
$msg_support4              = 'here';
$msg_support5              = 'You can also post on our support forums';
$msg_support6              = 'Support Forums';


//--------------------------------------
// General language variables
//--------------------------------------


$msg_script                = 'Maian Weblog';
$msg_script2               = 'v4.0';
$msg_script3               = 'Powered by';
$msg_script4               = 'Please wait....';
$msg_script5               = 'An error has occured';
$msg_script6               = 'Click here if you do not wish to wait';
$msg_script7               = 'Return to Previous Page';
$msg_script8               = 'Yes';
$msg_script9               = 'No';
$msg_script10              = 'Pages';
$msg_script11              = 'Back to Top';
$msg_script12              = 'Print';
$msg_script13              = 'E-Mail to a Friend';
$msg_script14              = 'All Rights Reserved';
$msg_script15              = 'Admin Home';
$msg_script16              = 'First';
$msg_script17              = 'Last';
$msg_script18              = 'Close Window';
$msg_script19              = '<b>Error!! PHPv4.3 or higher is required for processing to function correctly!</b><br /><br />Your version is: v'.phpversion();
$msg_script20              = '<b>Maian Weblog Template Load Error!</b><br /><br />The following templates appears to be missing:<br /><br /><b>{list}</b>.<br /><br />If you are creating a new theme and don`t need a template, create a blank template file which acts as a placeholder. See the docs for more info.';


//-----------------------------
// RSS Feeds
//-----------------------------


$msg_rss                   = 'Latest blogs @ {website_name}';
$msg_rss2                  = 'These are the latest blogs to be posted at {website_name}';
$msg_rss3                  = 'Blog: ';


//-----------------------------
// Calendar months
//-----------------------------


$msg_calendar              = 'January';
$msg_calendar2             = 'February';
$msg_calendar3             = 'March';
$msg_calendar4             = 'April';
$msg_calendar5             = 'May';
$msg_calendar6             = 'June';
$msg_calendar7             = 'July';
$msg_calendar8             = 'August';
$msg_calendar9             = 'September';
$msg_calendar10            = 'October';
$msg_calendar11            = 'November';
$msg_calendar12            = 'December';


//---------------------------------------------------------------------------------------------------------
// JAVASCRIPT VARIABLES
// IMPORTANT: If you want to use apostrophes in these variables, you MUST escape them with 3 backslashes
//            Failure to do this will result in the script malfunctioning on javascript code.
// EXAMPLE: d\\\'apostrophe
//---------------------------------------------------------------------------------------------------------


$msg_javascript            = 'Are you sure?';
$msg_javascript2           = 'Enter E-Mail Address';
$msg_javascript3           = 'Enter Website Name';
$msg_javascript4           = 'Enter URL';
$msg_javascript5           = 'Enter Path to Image';
$msg_javascript6           = 'Help/Information';
$msg_javascript7           = 'This will keep you logged in for 30 days.<br><br><b>NOT</b> recommended for shared computers.<br><br>Cookies MUST be enabled.';
$msg_javascript8           = 'For details on how to create themes, see the documentation.';
$msg_javascript9           = 'Full url path to weblog installation. NO trailing slash. ie:<br><br><b>http://www.yoursite.com/weblog</b>';
$msg_javascript10          = 'This is the PHP date function. For more information, click <a href=\\\'http://uk2.php.net/date\\\' target=\\\'_blank\\\'><u>here</u></a>.';
$msg_javascript11          = 'If you are using the time functions for the date and the time is not displaying correctly, specify offset. ie:<br><br><b>+2</b> = Adds 2 hrs to time<br><b>-3</b> = Subtracts 3hrs from time.';
$msg_javascript12          = 'Select Yes to enable SMTP. This overwrites the PHP mail function and uses your SMTP settings to send mail. Note that some servers require authentication.';
$msg_javascript13          = 'The GD Library with Freetype support must be enabled for the captcha code to function correctly. See the documentation for help.';
$msg_javascript14          = 'For this to work, your server MUST support .htaccess. If it doesn`t you may see an internal server error.<br><br>If your server doesn`t support .htaccess, you should remove the .htaccess file from your installation directory and set this option to \\\'No\\\'.';
$msg_javascript15          = 'Clear Profile Image?';
$msg_javascript16          = 'Disable WYSIWYG Editor?';
$msg_javascript17          = 'Enable WYSIWYG Editor?';
$msg_javascript18          = 'Specify how many archive link to show in the right hand menu. Set to 0 to show all archive links. Max 999.';
$msg_javascript19          = 'Specify how you want the comments to display on the blog pages. Ascending displays the latest comment at the bottom, Descending displays it at the top.';
$msg_javascript20          = 'Meta keywords are used by search engines. They are search keywords or phrases that can help people find your site. Seperate each word or phrase with a comma.<br><br>Optional.';
$msg_javascript21          = 'The Meta description is also used by search engines. Ideally its a short sentence that describes your site and appears on search result pages.<br><br>Optional.';
$msg_javascript22          = 'If enabled, static mailto/hyperlinks in comments are auto converted to live links.';
$msg_javascript23          = 'Maian Weblog supports a number of bookmark sites. If enabled, links appear at the base of each blog entry. Specify which bookmarks you wish to enable. For more information, click the links.';

?>
