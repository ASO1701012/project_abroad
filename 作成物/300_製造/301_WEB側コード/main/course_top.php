<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/course-top.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/logout.js"></script>
<!--    <script src="../js/ajex.js"></script>-->
</head>
<body>
<?php include ("../sharedfile/header.php");?>
<div id="main-content">
    <div class="course-input">
        <dl>
            <div class="course-input-content course-input-title">
                <dt>講座名</dt>
                <dd><input type="text" name="title"></dd>
            </div>
            <div class="course-input-content course-input-category">
                <dt>講座カテゴリー</dt>
                <dd>
                    <select name="category">
                        <option value="">イベント</option>
                    </select>
                </dd>
            </div>
            <div class="course-input-content course-input-day">
                <dt>開催日</dt>
                <dd>
                    <select name="year">
                        <option value="">---</option>
                    </select>
                    /
                    <select name="month">
                        <option value="">---</option>
                    </select>
                    /
                    <select name="day">
                        <option value="">---</option>
                    </select>
                </dd>
            </div>
            <div class="course-input-content course-input-time">
                <dt>開催時</dt>
                <dd>
                    <select name="start-time">
                        <option value="">---</option>
                    </select>
                    ～
                    <select name="ending-time">
                        <option value="">---</option>
                    </select>
                </dd>
            </div>
            <div class="course-input-content course-input-venue">
                <dt>開催場所</dt>
                <dd><input type="text" name="venue">教室</dd>
            </div>
            <div class="course-input-content course-input-explanation">
                <dt>講座詳細</dt>
                <dd>
                    <textarea name="explanation"></textarea>
                </dd>
            </div>
        </dl>
        <button class="button-create">新規作成</button>
    </div>
    <div class="course-list" >
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
                    <td>水本</td>
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
    </div>

</div>

</body>
</html>

