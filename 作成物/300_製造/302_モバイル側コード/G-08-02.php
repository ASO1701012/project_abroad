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

    <!-- どこから来たか判定 -->
    <?php
    //追加時
    $flag=0;
    $data[]=array();
    if (!isset($_POST['from_btn'])){
        //削除、更新時
        $flag=1;
        $sql = 'SELECT category_number,learning_time,learning_date,learning_detail FROM learning_record WHERE management_number = :management_number';
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(':management_number', (int)$_GET['management_number'], PDO::PARAM_INT);
        $stmt->execute();
        $data=$stmt->fetch();

        preg_match("@([0-9]{4,})-([0-9]{1,2})-([0-9]{1,2})@",$data['learning_date'],$date);

        /*
        echo $date[0]; // 2015/5/8
        echo $date[1]; // 2015
        echo $date[2]; // 5
        echo $date[3]; // 8
        */



    }
    ?>

</head>
<div class="body">
    <?php require('inc/G-00-00-head.php'); ?>

    <!--　ここから　-->
    <form action="G-08-01.php" method="post">


        <?php
        if(isset($_GET['management_number'])){
            echo '<input type="hidden" name="management_number" value="'.$_GET['management_number'].'">';
        }
        ?>

        <div class="record">
            <div class="record_dates">
                <select name="year" class="form-control">
                    <?php
                    $y=date('Y');
                    for ($i=-2;$i<3;$i++){
                        $year=$y+$i;
                        echo '<option value="'.$year.'" ';
                        if($i==0){
                            echo ' selected';
                        }else if($flag==1){
                            if($year==$date[1]) {
                                echo ' selected';
                            }
                        }
                        echo '>'.$year.'</option>';
                    }
                    ?>
                </select>
                <?php
                ?>
                <select name="month" class="form-control">
                    <?php
                    $m=date('m');
                    for ($i=1;$i<13;$i++){
                        echo '<option value="'.$i.'" ';
                        if($i==$m && $flag==0){
                            echo ' selected';
                        }else if($flag==1){
                            if($i==(int)$date[2]){
                                echo ' selected';
                            }
                        }
                        echo '>'.$i.'</option>';
                    }
                    ?>
                </select>
                <select name="day" class="form-control">
                    <?php
                    $d=date('d');
                    for ($i=1;$i<32;$i++){
                        echo '<option value="'.$i.'" ';
                        if($i==$d && $flag==0){
                            echo ' selected';
                        }else if($flag==1){
                            if($i==(int)$date[3]){
                                echo ' selected';
                            }
                        }
                        echo '>'.$i.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="record_dates">
                <select name="category" class="form-control">
                    <?php
                    $sql=$pdo->query('select * from learning_category');
                    foreach ( $sql as $value ) {
                        echo '<option value="'.$value['category_number'].'" ';
                        if ($flag==1){
                            if ($value['category_number']==$data['category_number']){
                                echo ' selected';
                            }
                        }
                        echo '>'.$value['category_name'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="record_dates">
                <select name="min" class="form-control">
                    <?php
                    for($i=20;$i<200;$i=$i+20){
                        echo '<option value="'.$i.'" ';
                        if($flag==1){
                            if ($i==$data['learning_time']&&$flag==1) {
                                echo ' selected';
                            }
                        }
                        echo '>'.$i.'</option>';
                    }
                    ?>
                </select>
            </div>
            <?php

            echo '<textarea name="detail" rows="4" cols="29" placeholder="詳細を入力してください">';
            if ($flag==1){
                echo $data['learning_detail'];
            }
            echo '</textarea>';

            ?>

        </div>
        <div class="record_btns">
            <div class="record_btn">
                <button type="submit" class="btn btn-record btn-lg" name="add"
                    <?php
                    if ($flag==1){
                        echo "disabled";
                    }
                    ?>
                >追加</button>
            </div>
            <div class="record_btn">
                <button type="submit" class="btn btn-record btn-lg" name="update"
                    <?php
                    if ($flag==0){
                        echo "disabled";
                    }
                    ?>
                >更新</button>
            </div>
            <div class="record_btn">
                <button type="submit" class="btn btn-record btn-lg" name="delete"
                    <?php
                    if ($flag==0){
                        echo "disabled";
                    };
                    ?>
                >削除</button>
            </div>
        </div>
    </form>
    <!--　ここまで　-->

    <?php require('inc/G-00-00-foot.php'); ?>
</div>
</body>
</html>