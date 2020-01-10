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
    $_SESSION['entry']['student_number']=$_POST['student_number'];
    $_SESSION['entry']['kanji_sei']=$_POST['kanji_sei'];
    $_SESSION['entry']['kanji_mei']=$_POST['kanji_mei'];
    $_SESSION['entry']['kana_sei']=$_POST['kana_sei'];
    $_SESSION['entry']['kana_mei']=$_POST['kana_mei'];
    ?>


    <script type="text/javascript">
        /*入力値テック*/
        function check_num(){
            var num = document.getElementById("pass").value;
            if (num.match(/[^0-9 a-z A-Z]/g)){
                alert("パスワードは半角英数字で入力してください");
            }
        }
        /*2つが同じか*/
        function check_same(){
            var pass = document.getElementById("pass").value;
            var again = document.getElementById("again").value;

            if (pass!=again){
                alert("入力されたパスワードが一致しません");
            }
        }
    </script>
</head>
<body>
<div class="body">
    <div class="entry_content_2">
        <!--文章-->
        <div class="entry_txts">
            <div class="entry_txt_big">
                ログインに使用する<br>パスワードを<br>半角英数字で入力してください<br>
            </div>
            <div class="entry_txt_small">
                Input Password to use for login.
            </div>
        </div>
        <!--フォームたち-->
        <form method="post" action="G-01-08.php">
        <div class="entry_selects">
            <!-- パスワード -->
            <div class="form-group">
                <input type="password" class="form-control" placeholder="パスワード" name="pass" id="pass" onchange="check_num()" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="もう一度入力してください" id="again" onchange="check_same()" required="required">
            </div>
        </div>
        <!--　次にボタン　-->
        <div class="entry_btns">
            <div class="entry_next">
                <button type="submit" class="btn btn-entry btn-lg">次へ</button>
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