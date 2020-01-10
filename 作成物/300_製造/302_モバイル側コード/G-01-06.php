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

    <!-- セッションに入れてます。名前はDBと同じです-->

    <?php
    session_cache_limiter('none'); //ブラウザバック時の警告をなくす
    session_start();
    ?>

    <?php
    if (isset($_POST['grade'])){
        $_SESSION['entry']['grade']=$_POST['grade'];
        $_SESSION['entry']['teacher']=$_POST['teacher'];
    }
    ?>


</head>
<body>
<div class="body">
    <div class="entry_content_2">
        <!--文章-->
        <div class="entry_txts">
            <div class="entry_txt_big">
                学籍番号、名字名前<br>を入力してください
            </div>
            <div class="entry_txt_small">
                Input school number<br>
                and full name.
            </div>
        </div>
        <!--フォームたち-->
        <form method="post" action="G-01-07.php">
            <div class="entry_selects">
                <!-- 学籍番号 -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="学籍番号" name="student_number" required="required"  pattern="\d{7}" title="数字7桁でご入力ください。"
                        <?php
                            if(isset($_SESSION['entry']['student_number'])){
                                echo 'value="'.$_SESSION['entry']['student_number'].'"';
                            }
                        ?>
                    >
                </div>
                <!-- 名字名前 -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="名字" name="kanji_sei" required="required"
                            <?php
                                if(isset($_SESSION['entry']['kanji_sei'])){
                                    echo 'value="'.$_SESSION['entry']['kanji_sei'].'"';
                                }
                            ?>
                        >
                        <input type="text" class="form-control" placeholder="名前" name="kanji_mei" required="required"
                            <?php
                                if(isset($_SESSION['entry']['kanji_mei'])){
                                    echo 'value="'.$_SESSION['entry']['kanji_mei'].'"';
                                }
                            ?>
                        >
                    </div>
                </div>
                <!-- みょうじなまえ -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="みょうじ" name="kana_sei" required="required"
                            <?php
                                if(isset($_SESSION['entry']['kana_sei'])){
                                    echo 'value="'.$_SESSION['entry']['kana_sei'].'"';
                                }
                            ?>
                        >
                        <input type="text" class="form-control" placeholder="なまえ" name="kana_mei" required="required"
                            <?php
                                if(isset($_SESSION['entry']['kana_mei'])){
                                    echo 'value="'.$_SESSION['entry']['kana_mei'].'"';
                                }
                            ?>
                        >
                    </div>
                </div>
            </div>
            <!--　次にボタン　-->
            <div class="entry_btns">
                <div class="entry_next">
                    <a href="G-01-07.php">
                        <button type="submit" class="btn btn-entry btn-lg">次へ</button>
                    </a>
                </div>
            </div>
        </form>
    </div>
    <!--　おまけの画像たち　-->
    <div class="entry_imgs">
    </div>
</div>
</body>
</html>