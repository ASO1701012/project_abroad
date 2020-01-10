<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/G-07.css">
    <script src="js/jQuery-3.3.1.min.js"></script>
</head>
</html>

<?php
    $userid = $_SESSION['user'];
    $result = null;
//  ソートを行なった場合、ソート処理を行う
    if(isset($_POST["sort"])){
        if($_POST["sort"] == "upper"){
            $sql = 'SELECT course_number,course_name,event_date FROM course_overview 
                    WHERE event_date > CURRENT_DATE AND course_number != ALL 
                    (SELECT course_participant.course_number 
                    FROM course_participant 
                    WHERE student_number = ?)
                    ORDER BY event_date;';
            $result = $pdo ->prepare($sql);
            $result ->execute([$userid]);
            foreach ($result as $row){
                $rows[] = $row;
            }

        }else if($_POST["sort"] =="lower"){
            $sql = 'SELECT course_number,course_name,event_date FROM course_overview 
                    WHERE event_date > CURRENT_DATE AND course_number != ALL 
                    (SELECT course_participant.course_number 
                    FROM course_participant 
                    WHERE student_number = ?)
                    ORDER BY event_date DESC;';
            $result = $pdo ->prepare($sql);
            $result ->execute([$userid]);
            foreach ($result as $row){
                $rows[] = $row;
            }
        }else if($_POST["sort"] =="event"){
            $sql = 'SELECT course_number,course_name,event_date 
                    FROM course_overview INNER JOIN course_category C ON course_overview.category = C.category_number
                    WHERE event_date > CURRENT_DATE AND category_number = 2 
                    AND course_number != ALL 
                    (SELECT course_participant.course_number 
                    FROM course_participant 
                    WHERE student_number = ?);';
            $result = $pdo ->prepare($sql);
            $result ->execute([$userid]);
            foreach ($result as $row){
                $rows[] = $row;
            }
        }else if($_POST["sort"] =="kouza"){
            $sql = 'SELECT course_number,course_name,event_date 
                    FROM course_overview INNER JOIN course_category C ON course_overview.category = C.category_number
                    WHERE event_date > CURRENT_DATE AND category_number = 3
                     AND course_number != ALL 
                    (SELECT course_participant.course_number 
                    FROM course_participant 
                    WHERE student_number = ?);';
            $result = $pdo ->prepare($sql);
            $result ->execute([$userid]);
            foreach ($result as $row){
                $rows[] = $row;
            }
        }else if($_POST["sort"] =="setumei"){
            $sql = 'SELECT course_number,course_name,event_date 
                    FROM course_overview INNER JOIN course_category C ON course_overview.category = C.category_number
                    WHERE event_date > CURRENT_DATE AND category_number = 1 
                    AND course_number != ALL 
                    (SELECT course_participant.course_number 
                    FROM course_participant 
                    WHERE student_number = ?);';
            $result = $pdo ->prepare($sql);
            $result ->execute([$userid]);
            foreach ($result as $row){
                $rows[] = $row;
            }
        }
    }
    else{   //ソート処理を行わない場合（最初にページに来た時
//        $sql = "SELECT * FROM course_overview WHERE event_date > CURRENT_DATE;";
        $sql = "SELECT *
                FROM course_overview co
                WHERE event_date > CURRENT_DATE AND course_number != ALL 
                    (SELECT course_participant.course_number 
                    FROM course_participant 
                    WHERE student_number = ?);";
        $result = $pdo ->prepare($sql);
        $result ->execute([$userid]);
        foreach ($result as $row){
            $rows[] = $row;
        }
    }



?>

<!--
<script>

    $(document).on('click', '.lesson_list_no', () => {
        let it = $($(this).attr('data-number'));
        // console.log(it);
        let number = it.attr('data-number');
        console.log(number);

        var form = document.createElement('form');
        var request = document.createElement('input');

        form.method = 'POST';
        form.action = 'lesson_detail_read.php';

        request.type = 'hidden';
        request.name = 'number';
        request.value = number;

        form.appendChild(request);
        document.body.appendChild(form);

        // form.submit();
    });
    */
</script>
-->


<div class="lesson_list">
    <?php
    if(isset($rows)) {  //講座の有無の判定  Trueが変えれば講座があるのでfor文を実行

        if(count($rows)>1){
            //2こ以上
            $i=0;
            foreach ($rows as $row) {   //講座を一件ずつ表示する
                ?>
                <form action="G-07-02.php" method="post" name="myForm">
                    <input type="hidden" name="number" value="<?php echo htmlspecialchars($row['course_number'], ENT_QUOTES, 'UTF-8'); ?>">
                    <a href="javascript:myForm[<?php echo $i; ?>].submit()">
                        <div class="lesson_list_no">
                            <b class="lesson_list_now" hidden>開催中</b>
                            <div class="lesson_list_name h4"><?php echo htmlspecialchars($row['course_name'], ENT_QUOTES, 'UTF-8'); ?></div>
                            <div class="lesson_list_sub">
                                <div class="lesson_list_sub_date text-right"><?php echo date('Y/m/d', strtotime(htmlspecialchars($row['event_date'], ENT_QUOTES, 'UTF-8'))); ?></div>
                            </div>
                        </div>
                    </a>
                </form>
                <?php
                $i++;
            }
        }else {
            foreach ($rows as $row) {   //講座を一件ずつ表示する
                ?>
                <form action="G-07-02.php" method="post" name="myForm">
                    <input type="hidden" name="number"
                           value="<?php echo htmlspecialchars($row['course_number'], ENT_QUOTES, 'UTF-8'); ?>">
                    <a href="javascript:myForm.submit()">
                        <div class="lesson_list_no">
                            <b class="lesson_list_now" hidden>開催中</b>
                            <div class="lesson_list_name h4"><?php echo htmlspecialchars($row['course_name'], ENT_QUOTES, 'UTF-8'); ?></div>
                            <div class="lesson_list_sub">
                                <div class="lesson_list_sub_date text-right"><?php echo date('Y/m/d', strtotime(htmlspecialchars($row['event_date'], ENT_QUOTES, 'UTF-8'))); ?></div>
                            </div>
                        </div>
                    </a>
                </form>
                <?php
            }
        }

    }
    ?>
</div>

