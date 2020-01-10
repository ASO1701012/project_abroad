<?php
require_once '../Controll/account/operation/Teacher/TearcherListAcquisition.php';
session_start();

sampleCsv();

function sampleCsv() {

    try {
        //CSV形式で情報をファイルに出力のための準備
        //@todo ここは/tmp/にしてください
//        $file = touch('../../tmp/' . time() . rand() . '.csv');
        $file = touch('/var/tmp/' . time() . rand() . '.csv');
//        chmod($file,0606);
        $res = fopen($file, 'w');
        if ($res === FALSE) {
            throw new Exception('ファイルの書き込みに失敗しました。');
        }

        // データ一覧。この部分を引数とか動的に渡すようにしましょう
        $class = new TearcherListAcquisition();
        $dataList = $class->allLearned();

        $lst = ['教員番号','姓名','学校名','担当国名','メール'];
        mb_convert_variables('SJIS', 'UTF-8', $lst);

        // ファイルに書き出しをする
        fputcsv($res, $lst);
        foreach($dataList as $key=>$value) {
            $lst = [];
            $tmp = '';
            foreach ($value as $in_key=>$in_value){
                if (is_int($in_key)) {
                        $lst[] =  $in_value;
                }
            }
            mb_convert_variables('SJIS', 'UTF-8', $lst);
            // ファイルに書き出しをする
            fputcsv($res, $lst);
        }

//        // ハンドル閉じる
        fclose($res);

        // ダウンロード開始
        header('Content-Type: application/octet-stream');

        // ここで渡されるファイルがダウンロード時のファイル名になる
        header('Content-Disposition: attachment; filename=sampaleCsv.csv');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file));
        readfile($file);

    } catch(Exception $e) {

        // 例外処理をここに書きます
        echo $e->getMessage();

    }
}