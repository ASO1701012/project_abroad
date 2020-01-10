<?php
//if (empty($_POST['number'])) {
//    header('Location: lesson_list.php');
//    exit();
//}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/G-07.css">
</head>
<?php
require "inc/database_access.php";
?>
<?php
$sql = "SELECT * FROM course_overview WHERE course_number = {$_POST["number"]}";

$result = $mysqli -> query($sql);

//クエリー失敗
if(!$result) {
    echo $mysqli->error;
    exit();
}

//レコード件数
$row_count = $result->num_rows;

//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}

//結果セットを解放
$result->free();

// データベース切断
$mysqli->close();

?>

<?php
foreach ($rows as $row){
?>
<div class="lesson_detail_head">
    <h1 class="lesson_detail_head_name">
        <?php echo htmlspecialchars($row['course_name'], ENT_QUOTES, 'UTF-8'); ?>
    </h1>
</div>
<div class="lesson_detail">
    <h6 class="lesson_detail_label">日時</h6>
    <div class="lesson_detail_text" id="lesson_date">
        <?php echo date('Y/m/d H:i',strtotime(htmlspecialchars($row['event_date'], ENT_QUOTES, 'UTF-8')));?>
        〜
        <?php echo date('H:i',strtotime(htmlspecialchars($row['end_time'], ENT_QUOTES, 'UTF-8'))); ?>
    </div>
    <h6 class="lesson_detail_label">場所</h6>
    <div class="lesson_detail_text" id="lesson_place">
        <?php echo htmlspecialchars($row['place'], ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <h6 class="lesson_detail_label">詳細</h6>
    <div class="lesson_detail_text" id="lesson_explain">
        <?php echo htmlspecialchars($row['body'], ENT_QUOTES, 'UTF-8'); ?>
    </div>
</div>
<!-- classを変えるとボタンの色等が変わります -->
<!--    <div class="lesson_detail_apply">-->
<!--        <button type="button" class="mybtn btn-apply" id="lesson_apply_btn">Apply</button>-->
<!--    </div>-->
<div class="lesson_detail_apply">

    <?php

    require "inc/db_connect.php";
    session_start();

    $course_number=$_POST['number'];
    $student_number=$_SESSION['user'];

    $sql = 'select count(*) from course_participant WHERE student_number=:student_number and course_number=:course_number';
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':course_number', $course_number, PDO::PARAM_INT);
    $stmt->bindValue(':student_number', $student_number, PDO::PARAM_INT);
    $stmt->execute();
    $flag=$stmt->fetchColumn();
    //1なら申し込み済み

    if(isset($_POST['cancel_why'])){

        echo '<form action="lesson_cancel.php" method="POST">';
        echo '<input type="hidden" value="'.$course_number.'" name="number">';
        echo '<button type="submit" class="mybtn btn-apply" id="lesson_apply_btn" name="cancel_why">キャンセル</button>';
        echo '<div class="lesson_cancel"><textarea rows="5" class="lesson_cancel_txt" name="cancel_reason" placeholder="キャンセル理由を入力してください"></textarea></div>';
        echo '</form>';

    }else{

        if ($flag==1){
            echo '<form action="G-07-02.php" method="POST">';
            echo '<input type="hidden" value="'.$course_number.'" name="number">';
            echo '<button type="submit" class="mybtn btn-cancel" id="lesson_apply_btn" name="cancel_why">キャンセル</button>';
            echo '</form>';
        }else
            //<a href="lesson_apply.php?number=<?php echo htmlspecialchars($row['course_number'], ENT_QUOTES, 'UTF-8');
            echo '<form action="lesson_apply.php" method="POST">';
        echo '<input type="hidden" value="'.$course_number.'" name="number">';
        echo '<button type="submit" class="mybtn btn-apply" id="lesson_apply_btn">申し込む</button>';
        echo '</form>';
    }

    }

    ?>

    <!--<input type="hidden" name="number" value="<?php echo htmlspecialchars($row['course_number'], ENT_QUOTES, 'UTF-8'); ?>">-->
    </a>
</div>

</html>

