<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
</head>
<body>
<canvas id="myPieChart"  style="position: relative; height:100%; width:100%" ></canvas>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

<script>
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['正解','不正解'],
            datasets: [{
                backgroundColor: [
                    "#000000",
                    "#FFFFFF",
                ],
                data: [50,50],
            }]
        },
        options: {
            title: {
                display: true,
                text: '正解率'
            }
        }
    });
</script>
</body>
</html>