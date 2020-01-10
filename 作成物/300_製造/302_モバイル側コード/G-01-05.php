<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ASO English+</title>
    <!-- bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- headerfooterのcss -->
    <link rel="stylesheet" href="css/G-00.css">
    <!-- bootstrapの上書き -->
    <link rel="stylesheet" href="css/G-01.css">

    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <?php
    session_cache_limiter('none'); //ブラウザバック時の警告をなくす
    session_start();
    ?>

</head>
<body>
<div class="body">
    <div class="entry_content_2">
        <!--文章-->
        <div class="entry_txts">
            <div class="entry_txt_big">
                学年と担任の先生<br>を選んでください </div>
            <div class="entry_txt_small">
                Choose school year<br>
                and homeroom teacher.
            </div>
        </div>
        <form method="post" action="G-01-06.php">
            <div class="entry_selects">
                <!-- 学校名 -->
                <div class="form-group entry_school">
                    <select name="grade" class="form-control">
                        <?php
                        for ($i=1;$i<=4;$i++){
                            if ($i==$_SESSION['entry']['grade']){
                                echo '<option value="',$i,'">', $i."年生", '</option>';

                            }else{
                                echo '<option value="',$i,'" selected>', $i."年生", '</option>';

                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- 学科名 -->
                <div class="form-group entry_department">
                    <select name="teacher" class="form-control">

                        <?php session_start();?>

                        <?php
                        //G-01-04の情報をセッションに追加
                        $_SESSION['entry']['school']=$_POST['school'];
                        $_SESSION['entry']['department']=$_POST['department'];

                        //DBからデータを取得
                        require "inc/db_connect.php";
                        $school_number= $_POST['school'];
                        $sql = 'SELECT * FROM teacher WHERE school_number = :school_number';
                        $stmt=$pdo->prepare($sql);
                        $stmt->bindValue(':school_number', (int)$school_number, PDO::PARAM_INT);
                        $stmt->execute();
                        foreach ( $stmt as $value ) {
                            if ($value['teacher_number']==$_SESSION['entry']['teacher']){
                                echo '<option value="',$value['teacher_number'],'" selected>', $value['name'], '</option>';

                            }else{
                                echo '<option value="',$value['teacher_number'],'">', $value['name'], '</option>';

                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <!--　次にボタン　-->
            <div class="entry_btns">
                <div class="entry_next">
                    <button type="submit" class="btn btn-entry btn-lg">次へ</button>
                </div>
            </div>
        </form>
    </div>
    <!--　おまけの画像たち　-->
    <div class="entry_imgs">
    </div>
</div>
</body>
</html>