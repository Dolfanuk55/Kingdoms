<?php

include('../../inc/db_connection.inc.php');
$SETTINGS = mysql_fetch_object(mysql_query("SELECT language FROM ".$database['prefix']."settings 
                                            LIMIT 1
                                            ")) or die(mysql_error());
include('../../lang/'.$SETTINGS->language);

?>
/***********************************************
* Omni Slide Menu script - © John Davenport Scheuer
* very freely adapted from Dynamic-FX Slide-In Menu (v 6.5) script- by maXimus
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full original source code
* as first mentioned in http://www.dynamicdrive.com/forums
* username:jscheuer1
***********************************************/

//One global variable to set, use true if you want the menus to reinit when the user changes text size (recommended):
resizereinit=true;

menu[1] = {
id:'menu1', //use unique quoted id (quoted) REQUIRED!!
fontsize:'100%', // express as percentage with the % sign
linkheight:29 ,  // linked horizontal cells height
hdingwidth:250 ,  // heading - non linked horizontal cells width
bartext:'<?php echo $msg_header13; ?>',

menuItems:[ // REQUIRED!!
//[name, link, target, colspan, endrow?] - leave 'link' and 'target' blank to make a header
["<?php echo $msg_header11; ?>"], //create header
["<?php echo $msg_header9; ?>", "index.php", ""],
["<?php echo $msg_header10; ?>", "http://www.maianscriptworld.co.uk/forums", "_blank"],
["<?php echo $msg_header; ?>", "index.php?cmd=settings", ""],
["<?php echo $msg_header5; ?>", "index.php?cmd=add",""],
["<?php echo $msg_header6; ?>", "index.php?cmd=showblogs",""],
["<?php echo $msg_header7; ?>", "index.php?cmd=showcomments", ""],
["<?php echo $msg_header8; ?>", "index.php?cmd=listcomments", ""],
["<?php echo $msg_header15; ?>", "index.php?cmd=favourites", ""],
["<?php echo $msg_header14; ?>", "index.php?cmd=search", ""],
["<?php echo $msg_header4; ?>", "index.php?cmd=logout", ""]

]}; // REQUIRED!! do not edit or remove

////////////////////Stop Editing/////////////////

make_menus();
