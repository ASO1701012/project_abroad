<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'notification'.DIRECTORY_SEPARATOR.'NotificationList.php');

class SendList
{

   public function selectSendlist(){

       $sql =  'SELECT school_name,school_number
                FROM school;';

       $db = new NotificationList();
       $ans = $db ->sendlist($sql);

       return $ans;
   }

}