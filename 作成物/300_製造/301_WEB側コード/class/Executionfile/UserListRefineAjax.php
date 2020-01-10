<?php
require_once('../Controll/account/operation/User/UserListRefine.php');
require_once('../Controll/account/operation/User/UserListAcquisition.php');
require_once('../Utili/DBReturnValueConversion.php');

if($_POST['content'] == 'all'){
    $class = new UserListAcquisition();
    $ans = $class->allLearned();
    $json_li = DBReturnValueConversion::dbConversion($ans);
    print_r($json_li);
}else{
    $class = new UserListRefine();
    $ans = $class->refinement_function($_POST['attribute'],$_POST['content']);
    $json_li = DBReturnValueConversion::dbConversion($ans);
    print_r($json_li);
}

