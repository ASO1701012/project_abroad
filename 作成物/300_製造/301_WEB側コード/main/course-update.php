<!DOCTYPE html>
<html lang="ja" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/course-update.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/header.js"></script>
    <script>
        $(function(){
            $('#cource-user').on('click', function(){
                var form = $(this).parents('form');
                form.attr('action', $(this).data('action'));
                form.submit();
            });
        })
    </script>
    <!--    <script src="../js/ajex.js"></script>-->

    <?php
    $PDO = new pdo('mysql:host=localhost;dbname=abroad;charset=utf8', 'root','password');
    ?>


</head>
<div>

    <?php include ("../sharedfile/header.php");?>
    <div class="course-input">

        <form action="course-update.php" method='post' name="form">
            <!-- 今はなき画像の項目 -->
            <input type="hidden" name="img_path" value="aa">
            <!-- 作った人のID -->
            <input type="hidden" name="course_creator" value="9991002">

            <?php

            if(isset($_POST['course_number'])){
                $sql = ' select * from course_overview where course_number =:course_number';
                $stmt=$PDO->prepare($sql);
                $stmt->bindValue(':course_number', (int)$_POST['course_number'], PDO::PARAM_INT);
                $stmt->execute();
                $data=$stmt->fetch();

                preg_match("@([0-9]{4,})-([0-9]{1,2})-([0-9]{1,2})@",$data['event_date'],$date);

                //$date[0]; // 2015/5/8
                $year= $date[1]; // 2015
                $month= $date[2]; // 5
                $day= $date[3]; // 8

                $start=substr($data['event_date'], 11);

                //echo $start;
            }

            //更新ボタンを押した時
            if(isset($_POST['update'])){

                $str = '-';
                $kara = ' ';
                $event_date = date($_POST['year'].$str.$_POST['event_date2'].$str.$_POST['event_date3'].$kara.$_POST['event_time']);



                $sql = 'UPDATE course_overview SET course_name=:course_name, event_date=:event_date, body=:body, category=:category, place=:place, end_time=:end_time where course_number=:course_number';
                $stmt=$PDO->prepare($sql);
                $stmt->bindValue(':course_number', (int)$_POST['course_number'], PDO::PARAM_INT);
                $stmt->bindValue(':course_name', $_POST['course_name'], PDO::PARAM_STR);
                $stmt->bindValue(':event_date', $event_date, PDO::PARAM_STR);
                $stmt->bindValue(':body', $_POST['body'], PDO::PARAM_STR);
                $stmt->bindValue(':category', (int)$_POST['category'], PDO::PARAM_INT);
                $stmt->bindValue(':place', $_POST['place'], PDO::PARAM_STR);
                $stmt->bindValue(':end_time', $_POST['end_time'], PDO::PARAM_STR);

                $stmt->execute();
            }

            //参加者名簿を押した時
            if(isset($_POST['print'])){
                echo $_POST['print'];
            }


            ?>



            <dl>
                <input type='hidden' name='command' value='insert'>

                <div class="course-input-content course-input-title">

                    <dt>講座名</dt>
                    <dd><input type="text" name="course_name" required
                            <?php
                            echo ' value="'.$data['course_name'].'"';
                            ?>
                        ></dd>

                </div>


                <div class="course-input-content course-input-category">

                    <dt>講座カテゴリー</dt>
                    <dd>
                        <select name='category'>
                            <?php

                            $category=$PDO->query('select * from course_category');

                            foreach($category as $items){
                                echo '<option value="'.$items['category_number'].'"';

                                if($data['category']==$items['category_number']){
                                    echo 'selected';
                                }

                                echo '>'. $items['category_name'].'</option>';
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
                            for($i = 2019; $i<=2050; $i++):?>
                                <option
                                    <?php
                                    echo  'value='.$i;
                                    if($year==$i){
                                        echo ' selected';
                                    }
                                    ?>><?php echo $i;?></option>
                            <?php endfor;?>
                        </select>
                        /
                        <!-- 月選択 -->
                        <select name="event_date2">
                            <?php
                            for ($i=1;$i<13;$i++){
                                echo '<option value="'.$i.'" ';
                                if($i==$month){
                                    echo ' selected';
                                }echo '>'.$i.'</option>';
                            }
                            ?>
                        </select>
                        /
                        <!-- 日選択 -->
                        <select name="event_date3">
                            <?php
                            for ($i=1;$i<32;$i++){
                                echo '<option value="'.$i.'" ';
                                if($i==$day){
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
                        <input type="time" name="event_time" step="1" required
                            <?php
                            echo 'value="'.$start.'"';
                            ?>
                        >
                        ～
                        <input type="time" name="end_time" step="1" required
                            <?php
                            echo 'value="'.$data['end_time'].'"';
                            ?>
                        >
                    </dd>

                </div>

                <div class="course-input-content course-input-venue">

                    <dt>開催場所</dt>

                    <dd>
                        <input type="text" name="place" required
                            <?php
                            echo 'value="'.$data['place'].'"';
                            ?>
                        >教室
                    </dd>

                </div>

                <div class="course-input-content course-input-explanation">

                    <dt>講座詳細</dt>

                    <dd>
                        <?php
                        echo '<textarea name="body" required>'.$data['body'].'</textarea>';
                        ?>
                    </dd>
                </div>
            </dl>

            <input type="hidden" name="course_number" value="<?php echo $_POST['course_number'] ?>">

            <button class="button-create" id="cource-user" data-action="attendance_confirmation.php">参加者名簿</button>
<!--            <input type='submit' value='参加者名簿'  name="print">-->
            <input type='submit' value='更新' class="button-create" name="update">
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
            </td>
            <td>
                <select>
                    <option value="">カテゴリ</option>
                </select>
            </td>
            <td>
                <select>
                    <option value="">開催場所</option>
                </select>
            </td>
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
            foreach ($PDO->query('select * from course_overview') as $row) {
                echo '<tr>';
                echo '<td>';


                echo '<form action="course-update.php" method="post">
                      <input type="hidden" name="course_number" value=' . $row["course_number"] . '>
                      <input type="submit" value=' . htmlspecialchars($row['course_name']) .' class="submit_button">
                      </form>';

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
                echo "</form>";
            }
            ?>
        </table>
    </div>
</div>

</div>


</body>
</html>

