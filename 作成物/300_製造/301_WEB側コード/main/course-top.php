<!DOCTYPE html>
<html lang="ja" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/course-top.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/header.js"></script>
<!--    <script src="../js/ajex.js"></script>-->

    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=abroad;charset=utf8', 'root', 'password');
    ?>


    <?php

    if(isset($_POST['course_name'])){

        $str = '-';
        $kara = ' ';
        $event_date = date($_POST['year'].$str.$_POST['event_date2'].$str.$_POST['event_date3'].$kara.$_POST['event_time']);

        $sql = $pdo->prepare('INSERT INTO course_overview(course_name, event_date, body, category, img_path, course_creator, place, end_time) VALUES (?,?,?,?,?,?,?,?);');
        $sql->execute([$_REQUEST['course_name'], $event_date, $_REQUEST['body'], $_REQUEST['category'],$_REQUEST['img_path'],$_REQUEST['course_creator'],$_REQUEST['place'], $_REQUEST['end_time']]);

    }

    ?>



</head>
<div>
<?php include ("../sharedfile/header.php");?>
    <div class="course-input">

        <form action="course-top.php" method='post' name="form">
            <!-- 今はなき画像の項目 -->
            <input type="hidden" name="img_path" value="aa">
            <!-- 作った人のID -->
            <input type="hidden" name="course_creator" value="9991002">



            <dl>
                <input type='hidden' name='command' value='insert'>

                <div class="course-input-content course-input-title">

                    <dt>講座名</dt>
                    <dd><input type="text" name="course_name" required></dd>

                </div>


                <div class="course-input-content course-input-category">

                    <dt>講座カテゴリー</dt>
                    <dd>
                        <?php
                        $PDO = new pdo('mysql:host=localhost;dbname=abroad;charset=utf8', 'root','password');
                        $sql = 'select  * from course_category';
                        $category = $PDO->query($sql)
                        ?>

                        <select name='category'>
                                <?php
                                foreach($category as $items){
                                    echo "<option value=".$items['category_number']. ">". $items['category_name']."</option>";
                                }
                                ?>
                        </select>
                    </dd>
                </div>

                <div class="course-input-content course-input-day">

                    <dt>開催日</dt>

                    <dd>
                        <!-- 年選択 -->
                        <select name="year">
                            <?php
                            $y=date('y');
                            for ($i=2019;$i<2051;$i++){
                                echo '<option value="'.$i.'" ';
                                if($i==$y){
                                    echo ' selected';
                                }echo '>'.$i.'</option>';
                            }
                            ?>
                        </select>
                        /
                        <!-- 月選択 -->
                        <select name="event_date2">
                            <?php
                            $m=date('m');
                            for ($i=1;$i<13;$i++){
                                echo '<option value="'.$i.'" ';
                                if($i==$m){
                                    echo ' selected';
                                }echo '>'.$i.'</option>';
                            }
                            ?>
                        </select>
                        /
                        <!-- 日選択 -->
                        <select name="event_date3">
                            <?php
                            $d=date('d');
                            for ($i=1;$i<32;$i++){
                                echo '<option value="'.$i.'" ';
                                if($i==$d){
                                    echo ' selected';
                                }
                                echo '>'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </dd>

                </div>

                <div class="course-input-content course-input-time">

                    <dt>開催時</dt>

                    <dd>
                        <input type="time" name="event_time" step="1" required>
                        ～
                        <input type="time" name="end_time" step="1" required>
                    </dd>

                </div>

                <div class="course-input-content course-input-venue">

                    <dt>開催場所</dt>

                    <dd>
                        <input type="text" name="place" required>教室
                    </dd>

                </div>

                <div class="course-input-content course-input-explanation">

                    <dt>講座詳細</dt>

                    <dd>
                        <textarea name="body" required></textarea>
                    </dd>
                </div>
            </dl>

            <input type='submit' value='新規作成' class="button-create">


        </form>


    </div>


    <div class="course-list" >
        <table class="tablecategory">
<!--            <thead>-->
<!--            <tr>-->
<!--                <th class="table">学籍番号</th>-->
<!--                <th>開催名</th>-->
<!--                <th>開催日</th>-->
<!--                <th>開催時</th>-->
<!--                <th>開催場所</th>-->
<!--                <th>カテゴリ</th>-->
<!--                <th>作成者</th>-->
<!--            </tr>-->
<!--            </thead>-->

            <tr>
                <td>
                <select name="refine">
                    <option value="">イベント名</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>
                    講座名
                </td>
                <td>
                    <select name="pullMenu" onChange="screenChange()">
                        <option value="">開催日</option>
                        <option value="course-date_syoujun.php">昇順</option>
                        <option value="course-date_koujun.php">降順</option>
                        <option value="course-top.php">元に戻る</option>
                    </select>
                </td>
                <script>
                    function screenChange(){
                        pullSellect = document.form.pullMenu.selectedIndex ;
                        location.href = document.form.pullMenu.options[pullSellect].value ;
                    }
                </script>
                <td>
                    <?php
                    $PDO = new pdo('mysql:host=localhost;dbname=abroad;charset=utf8', 'root','password');
                    $sql = 'select DISTINCT category from course_overview';
                    $category = $PDO->query($sql)
                    ?>

                    <form method='POST' action='course-top.php'>
                        <select name='category' onChange="cscreenChange()">
                            <?php
                            foreach($category as $items){
                                echo "<option value=".$items['category']. ">". $items['category']."</option>";
                            }
                            ?>
                        </select>
                </td>
                <script>
                    function cscreenChange(){
                        pullSellect = document.form.category.selectedIndex ;
                        location.href = document.form.category.options[pullSellect].value ;
                    }
                </script>
                <td>
                    <?php
                    $sql = 'select DISTINCT place from course_overview';
                    $place = $PDO->query($sql)
                    ?>
                        <select name='place' onChange="pscreenChange()">
                            <option value="course-top.php">開催場所</option>
                            <?php
                            foreach($place as $items){
                                echo "<option value=".$items['place']. ">". $items['place']."</option>";
                            }
                            ?>
                        </select>
                </td>
                <script>
                    function pscreenChange(){
                        ppullSellect = document.form.place.selectedIndex ;
                        location.href = document.form.place.options[ppullSellect].value ;
                    }
                </script>
                <td>
                    終了時時間
                </td>
            </tr>
        </table>
        </form>
        <div class="box">
            <table class="tablebody">
<!-- DB表示 -->
<?php
$PDO = new pdo('mysql:host=localhost;dbname=abroad;charset=utf8', 'root','password');

foreach ($PDO->query('select * from course_overview') as $row) {
    echo '<tr>';
    echo '<td>';

    echo '<form action="course-update.php" method="post">';
    echo '<input type="hidden" name="course_number" value=' . $row["course_number"] . '>';
    echo '<input type="submit" value=' . htmlspecialchars($row['course_name']) .' class="submit_button">';
    echo '</form>';

    echo '</td>';
    echo '<td>';
    echo $row['event_date'];
    echo '</td>';
    echo '<td>';
    echo $row['body'];
    echo '</td>';
    echo '<td>';
    echo $row['place'];
    echo '</td>';
    echo '<td>';
    echo $row['end_time'];
    echo '</tr>';
}
?>
            </table>
        </div>
    </div>

</div>

</body>

</html>

