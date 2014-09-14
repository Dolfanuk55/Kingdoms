<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Functions
----------------------------------------------*/

function isWebmasterLoggedIn() {
  global $database;
  if (!isset($_SESSION['weblog_user']) && !isset($_COOKIE[$database['cookieName']])) {
    header("Location: index.php?cmd=login");
    exit;
  } else {
    if (isset($_COOKIE[$database['cookieName']])) {
      if ($_COOKIE[$database['cookieName']]!=encrypt($database['cookieKey'])) {
        header("Location: index.php?cmd=login");
        exit;
      }
    }
  }
}

function encrypt($data) {
  return (function_exists('sha1') ? sha1($data) : md5($data));
}

//------------------
//FUNCTION: UPDATED
//------------------

function updated($string,$link,$pleasewait,$nowait,$charset)
{
  echo '<html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset='.$charset.'">
        <meta http-equiv="refresh" content="4;URL='.$link.'">
        <title>'.$pleasewait.'</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        </head>
        <body>
        <p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
        <div align="center">
        <table border="0" cellpadding="0" cellspacing="0" width="500" style="border: 1px solid #000000">
        <tr>
            <td align="center" class="tdcolor"><br><b>'.$string.'</b><br><br>'.$pleasewait.'<br><br>
            [<a href="'.$link.'"><u>'.$nowait.'</u></a>]<br><br>
            </td>
        </tr>
        </table>
        </div>
        </body>
        </html>
        ';
  exit;
}

//-----------------
//FUNCTION: ERROR
//-----------------

function error($string,$error=array(),$return,$charset)
{
  echo '<html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset='.$charset.'">
        <title>'.$string.'</title>
        <link rel="stylesheet" type="text/css" href="css/css.css">
        </head>
        <body>
        <p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
        <p align="center">&nbsp;</p>
        <div align="center">
        <table border="0" cellpadding="0" cellspacing="0" width="500" style="border: 1px solid #000000">
        <tr>
        <td align="center" class="tdcolor"><br><b>'.$string.'</b><br><br>
        <span class="error">
        ';
        
        // Loop through errors..

        foreach ($error as $showerror)
        {
            echo '&#149; '.$showerror.'<br>'."\n";
        }

  echo '</span>
        <br><br>
        [<a href="javascript:history.go(-1)"><u>'.$return.'</u></a>]<br><br></td>
        </tr>
        </table>
        </div>
        </body>
        </html>
        ';
        exit;
}

//=======================================
// FUNCTION: page_numbers()
// Displays page numbers
//=======================================

function page_numbers($count,$limit,$page,$stringVar='page')
{
  global $SETTINGS,$msg_script16,$msg_script17;

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

?>
