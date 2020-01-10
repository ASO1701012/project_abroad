<?php

session_start();

sampleCsv();

function sampleCsv() {

    try {
        $cource_number = $_POST['cource_number'];
        //CSV形式で情報をファイルに出力のための準備
//        $file = touch('../../tmp/' . time() . rand() . '.csv');
        $file = touch('/var/tmp/' . time() . rand() . '.csv');
//        var_dump($file);
//        chmod($file,0606);
        $res = fopen($file, 'w');
        if ($res === FALSE) {
            throw new Exception('ファイルの書き込みに失敗しました。');
        }

        // データ一覧。この部分を引数とか動的に渡すようにしましょう
        $PDO = new pdo('mysql:host=localhost;dbname=abroad;charset=utf8', 'root','password');
        $sql = 'SELECT
    user.student_number,school_name,department_name,name,grade,kanji_sei,kanji_mei,kana_sei,kana_mei,study_abroad_plan
FROM
    course_participant
        INNER JOIN
        user
            on course_participant.student_number = user.student_number
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
where course_number = ?;';
        $sql = $PDO->prepare($sql);
        $sql->bindValue(1,$cource_number);
        $sql->execute();
        $row = $sql->fetchAll();

        $lst = ['生徒番号','学校名','学科名','担任名','学年','氏名','カナ','留学予定'];
        mb_convert_variables('SJIS', 'UTF-8', $lst);

        // ファイルに書き出しをする
        fputcsv($res, $lst);
        foreach($row as $key=>$value) {
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