<?php
require ('controller/session_auth.php');
$ses = new session_auth();

$ses ->require_logined_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ASO English+</title>
    <!-- bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- headerfooterのcss -->
    <link rel="stylesheet" href="css/G-00.css">
    <!-- bootstrapの上書き -->
    <link rel="stylesheet" href="css/G-06.css">

    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="body">
    <?php require('inc/G-00-00-head.php'); ?>
    <div class="interview_msgs">
        <!-- 管理者から -->
        <p class="interview_msg from">
            麻生海外事業部　kaigai@mail<br>
            営業時間：＊＊＊＊~＊＊＊＊<br>
            ＊土日祝日、夏季冬季休暇は営業していません。直接詳しく聞きたいことがある場合は以下で面談の申し込みをしてください
        </p>
        <!-- ユーザから -->
        <p class="interview_msg to">
            希望する条件が送信されます
        </p>

    </div>
    <div class="interview_selects">
            <div class="input-group">
                <!-- 日付 -->
                <div class="form-group interview_select">
                    <select id="date" class="form-control">
                        <option>2019/11/15</option>
                        <option>2019/11/16</option>
                    </select>
                </div>
                <!-- 時間 -->
                <div class="form-group interview_select">
                    <select id="time" class="form-control">
                        <option>希望なし</option>
                        <option>午前中</option>
                    </select>
                </div>
            </div>
            <div class="input-group">
                <!-- 先生 -->
                <div class="form-group interview_select">
                    <select id="abroad_country" class="form-control">
                        <option>希望なし</option>
                        <option>水本　＊＊</option>
                    </select>
                </div>
                <!-- 国名 -->
                <div class="form-group interview_select">
                    <select id="country" class="form-control">
                        <option>フィリピン</option>
                        <option>カナダ</option>
                    </select>
                </div>
            </div>
            <div class="interview_selects_detail">
                <textarea rows="2" class="interview_selects_detail_txt" name="interview_detail" placeholder="詳細"></textarea>
            </div>
            <div class="interview_selects_btn">
                <a href="G-04-02.php">
                    <button type="button" class="btn btn-interview btn-sm">面談申込</button>
                </a>
            </div>
    </div>
    <?php require('inc/G-00-00-foot.php'); ?>
</div>
</body>

</html>
