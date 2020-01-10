<?php
ini_set('display_errors', 1);
require_once('../Utili/CsrfMeasures.php');
require_once('../Controll/account/login/LoginConfirmation.php');
require_once('../Controll/account/login/LoginAuthentication.php');

session_start();

$ans = false;

if(CsrfMeasures::validation()){
    $class = new LoginAuthentication($_POST['teacher_number'],$_POST['password']);
    if($class->authentication()){
        print_r('ログインが完了しました');
        $ans = true;
    }else{
        print_r('エラー');
    }
}else{
    //ログインしているかどうか判定
    print_r('ログイン画面からの遷移ではありません');
}
if($ans){
    header('location:../../main/user.php');
    exit();
}else{
    header('location:../../main/login.php');
    exit();
}