<?php
require ('controller/session_auth.php');
$ses = new session_auth();

$ses ->require_logined_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ASO English+</title>
    <!-- bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- headerfooterのcss -->
    <link rel="stylesheet" href="css/G-00.css">
    <!-- bootstrapの上書き -->
    <link rel="stylesheet" href="css/G-08.css">

    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <?php require ('inc/db_connect.php'); ?>
    <?php session_start();?>

    <!-- 学習記録追加更新削除機能 -->
    <?php
    /*動くように値直で入れてます。実装時は下の値を代入してください*/
    $_SESSION['user']=1700002;
    $student_number=$_SESSION['user'];



    //追加
    if (isset($_POST['add'])){
        $date=$_POST['year']."-".$_POST['month']."-".$_POST['day'];

        $sql = 'INSERT INTO learning_record(student_number, category_number, learning_time, learning_date,learning_detail) VALUES (:student_number,:category_number,:learning_time,:learning_date,:learning_detail)';
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(':student_number', (int)$student_number, PDO::PARAM_INT);
        $stmt->bindValue(':category_number', (int)$_POST['category'], PDO::PARAM_INT);
        $stmt->bindValue(':learning_time', (int)$_POST['min'], PDO::PARAM_INT);
        $stmt->bindValue(':learning_date', date($date), PDO::PARAM_STR);
        $stmt->bindValue(':learning_detail',$_POST['detail'], PDO::PARAM_STR);
        $stmt->execute();
    }

    //更新
    if(isset($_POST['update'])){
        $date=$_POST['year']."-".$_POST['month']."-".$_POST['day'];

        $sql = 'UPDATE learning_record SET category_number=:category_number,learning_time=:learning_time,learning_date=:learning_date,learning_detail=:learning_detail where management_number=:management_number';
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(':category_number', (int)$_POST['category'], PDO::PARAM_INT);
        $stmt->bindValue(':learning_time', (int)$_POST['min'], PDO::PARAM_INT);
        $stmt->bindValue(':learning_date', date($date), PDO::PARAM_STR);
        $stmt->bindValue(':learning_detail',$_POST['detail'], PDO::PARAM_STR);
        $stmt->bindValue(':management_number',$_POST['management_number'], PDO::PARAM_INT);
        $stmt->execute();
    }

    //削除
    if(isset($_POST['delete'])){
        $sql = 'DELETE FROM learning_record WHERE management_number=:management_number';
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(':management_number',$_POST['management_number'], PDO::PARAM_INT);
        $stmt->execute();
    }

    ?>



</head>
<div class="body">
    <?php require('inc/G-00-00-head.php'); ?>

    <!--　ここから　-->

    <div class="graph1 pad">
        <div class="graph1_selects">
            <div class="graph1_selects_filter">
                <select name="category" class="myform-control">
                    <option>全体</option>
                    <option>リスニング</option>
                    <option>ライティング</option>
                    <option>リーディング</option>
                    <option>単語数</option>
                </select>
            </div>
            <div class="graph1_selects_period">
                <select name="period" class="myform-control">
                <option>WEEK</option>
                <option>MONTH</option>
                <option>YEAR</option>
                </select>
            </div>
        </div>
        <div class="graph1_content">
            <?php
            require 'graph.php';
            ?>

        </div>
    </div>

    <div class="list pad">
        <div class="list_filter">
            <select name="list" class="myform-control">
                <option>全体</option>
                <option>リスニング</option>
                <option>ライティング</option>
                <option>リーディング</option>
            </select>
        </div>
        <div class="list_content">
            <div class="list_content_txt">
                <?php

                $sql = 'SELECT management_number,category_number,learning_time,learning_date,learning_detail FROM learning_record WHERE student_number = :student_number ORDER BY learning_date desc';
                $stmt=$pdo->prepare($sql);
                $stmt->bindValue(':student_number', (int)$student_number, PDO::PARAM_INT);
                $stmt->execute();
                $data=$stmt->fetchAll();
                foreach ( $data as $value ) {
                    echo '<form action="G-08-02.php" method="get">
                            <input type="hidden" name="management_number" value='.$value["management_number"].'>
                            <input type="submit" value='.htmlspecialchars($value['learning_date']).'　'.$value['learning_time'].'min　'.htmlspecialchars(mb_substr($value['learning_detail'], 0, 9, "UTF-8")).' class="submit_button">
                          </form>';
                }

                ?>
            </div>
        </div>
    </div>

    <div class="graph2 pad">
        <div class="graph2_content">
            <?php
            require 'doughnut.php';
            ?>

        </div>
        <div class="graph2_btns">
            <div class="graph2_btns_word">
                <a href="G-08-03.php">
                    <button type="button" class="mybtn btn-graph btn-lg">単語学習</button>
                </a>
            </div>
            <div class="graph2_btns_word">
                <form method="post" action="G-08-02.php">
                    <button type="submit" class="mybtn btn-graph btn-lg" name="from_btn">記録追加</button>
                </form>
            </div>
        </div>
    </div>

    <!--　ここまで　-->

    <?php require('inc/G-00-00-foot.php'); ?>
</div>
</body>
</html>