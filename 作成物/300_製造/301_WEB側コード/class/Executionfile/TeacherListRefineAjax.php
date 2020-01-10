<?php
require_once '../Controll/account/operation/Teacher/TeacherListRefine.php';
require_once '../Controll/account/operation/Teacher/TearcherListAcquisition.php';
require_once '../Utili/DBReturnValueConversion.php';

if($_POST['content'] == 'all'){
    $class = new TearcherListAcquisition();
    $ans = $class->allLearned();
    $json_li = DBReturnValueConversion::dbConversion($ans);
    print_r($json_li);
}else{
    $class = new TeacherListRefine();
    $ans = $class->refinement_function($_POST['attribute'],$_POST['content']);
    $json_li = DBReturnValueConversion::dbConversion($ans);
    print_r($json_li);
}

