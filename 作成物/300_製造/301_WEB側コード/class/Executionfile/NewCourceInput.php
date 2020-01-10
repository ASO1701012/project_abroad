<?php
require_once '../Utili/CsrfMeasures.php';
require_once '../Controll/account/login/LoginConfirmation.php';
require_once '../Controll/setting/cource/CourceInsert.php';
require_once '../Controll/account/login/LoginAuthentication.php';


session_start();
if (CsrfMeasures::validation()) {
        $data = [
            'start' => '20190707',
            'school' => $_POST['school'],
            'cource_name' => $_POST['cource_name'],
            'period' => $_POST['period'],
            'target_amount' => $_POST['target_amount']
        ];
        var_dump($data);
        $class = new CourceInsertDB();
        $class->insert($data);

        header('Location: ../../main/setting_study_abroad_detail.php');
        exit;
} else {
    //ログインしているかどうか判定
    LoginConfirmation::Confirmation();
}