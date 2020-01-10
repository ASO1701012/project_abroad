<?php
require_once "../Utili/CsrfMeasures.php";
require_once "../Controll/account/login/LoginConfirmation.php";
require_once "../Controll/setting/OwnProfileChange.php";
require_once "../Controll/account/login/LoginAuthentication.php";


session_start();
if (CsrfMeasures::validation()) {
    //$_POST()に値が設定されているか判定を行う
    //一つも値が設定されていなければエラーを表示して元の画面に遷移　end
    if (!($_POST['pass1'] == '')&&!($_POST['pass2'] == '') || !($_POST['text1'] == '') || !($_POST['mail1'] == '')) {
        $data = [
            'password1' => $_POST['pass1'],
            'password2' => $_POST['pass2'],
            'country' => $_POST['text1'],
            'mail' => $_POST['mail1']
        ];
        $class = new OwnProfileChange();
        $class->update_profile($data,$_SESSION['user_id']);
    header('Location: ../../main/setting_top.php?message='.'成功しました');
    exit;
    } else {
    header('Location: ../../main/setting_top.php?message='.'失敗しました');
    exit;
    }
} else {
    LoginConfirmation::Confirmation();
}
