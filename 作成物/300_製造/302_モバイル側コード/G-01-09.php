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
</head>
<body>
    <div class="body">
        <div class="entry_content_1">
            <div class="entry_txt_big">
                最後に<br>
                LINEとの連携を行います<br>
            </div>
            <div class="entry_txt_small">
                Finally, cooperate with LINE
            </div>
            <div class="entry_line">

                <a href="https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id=1653646888&redirect_uri=https://abroad.vxx0.com/abroad_mobile/G-01-10.php&state=<?php echo rand(); ?>&bot_prompt=aggressive&scope=profile">
                    <button type="button" class="btn btn-entry btn-lg">LINE連携</button>
                </a>
            </div>
        </div>
    </div>

</body>
</html>