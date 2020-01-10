<?php
require_once('../class/Controll/account/operation/User/UserCategoryLearning.php');

$cource_number = $_POST['course_number'];
$PDO = new pdo('mysql:host=localhost;dbname=abroad;charset=utf8', 'root','password');
$sql = 'SELECT
    user.student_number,school_name,department_name,name,grade,kanji_sei,kanji_mei,kana_sei,kana_mei,study_abroad_plan
FROM
    course_participant
        INNER JOIN
        user
            on course_participant.student_number = user.student_number
    INNER JOIN
    affiliation_management
ON  affiliation_management.affilation_number = user.affiliation_number
    INNER JOIN
    school
    ON  affiliation_management.school_number = school.school_number
    INNER JOIN
    department
    ON  affiliation_management.department_number = department.department_number
    INNER JOIN
    teacher
    ON affiliation_management.responsible_number = teacher.teacher_number
where course_number = ?;';
$sql = $PDO->prepare($sql);
$sql->bindValue(1,$cource_number);
$sql->execute();
$row = $sql->fetchAll();
$sql1 = 'SELECT course_name,body FROM course_overview where course_number = ?;';
$sql1 = $PDO->prepare($sql1);
$sql1->bindValue(1,$cource_number);
$sql1->execute();
$cource_overview = $sql1->fetch();
$course_name = $cource_overview['course_name'];
$cource_body = $cource_overview['body'];

$lst = new UserCategoryLearning();
$category_data = json_decode($lst->category_get(),true);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/attendance_confirmation.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/logout.js"></script>
</head>
<body>
<?php include ("../sharedfile/header.php");?>
<ul class="main-header sub-header">
    <li id="sub-header-1"><a href="user.php">ユーザー</a></li>
    <li id="sub-header-2"><a href="teacher.php">管理者</a></li>
</ul>
<div id="main-user">
    <div class="title">
        <dl>
            <?php
                echo "<dt>$course_name</dt>
                    <dd>$cource_body</dd>"
            ?>

        </dl>
    </div>
    <table class="tablecategory">
        <thead>
        <tr>
            <th class="table">学籍番号</th>
            <th>学校名</th>
            <th>学科</th>
            <th>担任名</th>
            <th>学年</th>
            <th>名前</th>
            <th>なまえ</th>
            <th>留学予定</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td>
                <select name="school_name" id="refine-select1">
                    <option value="all">全件</option>
                    <?php
                    //                        str_replace('_','&ensp',$category_data['school']);
                    foreach ($category_data['school'] as $key=>$value){
                        print "<option value=$value[0]>$value[0]</option>";
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="department" id="refine-select2">
                    <option value="all">全件</option>
                    <?php
                    foreach ($category_data['department'] as $key=>$value){
                        echo "<option value=$value[0]>$value[0]</option>";
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="teacher" id="refine-select3">
                    <option value="all">全件</option>
                    <?php
                    foreach ($category_data['teacher'] as $key=>$value){
                        echo "<option value=$value[0]>$value[0]</option>";
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="grade" id="refine-select4">
                    <option value="all">全件</option>
                    <?php
                    foreach ($category_data['grade'] as $key=>$value){
                        echo "<option value=$value[0]>$value[0]</option>";
                    }
                    ?>
                </select>
            </td>
            <td>

            </td>
            <td>

            </td>
            <td>
                <select name="plan" id="refine-select7">
                    <option value="all">全件</option>
                    <?php
                    echo "<option value='はい'>はい</option>";
                    echo "<option value='いいえ'>いいえ</option>";
                    ?>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
    <div class="box">
        <table class="tablebody">
            <!-- ここはphpでデータベースから持ってきて埋め込む-->
            <!-- 以下イメージ、上記の機能が完了後は削除-->

<!--            <div>-->
<!---->
<!---->
<!--                <tr class="tablebody1">-->
<!--                    <td><input type="checkbox"></td>-->
<!--                    <td>1801017</td>-->
<!--                    <td>麻生情報ビジネス専門学校</td>-->
<!--                    <td>情報システム専攻科</td>-->
<!--                    <td>久家まさと</td>-->
<!--                    <td>2年</td>-->
<!--                    <td>酒井　春華</td>-->
<!--                    <td>サカイ　ハルカ</td>-->
<!--                    <td>あり</td>-->
<!--                </tr>-->
<!---->
<!--            </div>-->
            <!-- こんなかんじ -->
            <?php
            foreach ($row as $value){
            if(is_null($value[9])){
            $value[9] = "いいえ";
            }else{
            $value[9] = "はい";
            }
            echo "
            <tr>
                <td><input type='checkbox'></td>
                <td>$value[0]</td>
                <td>$value[1]</td>
                <td>$value[2]</td>
                <td>$value[3]</td>
                <td>$value[4]年</td>
                <td>$value[5]　$value[6]</td>
                <td>$value[7]　$value[8]</td>
                <td>$value[9]</td>
            </tr>
            ";
            }
            ?>
        </table>
    </div>

    <div class="button-csv">
        <form action="../class/Executionfile/CourceUserCsv.php" method="post">
            <input type="hidden" value="<?php echo $cource_number ?>" name="cource_number">
        <button id="csv">CSV出力</button>
        </form>
    </div>
</div>


</body>
</html>