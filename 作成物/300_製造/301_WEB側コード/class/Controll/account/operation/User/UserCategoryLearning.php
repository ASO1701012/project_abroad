<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'operation'.DIRECTORY_SEPARATOR.'CategoryLearningDB.php');
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Utili'.DIRECTORY_SEPARATOR.'DBReturnValueConversion.php');


class UserCategoryLearning
{
    private $lst;
    public function __construct()
    {
        $this->lst = [
            'school' => 'school_name',
            'department' => 'department_name',
            'teacher' => 'name'
        ];
    }

    public function category_get(){
        $db = new CategoryLearningDB('user');
        $ans = $db->category_list($this->lst);
        $ans['grade'] = ['1','2','3','4'];
        $ans['plan'] = ['はい','いいえ'];
        return json_encode($ans);
    }
}