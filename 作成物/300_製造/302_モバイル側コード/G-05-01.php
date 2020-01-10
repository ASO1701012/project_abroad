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
    <link rel="stylesheet" href="css/G-05.css">

    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
</head>
<body>
<!--  DB接続 -->
<?php require('inc/db_connect.php');?>

<?php
//セッションの確認
require_once "./controller/session_auth.php";
//セッション管理クラスを呼び出す
$session = new session_auth();
//セッション情報が切れていたらログインページに戻す
$session -> require_logined_session();
?>

<?php
//パスワードボックス用メッセージ変数
$password_input = "パスワード";
$repassword_input = "もう一度入力してください";
if(isset($_POST['csrf_token'])){
    //csrf対策
    if($_POST['csrf_token'] == $_SESSION['csrf_token']){
        //パスワード変更処理
        if(isset($_POST['pass_change']) && isset($_POST['repass_change'])){
            //    パスワード変更のチェック
            $pass = $_POST["pass_change"];
            $repass = $_POST["repass_change"];
            if ($pass == $repass){
                //入力したパスワードが同じ
                if(preg_match('/^[0-9a-zA-Z]/',$pass) && preg_match('/^[0-9a-zA-Z]/',$repass)){
                    //正規表現にあっている場合
                    ?><script>alert("パスワードを変更しました！");</script><?php


                    $sql =  'UPDATE user
                            SET password =?
                            WHERE student_number =?;';
                    $pass_change = $pdo ->prepare($sql);
                    $pass_change ->execute([password_hash($pass,PASSWORD_DEFAULT),$_SESSION['user']]);
                    $_POST =array();

                    header('Location:G-04-01.php');
                    exit;

                }else{
                    ?><script>alert("パスワードは英数字で入力してください");</script><?php
                    $password_input ="パスワードは英数字で入力してください";
                    $repassword_input = "パスワードは英数字で入力してください";
                }
            }
            else{
                ?><script>alert("入力したパスワードが一致しません");</script><?php
            }
        }
    }
}

// ランダムな文字列を生成してセッションに設定
session_start();
$csrf_token = rand();
$_SESSION['csrf_token'] = $csrf_token;
session_write_close();
?>

<?php

    //セッションのユーザの情報を取得
    $user=$_SESSION['user'];

    $sql = 'SELECT U.kanji_sei,U.kanji_mei,S.school_name,d.department_name
            FROM user U
            INNER JOIN affiliation_management A on U.affiliation_number = A.affilation_number
            INNER JOIN school S on A.school_number = S.school_number
            INNER JOIN  department d on A.department_number = d.department_number
            WHERE student_number =?;';
    $user_info=$pdo -> prepare($sql);
    $user_info ->execute([$user]);
    foreach ($user_info as $item){
        $sei = $item['kanji_sei'];
        $mei = $item['kanji_mei'];
        $school = $item['school_name'];
        $department = $item['department_name'];
    }
?>
<div class="body">
    <?php require('inc/G-00-00-head.php'); ?>
    <div class="setting_profile">
        <div class="setting_profile_txt">
            <div class="setting_profile_txt_name">
                <?php echo htmlspecialchars($sei."　".$mei)  ?>
            </div>
            <div class="setting_profile_txt_school">
                <?php
                    echo htmlspecialchars($school);
                ?><br>
                <?php
                    echo htmlspecialchars($department);
                ?>

            </div>
        </div>
    </div>
    <div class="setting_password">
        <h5>パスワード再設定</h5>
        <!-- パスワード -->
        <form action="G-05-01.php" method="post">
            <div class="form-group">
                <input type="password" class="form-control" placeholder="<?php  echo htmlspecialchars($password_input) ?>" name="pass_change" required>
            </div>
            <!-- 確認パスワード -->
            <div class="form-group">
                <input type="password" class="form-control" placeholder="<?php echo htmlspecialchars($repassword_input) ?>" name="repass_change" required>
            </div>
            <div class="pass_btn">
                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token;?>">
                <input type="submit" value="パスワード変更" class="mybtn btn-apply">
            </div>
        </form>
    </div>
    <div class="setting_abroad">
        <h5>留学情報</h5>
        <!-- 国名 -->
        <div class="form-group setting_abroad_country">
            <select id="abroad_country" class="form-control">
                <option>フィリピン</option>
                <option>カナダ</option>
            </select>
        </div>
        <!-- 留学先学校名 -->
        <div class="form-group setting_abroad_school">
            <select id="abroad_school" class="form-control">
                <option>IDEAセブ</option>
                <option>IDEAアカデミー</option>
            </select>
        </div>
        <!-- 留学期間 -->
        <div class="form-group setting_abroad_period">
            <select id="abroad_period" class="form-control">
                <option>２週間</option>
                <option>１ヵ月</option>
            </select>
        </div>
        <!-- 留学開始月 -->
        <div class="form-group setting_abroad_start">
            <select id="abroad_start" class="form-control">
                <option>2019年10月</option>
                <option>2019年11月</option>
            </select>
        </div>
        <div class="abroad_btn">
            <input type="submit" value="留学情報更新" class="mybtn btn-apply">
        </div>
    </div>
    <div class="setting_insta">
        <div class="setting_insta_txt">
            <a href ="https://www.instagram.com/aso.kaigai/?hl=ja">麻生事業部のInstagramをフォローして<br>
                最新情報をチェックしよう
        </div>
        <div class="setting_insta_img">
            <img src="img/g05_camera.png" id="img_camera"></a>
        </div>
    </div>
</div>
</body>

</html>