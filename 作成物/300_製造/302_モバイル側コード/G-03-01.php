<?php
    require ('controller/session_auth.php');
    $ses = new session_auth();

    $ses ->require_unlogined_session();
?>
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
    <script src="serviceworker.js"></script>

</head>
<body>


<div class="body">
    <div class="login_contents">
        <!--文章-->
        <div class="login_txts">
            <div class="login_txt_big">
                ASO English +
            </div>
        </div>
        <!--フォームたち-->
        <form action="G-03-login.php" method="post">
            <div class="login_selects">
                <!-- 学籍番号 -->
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="学籍番号" name="login_number">
                </div>
                <!-- パスワード -->
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="パスワード" name="login_pass">
                </div>
            </div>
            <!--　次にボタン　-->
            <div class="entry_btns">
                <div class="entry_next">
                    <a href="G-01-01.html">
                        <button type="button" class="btn btn-entry btn-lg">新規作成</button>
                    </a>

                        <button type="submit" class="btn btn-entry btn-lg">ログイン</button>

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