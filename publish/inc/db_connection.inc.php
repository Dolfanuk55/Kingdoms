<?php

/* ---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Database Connection File
  ---------------------------------------------- */

$database = array();

//========================================================================================================
// NOTE: EDIT YOUR SQL CONNECTION INFORMATION BELOW. THE VARIABLES ARE ARRAY VARIABLES AND MUST NOT
// BE CHANGED. IE: $database['username']. DO NOT CHANGE THESE NAMES. ONLY THE VALUES SHOULD BE CHANGED
//========================================================================================================
//------------------------------------------------------
// HOST
// This is usually localhost or your server ip address
// Example: $database['host'] = 'localhost';
//------------------------------------------------------

$database['host'] = 'miamikingdoms.db.10391297.hostedresource.com';

//----------------------------------------------
// USERNAME
// Username assigned to database
// Example: $database['username'] = 'david';
//----------------------------------------------

$database['username'] = 'miamikingdoms';

//----------------------------------------------
// PASSWORD
// Password assigned to database
// Example: $database['password'] = 'abc1234';
//----------------------------------------------

$database['password'] = 'Charlie0101!';

//----------------------------------------------
// DATABASE NAME
// Name of Database that holds tables
// Example: $database['database'] = 'weblog';
//----------------------------------------------

$database['database'] = 'miamikingdoms';

//----------------------------------------------
// TABLE PREFIX
// For people with only 1 database
// Example: $database['prefix'] = 'mw_';
// DO NOT comment this line out. It is important
//  to the script.
//----------------------------------------------

$database['prefix'] = 'mw_';

//----------------------------------------------
// COOKIE SANITATION
// Choose secret key for cookie and cookie name.
// The longer and more complex the better..
// Random characters or phrase for key
//----------------------------------------------

$database['cookieName'] = 'mw_cookie';
$database['cookieKey'] = 'hfgfyf[]f[9874hg36g88sgsfdt00kfte';

//================================
// DO NOT EDIT BELOW THIS LINE
//================================

$connect = @mysql_connect($database['host'], $database['username'], $database['password']);

if (!$connect) {
    die(mysql_error());
}
@mysql_select_db($database['database'], $connect) or die(mysql_error());
?>
