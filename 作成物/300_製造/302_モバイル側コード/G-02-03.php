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

    <?php
    session_start();
    require "inc/db_connect.php";

    /*動くように値直で入れてます。実装時は下の値を代入してください*/
    $_SESSION['user']=1700002;
    $student_number=$_SESSION['user'];

    $sql = 'insert into study_abroad_plan(target_school, start_study_abroad, period) values (:target_school,:start_study_abroad,:period)';
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':target_school', $_SESSION['abroad']['school'], PDO::PARAM_INT);
    $stmt->bindValue(':start_study_abroad', date($_SESSION['abroad']['start']), PDO::PARAM_STR);
    $stmt->bindValue(':period', (int)$_SESSION['abroad']['period'], PDO::PARAM_INT);
    $stmt->execute();


    $sql=$pdo->prepare('select max(management_number) from study_abroad_plan');
    $sql->execute();
    $plan_num=$sql->fetchColumn();

    $sql = 'UPDATE user SET study_abroad_plan=:study_abroad_plan WHERE student_number=:student_number;';
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':study_abroad_plan', (int)$plan_num, PDO::PARAM_INT);
    $stmt->bindValue(':student_number', (int)$student_number, PDO::PARAM_INT);
    $stmt->execute();

    ?>


</head>
<body>
<a href="G-03-01.php">
    <div class="body">
        <div class="entry_content_1">
            <div class="entry_txt_big">
                おつかれさまでした！<br>
                全ての登録が終わりました<br>
            </div>
            <div class="entry_txt_small">
                Thanks for your work.<br>
                All registration is over.
            </div>
        </div>
    </div>
</a>
</body>
</html>