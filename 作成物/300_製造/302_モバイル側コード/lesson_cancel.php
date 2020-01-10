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
    <script>
        const send_from = 'aso1701024@gmail.com';
        const send_to = 'maccha719@icloud.com';
        let Title = '<?php echo $Course_id?>';
        let body = '<?php echo htmlspecialchars($_POST['cancel_reason'])?>';
        const smtp = 'smtp.elasticemail.com';
        const key = 'be523bed-d854-4d85-be0b-46eaeca7404c';
    </script>

    <script src='https://smtpjs.com/v2/smtp.js'></script>
    <script>
            Email.send(send_from,
                send_to,
                Title,
                body,
                smtp,
                send_from,
                key);
    </script>
<?php
try {
    if ($Course_id == null) {
        throw new Exception('キャンセル失敗');
    }else {
        $sql = "delete from course_participant where course_number=? and student_number=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$Course_id, $User_id]);  //ユーザーのIDを入れる session or cookie [$_SESSION['変数']]
        $alert_true = "<script type='text/javascript'>alert('キャンセルが完了しました。');location.href = 'G-07-01.php';</script>";
        echo $alert_true;
        echo '<script>';
    }
}catch (exception $ex) {
    $alert_false = "<script type='text/javascript'>alert('キャンセルに失敗しました。');location.href = 'G-07-01.php';</script>";
    echo $alert_false;
}
?>