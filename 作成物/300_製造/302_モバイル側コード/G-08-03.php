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
            //$_SESSION['user']=1700009;
            $student_number=$_SESSION['user'];
            /*$_POST['student_number'];*/
            $sql = 'SELECT count(*) FROM word_lerning WHERE student_number = :student_number';
            $stmt=$pdo->prepare($sql);
            $stmt->bindValue(':student_number', (int)$student_number, PDO::PARAM_INT);
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
    <div class="word_ques">

        <div class="word_ques_txts">
            <div class="word_ques_txts_name">
                <?php
                $sql = 'SELECT * FROM word_name ORDER BY RAND() LIMIT 1';
                $stmt=$pdo->prepare($sql);
                $stmt->execute();
                $ques = $stmt->fetch();
                echo $ques['word_name'];
                ?>
            </div>
            <div class="word_ques_txts_phonetic">
                <?php
                echo $ques['phonetic_symbol']
                ?>
            </div>
        </div>

    </div>
    <form method="post" action="G-08-04.php">
    <div class="word_ans">
        <input type="hidden" name="management_number" value="<?php echo $ques['management_number'] ?>">
        <div class="word_ans_btns">
            <?php
            $sql = 'SELECT * FROM word_name WHERE management_number != :management_number ORDER BY RAND() LIMIT 3';
            $stmt=$pdo->prepare($sql);
            $stmt->bindValue(':management_number', (int)$ques['management_number'], PDO::PARAM_INT);
            $stmt->execute();
            $ans = $stmt->fetchAll();
            $ans[3]=$ques;
            shuffle($ans);
            foreach ($ans as $an) {
                echo '<button type="submit" class="mybtn2 btn-word" name="ans_number" value="'.$an['management_number'].'">'.$an['japanese_name'].'</button>';
            }
            ?>
        </div>
    </div>
    </form>
    <!--　ここまで　-->

    <?php require('inc/G-00-00-foot.php'); ?>
</div>
</body>
</html>