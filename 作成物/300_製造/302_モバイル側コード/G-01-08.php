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
    <div class="entry_content_3">
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
        <div class="entry_checks">


            <?php
            $_SESSION['entry']['pass']=$_POST['pass'];

            $school=$department=$grade=$teacher=$student_number=$kanji_sei=$kanji_mei=$kana_sei=$kana_mei=0;
            if (isset($_SESSION['entry'])) {
                $school=$_SESSION['entry']['school'];
                $department=$_SESSION['entry']['department'];
                $grade=$_SESSION['entry']['grade'];
                $teacher=$_SESSION['entry']['teacher'];
                $student_number=$_SESSION['entry']['student_number'];
                $kanji_sei=$_SESSION['entry']['kanji_sei'];
                $kanji_mei=$_SESSION['entry']['kanji_mei'];
                $kana_sei=$_SESSION['entry']['kana_sei'];
                $kana_mei=$_SESSION['entry']['kana_mei'];
            }else{
                echo "<p>入力されていない項目があります。</p>";
                require ('G-01-04.php');
            }

            require ('inc/db_connect.php');
            ?>
            <h6>学校情報</h6>
            <h5>
                <?php
                $sql=$pdo->prepare('select school_name from school where school_number=?');
                $sql->execute([$school]);
                $school_name = $sql->fetchColumn();
                echo $school_name;
                ?>
            </h5>
            <h5>
                <?php
                $sql=$pdo->prepare('select department_name from department where department_number=?');
                $sql->execute([$department]);
                $department_name = $sql->fetchColumn();
                echo $department_name;
                ?>
            </h5>
            <h5>
                <?php
                echo $grade."年生";
                ?>
            </h5>
            <h6>担任の先生</h6>
            <h5>
                <?php
                $sql=$pdo->prepare('select name from teacher where teacher_number=?');
                $sql->execute([$teacher]);
                $teacher_name = $sql->fetchColumn();
                echo $teacher_name;
                ?>
            </h5>
            <h6>学籍番号</h6>
            <h5>
                <?php
                echo $student_number;
                ?>
            </h5>
            <h6>姓名</h6>
            <h5>
                <?php
                echo $kanji_sei."　".$kanji_mei;
                ?>
            </h5>
            <h5>
                <?php
                echo $kana_sei."　".$kana_mei;
                ?>
            </h5>
        </div>
        <!--　次にボタン　-->
        <div class="entry_btns">
            <div class="entry_next">
                <a href="G-01-04.php">
                    <button type="button" class="btn btn-ng btn-lg">修正する</button>
                </a>
                <a href="G-01-09.php">
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