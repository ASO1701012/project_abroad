<?php
require_once('../class/Controll/account/login/LoginConfirmation.php');
require_once('../class/Controll/setting/OwnProfileLearning.php');
require_once('../class/Utili/CsrfMeasures.php');

session_start();
LoginConfirmation::Confirmation();
$token = CsrfMeasures::input();

$db = new OwnProfileLearning();
$lst = $db->getProfile();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>設定</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/setting_list.css">
    <link rel="stylesheet" href="../css/setting.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/logout.js"></script>
    <script src="../js/SettingTop.js"></script>
</head>
<body>
<?php include('../sharedfile/header.php') ?>
<?php include('../sharedfile/setting_list.php') ?>
<div class="top-right">
    <div class="top-right1">
        <div class="setting-display">
            <?php
            foreach ($lst as $key => $value) {
                echo " 
                        <dl>
                            <dt>姓名</dt>
                            <dd>$value[0]</dd>
                            <dt>所属学校名</dt>
                            <dd>$value[1]</dd>
                            <dt>メールアドレス</dt>
                            <dd>$value[2]</dd>
                            <dt>担当国名</dt>
                            <dd>$value[3]</dd>
                        </dl>";
            }

            ?>
        </div>
        <form action="../class/Executionfile/ProfileVerification.php" method="post">
            <div class="setting-input">
                <dl>
                    <dt>メールアドレス</dt>
                    <dd><input type="email" id="mail1" name="mail1"></dd>
                    <dt>担当国名</dt>
                    <!-- @todo 以下をセレクトボックスに変更してください -->
                    <dd><input type="text" id="text1" name="text1"></dd>
                    <!--                    ----->
                    <dt>パスワード</dt>
                    <dd>
                        <input type="password" id="pass1" name="pass1">
                        <input type="password" id="pass2" name="pass2">
                    </dd>
                    <input type="hidden" name="token" value="<?php echo $token ?>">
                </dl>
            </div>
            <button type="submit" id="form_button">更新</button>
        </form>
    </div>
</div>
</body>
</html>
