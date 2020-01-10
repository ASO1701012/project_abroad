<?php
require_once ('../class/Controll/account/operation/Teacher/TeacherCategoryLearning.php');
require_once ('../class/Controll/account/operation/Teacher/TearcherListAcquisition.php');
require_once ('../class/Controll/account/login/LoginConfirmation.php');

session_start();
LoginConfirmation::Confirmation();

//セレクトボックスを読み込み
$lst = new TeacherCategoryLearning();
$category_data = json_decode($lst->category_get(),true);

//データを読み込み
$db = new TearcherListAcquisition();
$ans = $db->allLearned();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/teacher.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/teacher.js"></script>
    <script src="../js/TeacherTableInsertionProcess.js"></script>
</head>
<body>
<?php include ("../sharedfile/header.php");?>
<ul class="main-header sub-header">
    <li id="sub-header-1"><a href="user.php">ユーザー</a></li>
    <li id="sub-header-2"><a href="teacher.php">管理者</a></li>
</ul>
<div id="main-user">
    <table class="tablecategory">
        <thead>
        <tr>
            <th>教員番号</th>
            <th>姓名</th>
            <th>学校名</th>/
            <th>担当国名</th>
            <th>メール</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td>
                <select name="school" id="select-1">
                    <option value="all">全件</option>
                    <?php
                    //                        str_replace('_','&ensp',$category_data['school']);
                    foreach ($category_data['school'] as $key=>$value){
                        echo "<option value=$value[0]>$value[0]</option>";
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="country" id="select-2">
                    <option value="all">全件</option>
                    <?php
                    foreach ($category_data['country'] as $key=>$value){
                        echo "<option value=$value[0]>$value[0]</option>";
                    }
                    ?>
                </select>
            </td>
            <td></td>
        </tr>
        </tbody>
    </table>
    <div class="box">
        <table class="tablebody" id="table_body">
            <?php
            foreach ($ans as $value){
                echo "
                        <tr>
                            <td>$value[0]</td>
                            <td>$value[1]</td>
                            <td>$value[2]</td>
                            <td>$value[3]</td>
                            <td>$value[4]</td>
                        </tr>
                    ";
            }
            ?>
        </table>
    </div>

    <div class="button-csv">
        <form action="../class/Executionfile/TeacherCsv.php" method="get">
        <button>CSV出力</button>
        </form>
    </div>
</div>


</body>
</html>