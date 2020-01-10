<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'operation'.DIRECTORY_SEPARATOR.'ListAcquisitionDB.php');
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Utili'.DIRECTORY_SEPARATOR.'DBReturnValueConversion.php');
//require_once 'C:\xampp\htdocs\abroad_web\class\Model\account\operation\ListAcquisitionDB.php';
//require_once 'C:\xampp\htdocs\abroad_web\class\Utili\DBReturnValueConversion.php';

class TearcherListAcquisition
{

    public function allLearned()
    {
        $sql = '
            SELECT
                teacher.teacher_number,name,school_name,country_name,email
            FROM
                teacher
            INNER JOIN school ON teacher.school_number = school.school_number
            INNER JOIN teacher_responsible_country ON teacher.teacher_number = teacher_responsible_country.teacher_number
            INNER JOIN country ON teacher_responsible_country.country_number = country.country_number;';
        $db = new ListAcquisitionDB('teacher');
        $ans = $db->normalList($sql);
        return $ans;
    }

}