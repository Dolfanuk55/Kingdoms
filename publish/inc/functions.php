<?php

/*----------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Functions
-----------------------------------*/

function checkValidDate($str) {
  $stamp = strtotime($str);
  if (!ctype_digit($stamp)) {
     return '0000-00-00';
  }
  $month = date( 'm', $stamp );
  $day   = date( 'd', $stamp );
  $year  = date( 'Y', $stamp );
  if (checkdate($month, $day, $year)) {
    return $str;
  }
  return '0000-00-00';
} 

//----------------------------
// Load favourite sites
// Added in v4.0
//----------------------------

function loadFavouriteSites()
{
  global $database,$SETTINGS,$msg_public_header13;
  
  $faves   = '';
  $sites   = '';
  $sites2  = '';
  
  // Are there favourites to display?
  $q_faves = mysql_query("SELECT * FROM ".$database['prefix']."favourites ORDER BY name") or die(mysql_error());

  if (mysql_num_rows($q_faves)>0)
  {
    while ($FAVES = mysql_fetch_object($q_faves))
    {
      $sites .= '- <a href="'.$FAVES->url.'" title="'.htmlspecialchars(cleanData($FAVES->name)).'">'.cleanData($FAVES->name).'</a><br />'."\n";
      $sites2 .= '<li><a href="'.$FAVES->url.'" title="'.htmlspecialchars(cleanData($FAVES->name)).'">'.cleanData($FAVES->name).'</a></li>'."\n"; 
    }
  
    $find     = array('{favourites}','{favourites_list}','{favourites_list_li}','{path}');
    $replace  = array($msg_public_header13,$sites,$sites2,$SETTINGS->w_path.'/themes/'.THEME);
    $faves    = str_replace($find,$replace,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/favourites.tpl'));
  }
  
  return $faves;
}

//------------------------------
// Load adsense code
// Added in v4.0
//------------------------------

function loadAdsense()
{
  global $SETTINGS,$msg_public_header11;
  $adsense = '';
  
  // Is adsense code present?
  if ($SETTINGS->adsense)
  {
    $find     = array('{advertisement}','{adsense_code}','{path}');
    $replace  = array($msg_public_header11,cleanData($SETTINGS->adsense),$SETTINGS->w_path.'/themes/'.THEME);
    $adsense  = str_replace($find,$replace,file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/adsense_code.tpl'));
  }
  
  return $adsense;
}

//------------------------------------------
// Loads bookmarking site links
// Added in v4.0
//------------------------------------------

function loadBookmarks($url='',$title='')
{
  global $SETTINGS,$msg_viewblog6;
  
  $bmarks = explode(",",$SETTINGS->bookmarks);
  
  $bookmarks = '';
  
  // Urlencode data in url string..
  $b_url    = urlencode($url);
  $b_title  = urlencode(cleanData($title));
  
  // Display sizes
  $width    = '16';
  $height   = '16';
  
  // Del.icio.us
  if (in_array('1',$bmarks)) { 
    $bookmarks = '<a href="http://del.icio.us/post?url='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/delicious.png" width="'.$width.'" height="'.$height.'" alt="Del.icio.us: '.cleanData($title).'" title="Del.icio.us: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Digg
  if (in_array('2',$bmarks)) { 
    $bookmarks .= '<a href="http://digg.com/submit?phase=2&amp;url='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/digg.png" width="'.$width.'" height="'.$height.'" alt="Digg: '.cleanData($title).'" title="Digg: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Spurl
  if (in_array('3',$bmarks)) { 
    $bookmarks .= '<a href="http://www.spurl.net/spurl.php?title='.$b_title.'&amp;url='.$b_url.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/spurl.png" width="'.$width.'" height="'.$height.'" alt="Spurl: '.cleanData($title).'" title="Spurl: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Wists
  if (in_array('4',$bmarks)) { 
    $bookmarks .= '<a href="http://wists.com/r.php?r='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/wists.png" width="'.$width.'" height="'.$height.'" alt="Wists: '.cleanData($title).'" title="Wists: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Simpy
  if (in_array('5',$bmarks)) { 
    $bookmarks .= '<a href="http://www.simpy.com/simpy/LinkAdd.do?href='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/simpy.png" width="'.$width.'" height="'.$height.'" alt="Simpy: '.cleanData($title).'" title="Simpy: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // My Web
  if (in_array('6',$bmarks)) { 
    $bookmarks .= '<a href="http://myweb2.search.yahoo.com/myresults/bookmarklet?u='.$b_url.'&amp;t='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/yahoo.png" width="'.$width.'" height="'.$height.'" alt="My Web: '.cleanData($title).'" title="My Web: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Newsvine
  if (in_array('7',$bmarks)) {
    $bookmarks .= '<a href="http://www.newsvine.com/_tools/seed&amp;save?u='.$b_url.'&amp;h='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/newsvine.png" width="'.$width.'" height="'.$height.'" alt="Newsvine: '.cleanData($title).'" title="Newsvine: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Blinklist
  if (in_array('8',$bmarks)) {
    $bookmarks .= '<a href="http://www.blinklist.com/index.php?Action=Blink/addblink.php&amp;Url='.$b_url.'&amp;Title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/blinklist.png" width="'.$width.'" height="'.$height.'" alt="Blinklist: '.cleanData($title).'" title="Blinklist: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Furl
  if (in_array('9',$bmarks)) {
    $bookmarks .= '<a href="http://www.furl.net/storeIt.jsp?u='.$b_url.'&amp;t='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/furl.png" width="'.$width.'" height="'.$height.'" alt="Furl: '.cleanData($title).'" title="Furl: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Reddit
  if (in_array('10',$bmarks)) {
    $bookmarks .= '<a href="http://reddit.com/submit?url='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/reddit.png" width="'.$width.'" height="'.$height.'" alt="Reddit: '.cleanData($title).'" title="Reddit: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Blogmarks
  if (in_array('11',$bmarks)) {
    $bookmarks .= '<a href="http://blogmarks.net/my/new.php?mini=1&amp;simple=1&amp;url='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/blogmarks.png" width="'.$width.'" height="'.$height.'" alt="Blogmarks: '.cleanData($title).'" title="Blogmarks: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Smarking
  if (in_array('12',$bmarks)) {
    $bookmarks .= '<a href="http://smarking.com/editbookmark/?url='.$b_url.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/smarking.png" width="'.$width.'" height="'.$height.'" alt="Smarking: '.cleanData($title).'" title="Smarking: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Google
  if (in_array('13',$bmarks)) {
    $bookmarks .= '<a href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/google.png" width="'.$width.'" height="'.$height.'" alt="Google: '.cleanData($title).'" title="Google: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Slashdot
  if (in_array('14',$bmarks)) {
    $bookmarks .= '<a href="http://slashdot.org/bookmark.pl?url='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/slashdot.png" width="'.$width.'" height="'.$height.'" alt="Slashdot: '.cleanData($title).'" title="Slashdot: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Netvouz
  if (in_array('15',$bmarks)) {
    $bookmarks .= '<a href="http://www.netvouz.com/action/submitBookmark?url='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/netvouz.png" width="'.$width.'" height="'.$height.'" alt="Netvouz: '.cleanData($title).'" title="Netvouz: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  // Shadows
  if (in_array('16',$bmarks)) {
    $bookmarks .= '<a href="http://www.shadows.com/features/tcr.htm?url='.$b_url.'&amp;title='.$b_title.'" rel="external"><img src="'.$SETTINGS->w_path.'/images/bookmarks/shadows.png" width="'.$width.'" height="'.$height.'" alt="Shadows: '.cleanData($title).'" title="Shadows: '.cleanData($title).'" class="bookmark_img" /></a>';
  }
  
  $data_file = file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/bookmarks.tpl');
  
  return str_replace(array('{text}','{bookmark_content}','{path}'),
                     array($msg_viewblog6,$bookmarks,$SETTINGS->w_path.'/themes/'.THEME),
                     $data_file
                     );
}

//------------------------------------------
// Auto parse links in comments if enabled
// Also wraps text if enabled
// Added in v4.0
//------------------------------------------

function autoParseLinks($data)
{
  global $SETTINGS;
  
  // Wrap text if higher than 0..
  if (WRAP_TEXT>0) 
  {
    $data = wordwrap($data,WRAP_TEXT,"\n",1);
  }
  
  // Is auto parsing enabled?
  if ($SETTINGS->parseLinks)
  {
    // This auto parses links beginning 'www'..
    $p1    = '#(^|\s\<br />)(www|WWW)\.([^\s<>\.]+)\.([^\s\n<>]+)#sm';
    $r1    = '\\1<a href="http://\\2.\\3.\\4" class="postLinks" title="\\2.\\3.\\4">\\2.\\3.\\4</a>';
    
    // This auto parses links beginning 'http://' or 'ftp://' or 'https://'..
    $p2    = '#(^|[^\"=\]]{1})(http|HTTP|ftp)(s|S)?://([^\s<>\.]+)\.([^\s<>]+)#sm';
    $r2    = '\\1<a href="\\2\\3://\\4.\\5" class="postLinks" title="\\2\\3://\\4.\\5">\\2\\3://\\4.\\5</a>';
    
    // This auto parses e-mail addresses..
    $e1    = '([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})';
    $e2    = '<a href="mailto:\\1" title="\\1" class="postLinks">\\1</a>';
    
    $data  = preg_replace($p1, $r1, $data);
    $data  = preg_replace($p2, $r2, $data);
    $data  = eregi_replace($e1, $e2, $data);
  }
  
  return $data;
}

//-----------------------------------
// Loads captcha data into string
// Added in v4.0
//-----------------------------------

function showCaptcha($lang,$error='')
{
  global $SETTINGS;
  
  $find     = array('{path}','{code}','{code_error}');
  $replace  = array($SETTINGS->w_path.'/',$lang,$error);
  $captcha  = file_get_contents(FOLDER_PATH.'themes/'.THEME.'/tpl_files/captcha.tpl');
  
  return ($SETTINGS->enableCaptcha ? str_replace($find,$replace,$captcha) : '');
}

//----------------------------------------------
// Parses blog title into url friendly string
// Added in v4.0
//----------------------------------------------

function addTitleToUrl($title)
{
  // Convert special characters from European countries into the English alphabetic equivalent..
  $chars = array(
   'Ñ'=>'Dj', '·'=>'A', 'µ'=>'A', '¶'=>'A', 'Ç'=>'A', 'Ž'=>'A', ''=>'A', '’'=>'A', '€'=>'C', 'Ô'=>'E', 
   ''=>'E', 'Ò'=>'E', 'Ó'=>'E', 'Þ'=>'I', 'Ö'=>'I', '×'=>'I', 'Ø'=>'I', '¥'=>'N', 'ã'=>'O', 'à'=>'O', 
   'â'=>'O', 'å'=>'O', '™'=>'O', ''=>'O', 'ë'=>'U', 'é'=>'U', 'ê'=>'U', 'š'=>'U', 'í'=>'Y', 'è'=>'B', 
   'á'=>'Ss', '…'=>'a', ' '=>'a', 'ƒ'=>'a', 'Æ'=>'a', '„'=>'a', '†'=>'a', '‘'=>'a', '‡'=>'c', 'Š'=>'e', 
   '‚'=>'e', 'ˆ'=>'e', '‰'=>'e', ''=>'i', '¡'=>'i', 'Œ'=>'i', '‹'=>'i', 'Ð'=>'o', '¤'=>'n', '•'=>'o', 
   '¢'=>'o', '“'=>'o', 'ä'=>'o', '”'=>'o', '›'=>'o', '—'=>'u', '£'=>'u', '–'=>'u', 'ì'=>'y', 'ì'=>'y', 
   'ç'=>'b', '˜'=>'y'
  );
			
  // Replace chars in array..
  $title = strtr($title, $chars);

  // Strip none alphabetic and none numeric chars..
  $title = strtolower(preg_replace('`[^\w_-]`', '-', $title));
  
  // Replace other data that may be passed, such as double hyphens..
  return str_replace(array('--','---','----','-amp-','-039-'),
                     array('-','-','-','-and-',''),
                     $title
                     );
}

//------------------------
// Display archive list
// Added in v4.0
//------------------------

function buildArchive($count=0)
{
  global $database,$msg_public_header10,$SETTINGS;
  $archive = array();
  $string  = '';
  $runtime = 0;
  
  // Get first post month/year..
  $query = mysql_query("SELECT archiveMonth,archiveYear 
                        FROM ".$database['prefix']."blogs 
                        ORDER BY archiveYear ASC
                        LIMIT 1") or die(mysql_error());
  $row = mysql_fetch_object($query);
  
  $years = range(date("Y"),$row->archiveYear);
  
  for ($i=0; $i<date("Y")-$row->archiveYear+1; $i++)
  {
    for ($j=13; $j>0; $j--)
    {
      // Only show month/year for archive if post actually exists..
      if (isPostLive($years[$i],($j<10 ? '0'.$j : $j)))
      {
        // Get count of blogs for each archive..
        if (SHOW_ARCHIVE_COUNT)
        {
          $a_count = archiveBlogCount($years[$i],($j<10 ? '0'.$j : $j));
        }
        
        $archive[] = '<li><a href="'.($SETTINGS->modR ? $SETTINGS->w_path.'/blog/'.($j<10 ? '0'.$j : $j).'/'.$years[$i].'/archive.html' : $SETTINGS->w_path.'/index.php?cmd=archive&amp;month='.($j<10 ? '0'.$j : $j).'&amp;year='.$years[$i]).'" title="'.$msg_public_header10.' '.getMonthName(($j<10 ? '0'.$j : $j)).' '.$years[$i].'">'.getMonthName(($j<10 ? '0'.$j : $j)).' '.$years[$i].(SHOW_ARCHIVE_COUNT ? ' ('.$a_count.')' : '').'</a></li>'."\n";
      }
    }
  }
  
  // Sort by key..
  ksort($archive);
  
  foreach ($archive AS $link)
  {
    // If count is greater than 0, only show specified links..
    if ($count>0)
    {
      if (++$runtime <= $count)
      {
        $string .= $link;
      }
    }
  }
  
  return $string;
}

//----------------------------------
// Get count of blogs for archive
// Added in v4.0
//----------------------------------

function archiveBlogCount($year,$month)
{
  global $database;
  
  $q_count = mysql_query("SELECT * FROM ".$database['prefix']."blogs
                          WHERE archiveMonth  = '$month'
                          AND archiveYear     = '$year' 
                          ") or die(mysql_error());
                          
  return mysql_num_rows($q_count);                        
}

//-------------------------
// Clean evil tags
// Added in v4.0
//-------------------------

function cleanEvilTags($data,$striptags=false)
{
  $data = preg_replace("/javascript/i", "j&#097;v&#097;script",$data);
  $data = preg_replace("/alert/i", "&#097;lert",$data);
  $data = preg_replace("/about:/i", "&#097;bout:",$data);
  $data = preg_replace("/onmouseover/i", "&#111;nmouseover",$data);
  $data = preg_replace("/onclick/i", "&#111;nclick",$data);
  $data = preg_replace("/onload/i", "&#111;nload",$data);
  $data = preg_replace("/onsubmit/i", "&#111;nsubmit",$data);
  $data = preg_replace("/<body/i", "&lt;body",$data);
  $data = preg_replace("/<html/i", "&lt;html",$data);
  $data = preg_replace("/document\./i", "&#100;ocument.",$data);

  return ($striptags ? strip_tags(trim($data)) : trim($data));
}

//-----------------------------
// Does post exist for month?
// Added in v4.0
//-----------------------------

function isPostLive($year,$month)
{
  global $database;
  
  $query = mysql_query("SELECT * FROM ".$database['prefix']."blogs
                        WHERE archiveMonth = '$month'
                        AND archiveYear    = '$year' 
                        LIMIT 1") or die(mysql_error());
  
  return (mysql_num_rows($query)>0 ? true : false);
}

//---------------------------------
// Get month name based on digit
// Added in v4.0
//---------------------------------

function getMonthName($num)
{
  global $msg_calendar,$msg_calendar2,$msg_calendar3,$msg_calendar4,$msg_calendar5,
         $msg_calendar6,$msg_calendar7,$msg_calendar8,$msg_calendar9,$msg_calendar10,
         $msg_calendar11,$msg_calendar12;

  switch($num){
   case '01': return $msg_calendar; break;
   case '02': return $msg_calendar2; break;
   case '03': return $msg_calendar3; break;
   case '04': return $msg_calendar4; break;
   case '05': return $msg_calendar5; break;
   case '06': return $msg_calendar6; break;
   case '07': return $msg_calendar7; break;
   case '08': return $msg_calendar8; break;
   case '09': return $msg_calendar9; break;
   case '10': return $msg_calendar10; break;
   case '11': return $msg_calendar11; break;
   case '12': return $msg_calendar12; break;
  }
}

//--------------------------------
// Displays page numbers
// Updated in v4.0
//--------------------------------

function public_page_numbers($count,$limit,$page,$stringVar='page')
{
  global $msg_script16,$msg_script17;

  $PaginateIt = new PaginateIt();
  $PaginateIt->SetCurrentPage($page);
  $PaginateIt->SetItemCount($count);
  $PaginateIt->SetItemsPerPage($limit);
  $PaginateIt->SetLinksToDisplay(35);
  $PaginateIt->SetQueryStringVar($stringVar);
  $PaginateIt->SetLinksFormat('&laquo; '.$msg_script16,
                              ' &bull; ',
                              $msg_script17.' &raquo;'
                              );

  return $PaginateIt->GetPageLinks();
}

//------------------------
// Clean up function
//------------------------

function cleanData($data,$lb=false)
{
  global $SETTINGS;
  
  // Auto convert line breaks if WYSIWYG is disabled when displaying data..
  // If enabled line breaks are automatically added..
  if (!$SETTINGS->wysiwyg && !$lb) {
    $data = nl2br($data);
  }
  
  // If wysiwyg was enabled and is then disabled and we are in edit mode, we need
  // to convert <br /> breaks back to new line chars..
  if ($lb) {
    $data = str_replace("<br />", define_newline(), $data);
  }
  
  return (get_magic_quotes_gpc() ? stripslashes($data) : $data);
}

//---------------------------------
// Defines new line character
// Added in v4.0
//---------------------------------

function define_newline()
{
  $unewline = "\r\n";

  if (strstr(strtolower($_SERVER["HTTP_USER_AGENT"]), 'win'))
  {
    $unewline = "\r\n";
  }
  else if (strstr(strtolower($_SERVER["HTTP_USER_AGENT"]), 'mac'))
  {
    $unewline = "\r";
  }
  else
  {
    $unewline = "\n";
  }

  return $unewline;
}

//-------------------------------------------
// Display template rendering error
//-------------------------------------------

function checkTemplatesAreLoading()
{
  global $msg_script20,$SETTINGS;
  
  $missing   = array();
  $templates = array(
                     'themes/'.THEME.'/archive.tpl.php',  
                     'themes/'.THEME.'/contact.tpl.php',
                     'themes/'.THEME.'/footer.tpl.php',
                     'themes/'.THEME.'/header.tpl.php',
                     'themes/'.THEME.'/index.tpl.php',
                     'themes/'.THEME.'/javascript.js',
                     'themes/'.THEME.'/print.tpl.php',
                     'themes/'.THEME.'/profile.tpl.php',
                     'themes/'.THEME.'/rss_style.css',
                     'themes/'.THEME.'/search.tpl.php',
                     'themes/'.THEME.'/styles.css',
                     'themes/'.THEME.'/tell_a_friend.tpl.php',
                     'themes/'.THEME.'/view_blog.tpl.php',
                     'themes/'.THEME.'/tpl_files/adsense_code.tpl',
                     'themes/'.THEME.'/tpl_files/blog_post.tpl',
                     'themes/'.THEME.'/tpl_files/bookmarks.tpl',
                     'themes/'.THEME.'/tpl_files/captcha.tpl',
                     'themes/'.THEME.'/tpl_files/comments.tpl',
                     'themes/'.THEME.'/tpl_files/favourites.tpl',
                     'themes/'.THEME.'/tpl_files/no_search_results.tpl',
                     'themes/'.THEME.'/tpl_files/page_numbers.tpl',
                     'themes/'.THEME.'/tpl_files/print_blog_post.tpl',
                     'themes/'.THEME.'/tpl_files/profile.tpl',
                     'themes/'.THEME.'/tpl_files/reply_box.tpl',
                     'themes/'.THEME.'/tpl_files/search_results.tpl',
                     'themes/'.THEME.'/tpl_files/search_results_header.tpl',
                     'themes/'.THEME.'/tpl_files/single_blog_post.tpl',
                     'themes/'.THEME.'/tpl_files/system_message.tpl'
                     );
  
  foreach ($templates AS $files)
  {
    if (!file_exists($files))
    {
      $missing[] = $files;
    }
  }
  
  if (!empty($missing))
  {
    echo '<p style="text-align:left;font-size:11px;border:1px solid #164677;padding:5px;background-color:#F0F6FF">'.str_replace(",","<br />",str_replace("{list}",implode(",",$missing),$msg_script20)).'</p>';
    exit;
  }
}

//----------------------------------------------------------
// Function check. Terminate if PHP version is too old
//----------------------------------------------------------

if (!function_exists('file_get_contents'))
{
  echo $msg_script19;
  exit;
}

// Recursive way of handling multi dimensional arrays..
// This cleans query string data and prevents code injections..
function multiDimensionalArrayMap($func,$arr) {
  $newArr = array();
  if (!empty($arr)) {
    foreach($arr AS $key => $value) {
      $newArr[$key] = (is_array($value) ? multiDimensionalArrayMap($func,$value) : $func($value));
    }
  }
  return $newArr;
}
if (!empty($_GET)) {
  $_GET  = multiDimensionalArrayMap('htmlspecialchars',$_GET);
}

?>
