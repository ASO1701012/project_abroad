<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'operation'.DIRECTORY_SEPARATOR.'ListRefineDB.php');

class UserListRefine
{
    public function refinement_function($attribute, $content){
            $sql = '
                SELECT
                student_number,school_name,department_name,name,grade,kanji_sei,kanji_mei,kana_sei,kana_mei,study_abroad_plan
                FROM
                %s
                    INNER JOIN
                affiliation_management
                ON  affiliation_management.affilation_number = user.affiliation_number
                    INNER JOIN
                school
                ON  affiliation_management.school_number = school.school_number
                    INNER JOIN
                department
                ON  affiliation_management.department_number = department.department_number
                    INNER JOIN
                teacher
                ON affiliation_management.responsible_number = teacher.teacher_number
                WHERE %s = "%s";';
            $db = new ListRefineDB('user');
            $ans = $db->refineList($sql,$attribute, $content);
            return $ans;
    }
}