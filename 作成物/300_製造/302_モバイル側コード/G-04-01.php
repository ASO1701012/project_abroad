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
    <link rel="stylesheet" href="css/G-04.css">

    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!--  DB接続 -->
    <?php require('inc/db_connect.php');?>

</head>
<body>


<?php
////テスト用確認用　後で消す
//session_start();
//echo $_SESSION['user'];
//
//?>
<!--<form action="G-03-01.php" method="post">-->
<!--    <input type="submit" name="test" value="テスト用、セッション解除">-->
<!--</form>-->
<div class="body">
    <?php require('inc/G-00-00-head.php'); ?>
    <div class="home_switch">
        <a href="G-04-02.php">
            <button type="button" class="btn btn-to-01 btn-sm">　留学　</button>
        </a>
    </div>
    <div class="home_calender">
        <?php
        // 現在の年月を取得
        $year = date('Y');
        $month = date('n');
        // 月末日を取得
        $last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
        $calendar = array();
        $j = 0;
        // 月末日までループ
        for ($i = 1; $i < $last_day + 1; $i++) {
            // 曜日を取得
            $week = date('w', mktime(0, 0, 0, $month, $i, $year));
            // 1日の場合
            if ($i == 1) {
                // 1日目の曜日までをループ
                for ($s = 1; $s <= $week; $s++) {
                    // 前半に空文字をセット
                    $calendar[$j]['day'] = '';
                    //講座名もから文字をセット
                    $calendar[$j]['lesson']='';

                    $j++;
                }
            }
            if($i<10){
                $day='0'.$i;
            }else{
                $day = $i;
            }
            $today = $year.'-'.$month.'-'.$day;
//            $today = "2019-11-25";
            // 配列に日付をセット
            $calendar[$j]['day'] = $i;

//          講座をカレンダーに載せる

            $sql = 'SELECT course_name,event_date,course_number FROM course_overview WHERE DATE(event_date) = ?';
            $item =$pdo ->prepare($sql);
            $array = array($today);
            $item -> execute($array);

//          現在for文で回している日付に対応している講座が存在するか判定する
            if($item == null){
                $calendar[$j]['lesson']="";
                
            }
            else{
                $calendar[$j]['lesson']="";

                foreach ($item as $items){
                    $calendar[$j]['lesson']=$items["course_name"];

                }

            }

            $j++;
            // 月末日の場合
            if ($i == $last_day) {
                // 月末日から残りをループ
                for ($e = 1; $e <= 6 - $week; $e++) {
                    // 後半に空文字をセット
                    $calendar[$j]['day'] = '';
                    //講座名もから文字をセット
                    $calendar[$j]['lesson']='';
                    $j++;
                }
            }
        }
        ?>
        <table>
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            <tr>
                <?php $cnt = 0; ?>
                <?php foreach ($calendar as $key => $value): ?>
                <td>
                    <?php $cnt++; ?>
                    <?php echo htmlspecialchars($value['day']) ; ?>
                    <p class="table_lesson">
                        <?php echo htmlspecialchars($value['lesson']);  ?>
                    </p>
                </td>
                <?php if ($cnt == 7): ?>
            </tr>
            <tr>
                <?php $cnt = 0; ?>
                <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        </table>
    </div>
    <div class="home_list">
        <div class="home_list_txt">
            <?php
//              講座取得処理 開催日時が新しいものを上に５つ表示する
                $sql = 'SELECT course_name,course_number FROM course_overview ORDER BY event_date DESC limit 5;';

                $item = $pdo -> query($sql);

                foreach ($item as $items){

                    echo '<form action="G-07-02.php" method="post">
                            <input type="hidden" name="number" value='.$items["course_number"].'>
                            <input type="submit" value='.htmlspecialchars($items["course_name"]) .' class="submit_button">
                          </form>';
                }
            ?>
<!--            <p>2019/09/06　スポーツ English</p>-->
<!--            <p>2019/11/04　文法講座</p>-->
<!--            <p>サンプルテキスト</p>-->

        </div>
    </div>
    <?php require('inc/G-00-00-foot.php'); ?>
</div>
</body>

</html>
