<?php //require '../header.php'; ?>

<?php session_start();?>

<?php
ini_set('display_errors', 1);

/*仮のセッション名を user にしてます*/
$_SESSION['user']= "null";
unset($_SESSION['user']);

require ('inc/db_connect.php');

$sql=$pdo->prepare('select * from user where student_number=? ');
$sql->execute([$_REQUEST['login_number']]);
foreach ($sql as $row){
    $_SESSION['user']= $row['student_number'];
    $hash = $row['password'];
}
if (isset($_SESSION['user'])){
    //Hash認証
    if(password_verify($_REQUEST['login_pass'],$hash)){
        header( "Location: G-04-01.php" ) ;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>index</title>
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
                学籍番号又はパスワードが違います
            </div>
            <!--　次にボタン　-->
            <div class="entry_btns">
                <div class="entry_next">
                    <a href="G-03-01.php">
                        <button type="button" class="btn btn-entry btn-lg">もう一度</button>
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

<?php //require '../footer.php'; ?>
