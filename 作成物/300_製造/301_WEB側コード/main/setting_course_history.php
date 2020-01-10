<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>設定</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/setting_list.css">
    <link rel="stylesheet" href="../css/setting_course_history.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/logout.js"></script>
</head>
<body>
<?php include('../sharedfile/header.php') ?>
<?php include ('../sharedfile/setting_list.php') ?>
<div class="setting-right">
    <table class="tablecategory">
        <tr>
            <td>
                <select name="refine">
                    <option value="">---</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <select>
                    <option value="">---</option>
                </select>
            </td>
            <td>
                <select>
                    <option value="">---</option>
                </select>
            </td>
            <td>
                <select>
                    <option value="">---</option>
                </select>
            </td>
            <td>
                <select>
                    <option value="">---</option>
                </select>
            </td>
            <td>
                <select>
                    <option value="">---</option>
                </select>
            </td>
            <td>
                <select>
                    <option value="">---</option>
                </select>
            </td>
        </tr>
    </table>
    <div class="box">
        <table class="tablebody">
            <!-- ここはphpでデータベースから持ってきて埋め込む-->
            <!-- 以下イメージ、上記の機能が完了後は削除-->
            <tr>
                <td>スポーツEnglish</td>
                <td>2019/09/06</td>
                <td>17:00~18:00</td>
                <td>1155教室</td>
                <td>イベント</td>
                <td>こここｋ</td>
            </tr>
            <!-- こんなかんじ -->
            <?php
            //                for($i = 1; $i <= 30; $i++){
            //                    echo '            <tr>
            //                <td>1801017</td>
            //                <td>麻生情報ビジネス専門学校</td>
            //                <td>情報システム専攻科</td>
            //                <td>久家まさと</td>
            //                <td>2年</td>
            //                <td>酒井　春華</td>
            //                <td>サカイ　ハルカ</td>
            //                <td>あり</td>
            //            </tr>
            //            ';
            //                }
            ?>
        </table>
    </div>
    <button>CSV出力</button>
</div>

</div>
</body>
</html>

