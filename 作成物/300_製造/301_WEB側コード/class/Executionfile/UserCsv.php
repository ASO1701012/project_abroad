<?php
require_once '../Controll/account/operation/User/UserListAcquisition.php';
session_start();

sampleCsv();

function sampleCsv() {

    try {
        //CSV形式で情報をファイルに出力のための準備
//        $file = touch('../../tmp/' . time() . rand() . '.csv');
        $file = touch('/var/tmp/' . time() . rand() . '.csv');
        var_dump($file);
//        chmod($file,0606);
        $res = fopen($file, 'w');
        if ($res === FALSE) {
            throw new Exception('ファイルの書き込みに失敗しました。');
        }

        // データ一覧。この部分を引数とか動的に渡すようにしましょう
        $class = new UserListAcquisition();
        $dataList = $class->allLearned();

        $lst = ['生徒番号','学校名','学科名','担任名','学年','氏名','カナ','留学予定'];
        mb_convert_variables('SJIS', 'UTF-8', $lst);

        // ファイルに書き出しをする
        fputcsv($res, $lst);
        foreach($dataList as $key=>$value) {
            $lst = [];
            $tmp = '';
            foreach ($value as $in_key=>$in_value){
                if (is_int($in_key)) {
                    if ($in_key == 5 || $in_key == 6) {
                        $tmp = $tmp . $in_value;
                    } elseif ($in_key == 7) {
                        $lst[] = $tmp;
                        $tmp = $in_value;
                    } elseif ($in_key == 8) {
                        $tmp = $tmp . $in_value;
                        $lst[] = $tmp;
                    }elseif ($in_key == 9){
                        if (is_null($value)){
                            $lst[] = 'なし';
                        }else{
                            $lst[] = 'あり';
                        }
                    } else{
                        $lst[] =  $in_value;
                    }
                }
            }

            // 文字コード変換。エクセルで開けるようにする
            mb_convert_variables('SJIS', 'UTF-8', $lst);
//
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