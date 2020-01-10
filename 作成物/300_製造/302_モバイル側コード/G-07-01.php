<?php
require ('controller/session_auth.php');
$ses = new session_auth();

$ses ->require_logined_session();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ASO English+</title>
    <!-- bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- headerfooterのcss -->
    <link rel="stylesheet" href="css/G-00.css">
    <!-- bootstrapの上書き -->
    <link rel="stylesheet" href="css/G-07.css">

    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>
<div class="body">
    <?php
    require "inc/database_access.php";
    require "inc/db_connect.php";
    ?>
    <?php require('inc/G-00-00-head.php'); ?>

    <div class="lesson_already">
        <div class="lesson_already_msg">
            <?php
            session_start();
            //申し込み済み講座を表示する処理
            $userid = $_SESSION['user'];
            $sql = 'SELECT count(*) as count
                FROM course_participant
                WHERE student_number = ?;';
            $count = $pdo->prepare($sql);
            $count = $count -> execute([$_SESSION['user']]);
            if ($count<=0){
                echo '<p>申し込み済みの講座がありません</p>';
            }else{
                echo '<p>申し込み済みの講座が表示されます</p>';
            }
            ?>
        </div>
        <div class='lesson_already_txt'>

    <?php


    $sql = 'SELECT event_date , course_name ,co.course_number
                    FROM course_overview co INNER JOIN course_participant cp 
                    ON co.course_number = cp.course_number
                    WHERE student_number = ? ;';
    $course_info = $pdo ->prepare($sql);
    $course_info ->execute([$_SESSION['user']]);

    foreach ($course_info as $items) {
        echo '<form action="G-07-02.php" method="post">';
        echo '<input type="hidden" name="number" value=' . $items["course_number"] . '>';
        echo '<input type="submit" value=' . htmlspecialchars(date('Y月m月d日', strtotime($items['event_date'])) . "　" . mb_substr($items['course_name'], 0, 8, 'UTF-8') ). ' class="submit_button">';
        echo '</form>';
    }
    ?>
        </div>
    </div>

    <!-- 講座一覧　-->
    <div class="lesson_filter">
        <div class="lesson_filter_select">
        <div class="dropdown">
            <button class="btn btn-select btn-sm py-0 dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter　
                <span class="caret"></span>
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li>
                    <form action="G-07-01.php" method="post">
                        <input type="hidden" name="sort" value="upper">
                        <input type="submit" value="開催が近い" class="submit_button">
                    </form>
                </li>
                <li>
                    <form action="G-07-01.php" method="post">
                        <input type="hidden" name="sort" value="lower">
                        <input type="submit" value="開催が遠い" class="submit_button">
                    </form>
                </li>
                <li>
                    <form action="G-07-01.php" method="post">
                        <input type="hidden" name="sort" value="event">
                        <input type="submit" value="イベントのみ" class="submit_button">
                    </form>
                </li>
                <li>
                    <form action="G-07-01.php" method="post">
                        <input type="hidden" name="sort" value="kouza">
                        <input type="submit" value="講座のみ" class="submit_button">
                    </form>
                </li>
                <li>
                    <form action="G-07-01.php" method="post">
                        <input type="hidden" name="sort" value="setumei">
                        <input type="submit" value="説明会のみ" class="submit_button">
                    </form>
                </li>
            </ul>
        </div>
        </div>
    </div>
    <?php
    require('lesson_list.php');
    ?>

    <?php require('inc/G-00-00-foot.php'); ?>
</div>
</body>
</html>