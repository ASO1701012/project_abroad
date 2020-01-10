<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'operation'.DIRECTORY_SEPARATOR.'CategoryLearningDB.php');
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Utili'.DIRECTORY_SEPARATOR.'DBReturnValueConversion.php');


class TeacherCategoryLearning
{
    private $lst;
    public function __construct()
    {
        $this->lst = [
            'school' => 'school_name',
            'country' => 'country_name'
        ];
    }

    public function category_get(){
        $db = new CategoryLearningDB('teacher');
        $ans = $db->category_list($this->lst);
        return json_encode($ans);
    }
}