<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ASO English+</title>
    <!-- bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- headerfooterのcss -->
    <link rel="stylesheet" href="css/G-00.css">
    <!-- bootstrapの上書き -->
    <link rel="stylesheet" href="css/G-01.css">

    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <?php
    session_cache_limiter('none'); //ブラウザバック時の警告をなくす
    session_start();
    ?>

</head>
<body>
<div class="body">
    <div class="entry_content_4">
        <!--文章-->
        <div class="entry_txts">
            <div class="entry_txt_big">
                入力内容を確認してください
            </div>
            <div class="entry_txt_small">
                Please check your entries.
            </div>
        </div>
        <!--確認たち-->

        <?php

        $_SESSION['abroad']['country']=$_POST['abroad_country'];
        $_SESSION['abroad']['school']=$_POST['abroad_school'];
        $_SESSION['abroad']['period']=$_POST['abroad_period'];
        $_SESSION['abroad']['start']=$_POST['abroad_start'];

        require ('inc/db_connect.php');
        ?>



        <div class="entry_checks">
            <h6>留学先</h6>
            <h5>
                <?php
                $sql=$pdo->prepare('select country_name from country where country_number=?');
                $sql->execute([$_SESSION['abroad']['country']]);
                echo $sql->fetchColumn();
                ?>
            </h5>
            <h5>
                <?php
                $sql=$pdo->prepare('select school_name from target_school where target_school_number=?');
                $sql->execute([$_SESSION['abroad']['school']]);
                echo $sql->fetchColumn();
                ?>
            </h5>
            <h6>留学期間</h6>
            <h5>
                <?php
                echo $_SESSION['abroad']['period'].'day';
                ?>
            </h5>
            <h5>
                <?php
                preg_match("@([0-9]{4,})-([0-9]{1,2})-([0-9]{1,2})@", $_SESSION['abroad']['start'],$date);
                echo $date[1].'年'.$date[2].'月〜';
                ?>
            </h5>
        </div>
        <!--　次にボタン　-->
        <div class="entry_btns">
            <div class="entry_next">
                <a href="G-02-01.php">
                    <button type="button" class="btn btn-ng btn-lg">修正する</button>
                </a>
                <a href="G-02-03.php">
                    <button type="button" class="btn btn-ok btn-lg">確認した</button>
                </a>
            </div>
        </div>
    </div>
    <!--　おまけの画像たち　-->
    <div class="entry_imgs">
    </div>
</div>
</body>
</html>