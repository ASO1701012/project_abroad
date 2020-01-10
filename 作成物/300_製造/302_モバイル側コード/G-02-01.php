<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

    <script type="text/javascript">
        $(function(){
            //selectタグ（親） が変更された場合
            $('[name=abroad_country]').on('change', function(){
                var country_number = $(this).val();

                //maker_val値 を select.php へ渡す
                $.ajax({
                    url: "G-02-01_select.php",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        country_number: country_number
                    }
                })
                    .done(function(data){
                        //selectタグ（子） の option値 を一旦削除
                        $('#abroad_school option').remove();
                        //select.php から戻って来た data の値をそれそれ optionタグ として生成し、
                        // #department に optionタグ を追加する
                        $.each(data, function(target_school_numebr, school_name){
                            $('#abroad_school').append($('<option>').text(school_name).attr('value', target_school_numebr));
                        });
                    })
                    .fail(function(){
                        console.log("失敗");
                    });

            });
        });
    </script>

    <?php
    session_cache_limiter('none'); //ブラウザバック時の警告をなくす
    session_start();
    ?>

</head>
<body>
<div class="body">
    <!-- 登録画面のHTMLCSSをなるべく再利用してます -->
    <div class="entry_content_2">
        <!--文章-->
        <div class="entry_txts">
            <div class="entry_txt_big">
                留学情報を選択してください
            </div>
            
            <div class="entry_txt_small">
                Please select your study abroad information.
            </div>
        </div>
        <form method="post" action="G-02-02.php">
        <div class="entry_abroad_selects">
            <!-- 国名 -->
            <div class="form-group entry_abroad_country">
                <select name="abroad_country" class="form-control">
                    <?php
                    //DBからデータを取得
                    require "inc/db_connect.php";
                    $sql=$pdo->query('select * from country');
                    foreach ( $sql as $value ) {
                        echo '<option value="',$value['country_number'],'"';
                        if(isset($_SESSION['abroad']['country'])){
                            if($value['country_number']==$_SESSION['abroad']['country']){
                                echo ' selected';
                            }
                        }
                        echo '>', $value['country_name'], '</option>';
                    }
                    ?>
                </select>
            </div>
            <!-- 留学先学校名 -->
            <div class="form-group entry_abroad_school">
                <select id="abroad_school" class="form-control" name="abroad_school">
                    <option>国名を選択してください</option>
                </select>
            </div>
            <!-- 留学期間 -->
            <div class="form-group entry_abroad_period">
                <select name="abroad_period" class="form-control">
                    <?php
                    $period=['14','30','270'];
                    foreach ($period as $data){
                        echo '<option value="'.$data.'"';
                        if(isset($_SESSION['abroad']['period'])){
                            if ($_SESSION['abroad']['period']==$data){
                                echo ' selected';
                            }
                        }
                        echo '>', $data, 'day</option>';
                    }
                    ?>
                </select>
            </div>
            <!-- 留学開始月 -->
            <div class="form-group entry_abroad_start">
                <select name="abroad_start" class="form-control">
                    <?php
                    $y=date('Y');
                    for ($i=0;$i<3;$i++){
                        $year=$y+$i;
                         for($j=1;$j<13;$j++){
                             echo '<option value="'.$year.'-'.$j.'-01"';
                             if(isset($_SESSION['abroad']['start'])){
                                 if(($year.'-'.$j.'-01')==$_SESSION['abroad']['start']){
                                     echo ' selected';
                                 }
                             }
                             echo '>'.$year.'年'.$j.'月〜</option>';
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