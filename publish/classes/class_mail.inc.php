<?php

/*---------------------------------------------
  MAIAN WEBLOG v4.0
  Written by David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: www.maianscriptworld.co.uk
  This File: Mailing Class
  Added in v4.0
----------------------------------------------*/

include('class.phpmailer.php');

class mailClass {

                 var $vars = array();
                 var $smtp_host;
                 var $smtp_port;
                 var $smtp_user;
                 var $smtp_pass;
                 var $smtp;
                 var $html = false; // Set to true to use HTML in e-mail templates

                 //==============================
                 // Function: cleanData
                 // Param: 1
                 // Desc: Cleans slashes
                 //==============================

                 function cleanData($data)
                 {
                   return (get_magic_quotes_gpc() ? stripslashes($data) : $data);
                 }

                 //==============================
                 // Function: convertChar
                 // Param: 1
                 // Desc: Converts entities
                 //==============================

                 function convertChar($data)
                 {
                   $find    = array('&#039;','&quot;','&amp;','&lt;','&gt;');
                   $replace = array('\'','"','&','<','>');

                   return str_replace($find,$replace,$data);
                 }

                 //==============================
                 // Function: addTag
                 // Param: 2
                 // Desc: Loads tags into array
                 //==============================

                 function addTag($placeholder,$data)
                 {
                   $this->vars[$placeholder] = $data;
                 }
                 
                 //==============================
                 // Function: clearVars
                 // Param: 0
                 // Desc: Clears data vars
                 //==============================
                 
                 function clearVars()
                 {
                   $this->vars = array();
                 }

                 //==============================
                 // Function: convertTags
                 // Param: 1
                 // Desc: Converts tags
                 //==============================

                 function convertTags($data)
                 {
                   if (!empty($this->vars))
                   {
                     foreach ($this->vars AS $tags => $value)
                     {
                       $data = str_replace($tags,$value,$data);
                     }
                   }

                   return $data;
                 }

                 //==============================
                 // Function: mailHeaders
                 // Param: 2
                 // Desc: Mail header info
                 //==============================

                 function mailHeaders($name,$email)
                 {
                   if ($this->html) {
                     $headers  = "Content-type: text/html; charset=utf-8\r\n";
                     $headers .= "From: \"".$this->injectionCleaner($name)."\" <".$email.">\n";
                   } else {
                     $headers  = "Content-type: text/plain; charset=utf-8\r\n";
                     $headers .= "From: \"".$this->injectionCleaner($name)."\" <".$email.">\n";
                   }
                   
                   $headers .= "X-Sender: \"".$this->injectionCleaner($name)."\" <".$email.">\n";
                   $headers .= "X-Mailer: PHP\n";
                   $headers .= "X-Priority: 3\n";
                   $headers .= "X-Sender-IP: ".$_SERVER['REMOTE_ADDR']."\n";
                   $headers .= "Return-Path: \"".$this->injectionCleaner($name)."\" <".$email.">\n";
                   $headers .= "Reply-To: \"".$this->injectionCleaner($name)."\" <".$email.">\n";

                   return $headers;
                 }

                 //==============================
                 // Function: injectionCleaner
                 // Param: 1
                 // Desc: Cleans spam input
                 //==============================

                 function injectionCleaner($data)
                 {
                   $find     = array(
                                     "\r",
                                     "\n",
                                     "%0a",
                                     "%0d",
                                     "content-type:",
                                     "Content-Type:",
                                     "BCC:",
                                     "CC:",
                                     "TO:",
                                     "bcc:",
                                     "to:",
                                     "cc:"
                                     );

                   $replace  = array();

                   return str_replace($find,$replace,$data);
                 }

                 //==============================
                 // Function: template
                 // Param: 1
                 // Desc: Loads e-mail template
                 //==============================

                 function template($file)
                 {
                   if (!function_exists('file_get_contents'))
                   {
                     echo '<b>Error!! PHPv4.3 or higher is required for processing to function correctly!</b><br><br>';
                     echo 'Your version is: v'.phpversion();
                     exit;
                   }

                   $email_string = file_get_contents($file);

                   if ($email_string)
                   {
                     return $this->convertTags($email_string);
                   }
                   else
                   {
                     die("An error occured opening the <b>'$file'</b> file. Check that this file exists in the 'templates/email/' folder!");
                   }
                 }

                 //=======================================================================
                 // Function: sendMail
                 // Param: 7
                 // Desc: Sends mail
                 // If you are testing the script on localhost and you don`t have mail 
                 //  capabilities, set the $email var to false to disable mail sending.
                 //=======================================================================

                 function sendMail($to_name,$to_email,$from_name,
                                   $from_email,$subject,$msg,$email=true)
                 {
                   if ($email)
                   {
                     if ($this->smtp)
                     {
                       $MAILER = new PHPMailer();

                       $MAILER->IsSMTP();
                       $MAILER->IsHTML($this->html);
                       $MAILER->Port       = $this->smtp_port;
                       $MAILER->Host       = $this->smtp_host;
                       $MAILER->SMTPAuth   = ($this->smtp_user && $this->smtp_pass ? true : false);
                       $MAILER->Username   = $this->smtp_user;
                       $MAILER->Password   = $this->smtp_pass;
                       $MAILER->From       = $from_email;
                       $MAILER->FromName   = $this->convertChar($this->cleanData($this->injectionCleaner($from_name)));
                       $MAILER->AddAddress($to_email, $this->convertChar($this->cleanData($this->injectionCleaner($to_name))));
                       $MAILER->WordWrap   = 1000;
                       $MAILER->Subject    = $this->convertChar($this->cleanData($subject));
                       $MAILER->Body       = $this->convertChar($this->cleanData($msg));
                       $MAILER->Send();
                     }
                     else
                     {
                       mail($to_email, 
                            $this->convertChar($this->cleanData($subject)), 
                            $this->convertChar($this->cleanData($msg)), 
                            $this->mailHeaders($this->cleanData($this->convertChar($from_name)),$from_email)
                            );
                     }
                   }
                 }
}

?>
