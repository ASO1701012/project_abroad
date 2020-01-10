<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'notification'.DIRECTORY_SEPARATOR.'NotificationList.php');

class SendCourse
{

    public function selectSendCourse(){
        $sql = 'SELECT course_name,course_number
                FROM course_overview;';

        $db = new NotificationList();
        $ans = $db ->sendlist($sql);

        return $ans;
    }

}