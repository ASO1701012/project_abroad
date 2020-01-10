<?php

require_once("../class/Controll/account/operation/notification/SendList.php");
require_once("../class/Controll/account/operation/notification/SendCourse.php");
require_once("../class/Model/account/notification/NotificationSend.php");

//学校データ読み込み
$db = new SendList();
$school = $db ->selectSendlist();

//コースデータ読み込み
$db = new SendCourse();
$course = $db ->selectSendCourse();

?>

<?php


$server = "mysql:host=localhost;dbname=abroad;charset=utf8";
$userName = "root";
$password = "password";

try {
    $pdo = new PDO($server, $userName, $password);
} catch (Exception $e) {
    echo 'error' . $e->getMesseage;
    die();
}


if(isset($_POST['noti'])){
    //通知処理
    if(isset($_POST['school_select'])){

        $sql = 'SELECT LINE_ID
                    FROM user U 
                    INNER JOIN affiliation_management a ON U.affiliation_number = a.affilation_number
                    LEFT OUTER JOIN course_participant cp ON U.student_number = cp.student_number
                    WHERE ';
        $cnt = 0;
        $where="";
        foreach ($_POST['school_select'] as $items){
            if($cnt == 0){
                $where ="(a.school_number = '".$items."'";
            }else{
                $where = $where."OR a.school_number = '".$items."'";
            }

            $cnt++;
        }
        $where = $where.")";

        if($_POST['course_select'] == 'no_course'){

        }else{
            $where = $where."AND cp.course_number = '".$_POST['course_select']."'";
        }
        $sql = $sql.$where.";";
    }else{
        $sql = 'SELECT LINE_ID
                    FROM user ;';
    }
    $lineids = $pdo -> query($sql);

    $msg = $_POST['body'];
//            var_dump($lineids);

//LINEBOTのアクセストークン
    $access_token = '6Yj5elLhwp11PkzRQxlh7FDW0JGBQdzxORrU2J5Q8GziIwnqA7o6NkvwcXTcMDZ+Eamt92KMUuLCjIdT0UAryKJPz2o3ykNtn5Q3N4hSEjOPTgT+3XyYmoqyTO4Ath07hQD30+331QooAwH4fNWiaQdB04t89/1O/w1cDnyilFU=';

//LINEBOT送信用
    $url = 'https://api.line.me/v2/bot/message/push';


// ヘッダーの作成
    $headers = array('Content-Type: application/json',
        'Authorization: Bearer ' . $access_token);

// 送信するメッセージ作成
    $message = array('type' => 'text',
        'text' => $msg);


//送信者の数だけ繰り返し
    foreach ($lineids as $id){
        if($id['LINE_ID'] == null){
        }else{

            //送信先指定、送信先に作成したメッセージを付与
            $body = json_encode(array('to' => $id['LINE_ID'],
                'messages'   => array($message)));  // 複数送る場合は、array($mesg1,$mesg2) とする。


            // 送り出し用
            $options = array(CURLOPT_URL            => $url,
                CURLOPT_CUSTOMREQUEST  => 'POST',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER     => $headers,
                CURLOPT_POSTFIELDS     => $body);
            $curl = curl_init();
            curl_setopt_array($curl, $options);
            curl_exec($curl);
            curl_close($curl);

        }

//        echo $id['LINE_ID'];
//        echo "<br/>";


    }

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/notification.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/logout.js"></script>
    <script type="text/javascript" src="../js/jquery_ui/jquery-ui.js"></script>
    <link rel="stylesheet" href="../js/jquery_ui/jquery-ui.css">

    <link href="../js/jquery_multi/css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
    <script src="../js/jquery_multi/js/jquery.multi-select.js" type="text/javascript"></script>


    <script src="../js/notification.js" type="text/javascript"></script>


</head>
<body>
<?php include ("../sharedfile/header.php");?>
<?php

?>
<ul class="main-header sub-header">
    <li id="sub-header-1">学生</li>
    <li id="sub-header-2">管理者</li>
</ul>
<div class="top"></div>
<div id="main-content">
    <div id="send-content">
        <div class="course-input-content">
            <form action="notification.php" method="post" onSubmit="return check()">
                <div id="send-input">
                    <dl>
                        <dt>送信先(右側のリストに入ってるグループに送信する)</dt>
                        <dd>
                            <select multiple="multiple" id="my-select" name="school_select[]">
                                <!--    通知先学校選択機能       -->
                                <?php
                                foreach ($school as $item){
                                    ?>
                                    <option value='<?php echo htmlspecialchars($item['school_number']) ;?>'>
                                        <?php
                                        echo htmlspecialchars($item['school_name']);
                                        ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </dd>

                        <dt>案内講座</dt>
                        <dd>
                            <select name="course_select">
                                <option value="no_course" selected>講座選択なし</option>
                                <?php
                                foreach ($course as $item){
                                    ?>
                                    <option value='<?php echo htmlspecialchars($item['course_number']) ;?>'>
                                        <?php
                                        echo htmlspecialchars($item['course_name']);
                                        ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </dd>

                        <!--                        <div class="content-1">-->
                        <!--                            <dt>講座申込み</dt>-->
                        <!--                            <dd>-->
                        <!--                                <select name="req">-->
                        <!--                                    <option value="">申込済</option>-->
                        <!--                                    <option value="">未申込</option>-->
                        <!--                                </select>-->
                        <!--                            </dd>-->
                        <!--                        </div>-->
                        <!---->
                        <!--                        <div class="content-1 content-2">-->
                        <!--                            <dt>留学予定</dt>-->
                        <!--                            <dd>-->
                        <!--                                <select name="sche">-->
                        <!--                                    <option value="">予定あり</option>-->
                        <!--                                    <option value="">予定なし</option>-->
                        <!--                                </select>-->
                        <!--                            </dd>-->
                        <!--                        </div>-->

                        <dt>内容</dt>
                        <dd>
                            <textarea name="body" placeholder="ここに通知する内容を記載してください"></textarea>
                        </dd>

                        <!--                        <div class="content-1">-->
                        <!--                            <dt>添付画像</dt>-->
                        <!--                            <dd><input type="file" name="img"></dd>-->
                        <!--                        </div>-->
                        <input type="hidden" name="noti" value="ok">
                        <div class="content-1">
                            <input type="submit" value="選択送信" id ='submit-button'>
                        </div>
                        <form action="notification.php" method="post" onSubmit="return check2()" >
                            <div class="content-1">
                                <input type="hidden" name="noti" value="ok">
                                <input type="submit" value="全体送信" id ='submit-button'>
                            </div>
                        </form>
                    </dl>

                </div>
            </form>

            <div id="send-history">
                <div class="send-history-title">
                    <table class="table1">
                        <thead>
                        <tr>
                            <th>送信日時</th>
                            <th>講座名</th>
                            <th>送信先</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="send-history-list">
                    <table class="table2">
                        <tbody>
                        <tr>
                            <td>2019/09/02</td>
                            <td>文法講座</td>
                            <td>講座申込済み</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="send-img">
        <div class="box"></div>
    </div>

    <div id="main-css"></div>
    <div id="main-js"></div>
</div>
</body>
</html>