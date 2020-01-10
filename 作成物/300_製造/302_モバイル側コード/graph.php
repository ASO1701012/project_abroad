<!DOCTYPE html>

<?php
//require "inc/database_access.php";
$User_id = $_SESSION['user'];
//$User_id = ['1700002'];
?>

<head>
    <title>学習記録</title>
</head>

<meta charset="utf-8">
<script src="./js/Chart.js"></script>



<?php
$date_ago = date("Y-m-d",strtotime("-6 day"));
$date_now = date("Y-m-d");
?>

<?php
$sql = "SELECT * FROM learning_record WHERE student_number = ? GROUP BY learning_date ASC";
$sql2 = "SELECT learning_date , SUM(learning_time) as sumtime from learning_record WHERE student_number = ? group by learning_date ASC";
$data = [];

try {
    $dsn = "mysql:dbname=abroad;host=52.192.204.29;"; //13.112.30.188

    $pdo = new PDO($dsn, 'root', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //$stmt = $pdo->query($sql);
    //$data = $stmt->fetchAll();
    $data = $pdo ->prepare($sql);
    $data ->execute([$User_id]);
    //var_dump($data);
//    echo "<br>";
    //$ler = $pdo->query($sql2);
    //$data2 = $ler->fetchAll();
    $data2 = $pdo ->prepare($sql2);
    $data2 ->execute([$User_id]);

    //var_dump($data2);

    $array = [];
    foreach ($data as $value) {
        $array[] = $value['learning_time'];
    }
    $date = [];
    foreach ($data as $learning_date) {
        $date[] = $learning_date['learning_date'];
    }
    $sum = [];
    foreach ($data2 as $sumtime){
        $sum[] = $sumtime['sumtime'];
    }

} catch (Exception $e) {
    echo $e->getMessage();
}

//$result = $mysqli -> query($sql);
//
////クエリー失敗
//if(!$result) {
//    echo $mysqli->error;
//    exit();
//}
//
////レコード件数
//$row_count = $result->num_rows;
//
////連想配列で取得
//while($row = $result->fetch_array(MYSQLI_ASSOC)){
//    $rows[] = $row;
//}
//
////結果セットを解放
//$result->free();
//
//// データベース切断
//$mysqli->close();
//?>
<script>
    let $lertime = <?php echo json_encode($array); ?>;
    //console.log($lertime);

    // let $lerdate = <?php echo json_encode($date); ?>;
    //console.log($lerdate);
    let $sumlertime = <?php echo json_encode($sum); ?>;
    //console.log($sumlertime);
    <!--        --><?php
    //                foreach ($rows as $row){
    //        ?>
    //        $lertime =<?php //echo htmlspecialchars($row['lerning_time'], ENT_QUOTES, 'UTF-8'); ?>//;
    //        console.log($lertime);
    //        <?php
    //        }
    //        ?>

</script>
<script>
    let $sum_time_date = [];
    let $array_length = $sumlertime.length;
    console.log($array_length);
</script>
<script>
    for (let i = 0 ; i <= $array_length-1 ; i++ ) {
        if (i === 0) {
            $sum_time_date[i] = Number($sumlertime[i]);
        }else{
            $sum_time_date[i] = Number($sum_time_date[i-1]) + Number($sumlertime[i]);
        }
        console.log($sum_time_date);
    }
</script>






<body>
<canvas id="myChart" style="position: relative; height:85%; width:100%" ></canvas>
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        backgroundColor: "rgb(0,0,0)",
        data: {
            labels:  ['日','月','火','水','木','金','土'],
            datasets: [{
                label: '合計学習時間',
                type: "line",
                fill: false,
                data: $sum_time_date,
                borderColor: "rgb(0,0, 0)",
                yAxisID: "y-axis-1",

            }, {
                label: '学習時間',
                data: $sumlertime,
                borderColor: "rgb(0, 0, 0)",
                backgroundColor: "rgb(0 , 0, 0)",
                yAxisID: "y-axis-2",

            }]
        },
        options: {
            tooltips: {
                mode: 'nearest',
                intersect: false,

            },
            responsive: true,
            scales: {
                yAxes: [{
                    id: "y-axis-1",
                    type: "linear",
                    position: "left",
                    ticks: {
                        max: 600,
                        min: 0,
                        stepSize: 300,
                        fontSize: 5,
                    },
                }, {
                    id: "y-axis-2",
                    type: "linear",
                    position: "right",
                    ticks: {
                        max: 150,
                        min: 0,
                        stepSize:50,
                        fontSize: 5,

                    },
                    gridLines: {
                        drawOnChartArea: false,
                    },
                }],
            },
        }
    });
</script>
</body>
