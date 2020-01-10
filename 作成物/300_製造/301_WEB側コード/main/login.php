<?php
require_once("../class/Utili/CsrfMeasures.php");

session_start();
$token = CsrfMeasures::input();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログインページです</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
</head>
<diV class="login-form">
    <h1>ASO English +</h1>
    <p>by KUGA Tech</p>
    <form method="post" action="../class/Executionfile/AuthorizationDecision.php">
        <div class="login-form1">
            <input class="h" type="number" name="teacher_number" value="" placeholder="教職員番号" required>
            <input class="h" type="password" name="password" value="" placeholder="パスワード" required>
            <input type="hidden" name="token" value="<?php echo $token ?>" >
        </div>
            <input id="login" type="submit" name ="check" value = "ログイン">
    </form>
</diV>
</body>
</html>