// Maian Weblog v4.0
// Javascript Functions
// Theme: Beautiful Day

// Pop Up Window

function popWindow(URL,LEFT,TOP,WIDTH,HEIGHT,SCROLLBARS,RESIZE) {
 day = new Date();
 id = day.getTime();
 eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=" + SCROLLBARS + ",location=0,statusbar=0,menubar=0,left=" + LEFT + ",top=" + TOP + ",screenX=0,screenY=0,resizable=" + RESIZE + ",width=" + WIDTH + ",height=" + HEIGHT + "');");
}

// This function allows links to open in a new window
// XHTML removed the target attribute and this is the fix
// Use rel="external" if you want links to open in new window

function externalLinks() {
 if (!document.getElementsByTagName) return;
 var anchors = document.getElementsByTagName("a");
 for (var i=0; i<anchors.length; i++) {
   var anchor = anchors[i];
   if (anchor.getAttribute("href") &&
       anchor.getAttribute("rel") == "external")
     anchor.target = "_blank";
 }
}
window.onload = externalLinks;
