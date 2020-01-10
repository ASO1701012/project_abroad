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

</head>
<div class="body">
    <?php require('inc/G-00-00-head.php'); ?>

    <!--　ここから　-->
    <div class="word_ratio">
        <div class="word_ratio_txt">
            総単語学習数　　
        </div>
        <div class="word_ratio_learn">
            <?php
            /*動くように値直で入れてます。実装時は下の値を代入してください*/
            $stu_num=$_SESSION['user'];
            /*$_POST['student_number'];*/
            $sql = 'SELECT count(*) FROM word_lerning WHERE student_number = :student_number';
            $stmt=$pdo->prepare($sql);
            $stmt->bindValue(':student_number', (int)$stu_num, PDO::PARAM_INT);
            $stmt->execute();

            echo $stmt->fetchColumn();
            ?>
        </div>
        <div class="word_ratio_all">　/
            <?php
            $sql = 'SELECT count(management_number) FROM word_name';
            $stmt=$pdo->prepare($sql);
            $stmt->execute();
            echo $stmt->fetchColumn();
            ?>
        </div>
    </div>
    <div class="word_result">
        <div class="word_result_correction">

            <?php
            $word_num=$_POST['ans_number'];
            $management_number=$_POST['management_number'];

            $sql = 'SELECT count(*) FROM word_lerning WHERE student_number = :student_number and word_number=:word_number';
            $stmt=$pdo->prepare($sql);
            $stmt->bindValue(':student_number', (int)$stu_num, PDO::PARAM_INT);
            $stmt->bindValue(':word_number',(int)$word_num,PDO::PARAM_INT);
            $stmt->execute();
            $flag = $stmt->fetchColumn();

            echo '<h1 class="word_result_correction_txt"';
            if($word_num==$management_number) {

                if ($flag>0){
                    $sql = 'UPDATE word_lerning SET answer_count=answer_count+1 where student_number=:student_number and word_number=:word_number';
                }else{
                    $sql = 'INSERT INTO word_lerning VALUES (:student_number,:word_number,1,000)';
                }
                $stmt=$pdo->prepare($sql);
                $stmt->bindValue(':student_number', (int)$stu_num, PDO::PARAM_INT);
                $stmt->bindValue(':word_number',(int)$word_num,PDO::PARAM_INT);
                $stmt->execute();


                echo 'id="true">正解</h1>';
            }else{
                echo 'id="false">不正解</h1>';
            }
            ?>
        </div>
        <div class="word_result_txts">
            <div class="word_ques_txts_name">
                <?php
                $sql = 'SELECT * FROM word_name WHERE management_number = :management_number ORDER BY RAND() LIMIT 3';
                $stmt=$pdo->prepare($sql);
                $stmt->bindValue(':management_number', (int)$management_number, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch();
                echo $result['word_name'];
                ?>
            </div>
            <div class="word_ques_txts_phonetic">
                <?php
                echo $result['japanese_name']
                ?>
            </div>
        </div>
        <div class="word_result_btns">
            <a href="G-08-01.php" class="word_result_btn">
                <button type="button" class="btn-lg btn-record">　終了　</button>
            </a>
            <a href="G-08-03.php" class="word_result_btn">
                <button type="button" class="btn-lg btn-record">　続行　</button>
            </a>
        </div>
    </div>
    <!--　ここまで　-->

    <?php require('inc/G-00-00-foot.php'); ?>
</div>
</body>
</html>