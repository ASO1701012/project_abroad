<?php
require_once ($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'operation'.DIRECTORY_SEPARATOR.'ListRefineDB.php');


class OwnProfileLearning
{
    public function getProfile(){
        $sql = '
            SELECT
                name,school_name,email,country_name
            FROM
                %s
            INNER JOIN school ON teacher.school_number = school.school_number
            INNER JOIN teacher_responsible_country ON teacher.teacher_number = teacher_responsible_country.teacher_number
            INNER JOIN country ON teacher_responsible_country.country_number = country.country_number
            WHERE %s = %s;';
        $db = new ListRefineDB('teacher');
        $ans = $db->refineList($sql,'teacher.teacher_number',$_SESSION['user_id']);
        return $ans;
    }
}