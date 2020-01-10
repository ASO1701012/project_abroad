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
    <link rel="stylesheet" href="css/G-04.css">

    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- DB接続 -->
    <?php require('inc/db_connect.php'); ?>

</head>
<body>


<?php
    //セッションの開始
    session_start();
    $userid =$_SESSION['user'];
?>
<?php
    //ユーザーの留学情報を元にcountry_numberを取得
    $sql = 'SELECT C.country_picture,img_path
            FROM country C  INNER JOIN target_school T ON C.country_number = T.country_number
                INNER JOIN study_abroad_plan S ON T.target_school_number = S.target_school
                INNER JOIN user U ON S.management_number = U.study_abroad_plan
                INNER JOIN country_img ON C.country_number = country_img.country_number
            WHERE   U.student_number = ?;';
    $country = $pdo -> prepare($sql);
    $country -> execute([$userid]);
    $x =0;  //留学先のイメージ画像を入れる配列の要素
    foreach ($country as $item) {
        $img_country = $item["country_picture"];
        $img_path[$x] = $item["img_path"];
        $x++;
    }

    //留学情報を登録しているかしないかを判定する
    if(!isset($img_country)){
        $amount = "*******";
        $abroad_date = "****";
        $img_country = "./img/country/jp.png";
    }
    else{
        //6時を超えたら実行する
        if (strtotime(date('H:i')) >= strtotime('6:00'))
        {
            //留学先のイメージ画像が格納された配列の中身をシャッフルする。
            //そうすることで、表示させる画像をランダムに変更する
            shuffle($img_path);
        }

        //ユーザーの留学先の目標貯金額,留学日を取得
        $sql = 'SELECT S.target_amount ,S.start_study_abroad
            FROM study_abroad_plan S INNER JOIN user U ON S.management_number = U.study_abroad_plan
            WHERE student_number = ?;';
        $amount = $pdo -> prepare($sql);
        $amount ->execute([$userid]);
        foreach ($amount as $item){
            $amount = $item["target_amount"];
            $start_date = $item["start_study_abroad"];
        }


        //現在の時刻を取得
        $date1 =date("Y-m-d");
        //現在の時刻から留学の日の減算を行う
        $abroad_date=((strtotime($start_date) - strtotime($date1)) / 86400).'日';
    }





?>
<div class="body">
    <?php require('inc/G-00-00-head.php'); ?>
    <div class="home_switch">
        <a href="G-04-01.php">
            <button type="button" class="btn btn-to-02 btn-sm">　講座　</button>
        </a>

    </div>
    <div class="home_airplane">
        <div class="home_airplane_japan">
            <img src="img/g04_japan.png" class="airplane_img">
        </div>
        <div class="home_airplane_img">
            <img src="img/g04_airplane.png" class="airplane_img">
        </div>
        <div class="home_airplane_country">
                <!--    ユーザーが行く国の国旗を表示            -->
            <?php
                echo '<img src='.htmlspecialchars($img_country).' class="airplane_img">';
            ?>

        </div>
    </div>
    <div class="home_img">
        <div class="home_img_class">

            <!--   留学先情報が登録されていれば、画像を表示する     -->
            <?php

                if(isset($img_path)){
                    ?><img src='<?php echo htmlspecialchars($img_path[0])?>' id="home_img"><?php
                }
                else{
                    ?><b id="home_img">留学先情報が登録されていません</b><?php
                }

            ?>

        </div>
    </div>
    <div class="home_money">
        <div class="home_money_txts">
            <p id="home_money_txt_s">あと<?php echo htmlspecialchars($abroad_date)?>までに</p>
            <p id="home_money_txt_l"><?php echo htmlspecialchars("￥".$amount) ?></p>
        </div>

    </div>
    <?php require('inc/G-00-00-foot.php'); ?>
</div>
</body>

</html>