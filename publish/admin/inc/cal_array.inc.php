<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Weblog v4.0
  Written by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Website: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: cal_array.inc.php
  Description: Calendar Array

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

$days = array(
              '01',
              '02',
              '03',
              '04',
              '05',
              '06',
              '07',
              '08',
              '09',
              '10',
              '11',
              '12',
              '13',
              '14',
              '15',
              '16',
              '17',
              '18',
              '19',
              '20',
              '21',
              '22',
              '23',
              '24',
              '25',
              '26',
              '27',
              '28',
              '29',
              '30',
              '31',
              );
              
$months = array(
                '01' => $msg_calendar,
                '02' => $msg_calendar2,
                '03' => $msg_calendar3,
                '04' => $msg_calendar4,
                '05' => $msg_calendar5,
                '06' => $msg_calendar6,
                '07' => $msg_calendar7,
                '08' => $msg_calendar8,
                '09' => $msg_calendar9,
                '10' => $msg_calendar10,
                '11' => $msg_calendar11,
                '12' => $msg_calendar12
                );
                
$years = array();

for ($i=2007; $i<date("Y")+5; $i++)
{
  $years[] = $i;
}
               
?>
