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
</head>
<div>
    <?php include ("../sharedfile/header.php");?>
    <form id="main-content">
        <div class="course-input">
            <dl>
                <form>
                </form>
                <form action="../class/course-top_output.php" method='post' name="form">
                    <input type='hidden' name='command' value='insert'>
                    <div class="course-input-content course-input-title">
                        <dt>講座名</dt>
                        <dd><input type="text" name="course_name" required></dd>

                    </div>

                    <input type="hidden" name="img_path" value="aa">

                    <div class="course-input-content course-input-category">

                        <dt>講座カテゴリー</dt>
                        <dd>
                            <?php
                            $PDO = new pdo('mysql:host=localhost;dbname=abroad;charset=utf8', 'root','password');
                            $sql = 'select DISTINCT category from course_overview';
                            $category = $PDO->query($sql)
                            ?>

                            <form method='POST' action='course-top.php'>
                                <select name='category'>
                                    <?php
                                    foreach($category as $items){
                                        echo "<option value=".$items['category']. "'>". $items['category']."</option>";
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
                                    <option <?php echo  $i;?>><?php echo $i;?></option>
                                <?php endfor;?>
                            </select>
                            /
                            <!-- 月選択 -->
                            <select name="event_date2">
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                                <option>08</option>
                                <option>09</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                            </select>
                            /
                            <!-- 日選択 -->
                            <select name="event_date3">
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                                <option>05</option>
                                <option>06</option>
                                <option>07</option>
                                <option>08</option>
                                <option>09</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
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

                    <input type="hidden" name="course_creator" value="9991002">

                    <div class="course-input-content course-input-venue">
                        <dt>開催場所</dt>
                        <dd><input type="text" name="place" required>教室</dd>
                    </div>
                    <div class="course-input-content course-input-explanation">
                        <dt>講座詳細</dt>
                        <textarea name="body" required></textarea>
                        </dd>
                    </div>
            </dl>
            <input type='submit' value='新規作成' class="button-create">
        </div>

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
            $PDO = new pdo('mysql:host=localhost;dbname=abroad;charset=utf8', 'root','password');

            foreach ($PDO->query('select * from course_overview order by event_date desc ') as $row) {
                echo "<form action='course-top.php' method='post'>";
                echo '<tr>';
                echo '<td>';
                echo '<a href="course-update.php">',$row["course_name"];
                echo '</a>';
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

