<?php
session_start();
require 'inc/db_connect.php';
?>

<?php
// 講座ID
$Course_id = $_POST['number'];
// UserID
$User_id = $_SESSION['user'];
?>

<?php
try {
    if ($Course_id == null) {
        throw new Exception('登録失敗');
    }else {
        $sql = "INSERT INTO course_participant (course_number, student_number ) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Course_id, $User_id]);  //ユーザーのIDを入れる session or cookie [$_SESSION['変数']]
        $alert_true = "<script type='text/javascript'>alert('申し込みが完了しました。');location.href = 'G-07-01.php';</script>";
        echo $alert_true;
    }
}catch (exception $ex) {
    $alert_false = "<script type='text/javascript'>alert('申し込みに失敗しました。');location.href = 'G-07-01.php';</script>";
    echo $alert_false;
}
?>



