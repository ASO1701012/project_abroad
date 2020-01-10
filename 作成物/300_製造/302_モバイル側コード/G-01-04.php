<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ASO English+</title>
    <!-- bootstrap -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- headerfooterのcss -->
    <link rel="stylesheet" href="css/G-00.css">
    <!-- bootstrapのやつ -->
    <script src="js/jquery_sample.js"></script>
    <script src="js/jQuery-3.3.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <!-- bootstrapの上書き -->
    <link rel="stylesheet" href="css/G-01.css">

    <?php session_start();?>

    <script type="text/javascript">

        $(function(){

            function Get_dep(){
                var school_number = $('#school').val();

                //maker_val値 を select.php へ渡す
                $.ajax({
                    url: "G-01-04_select.php",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        school_number: school_number
                    }
                })
                    .done(function(data){
                        //selectタグ（子） の option値 を一旦削除
                        $('#department option').remove();
                        //schoolの”学校名を選択してください”を削除
                        $('select#school option[value="first"]').remove();
                        //select.php から戻って来た data の値をそれそれ optionタグ として生成し、
                        // #department に optionタグ を追加する
                        $.each(data, function(department_number, department_name){
                            $('#department').append($('<option>').text(department_name).attr('value', department_number));
                        });
                    })
                    .fail(function(){
                        console.log("失敗");
                    });
            }

            //selectタグ（親） が変更された場合
            $('[name=school]').on('change', function(){Get_dep()});

            //select school のvalueがfirstじゃない場合
            var x = $('#school').val();
            if (x != "first"){
                Get_dep();
            }
        });

    </script>

</head>
<body>
    <div class="body">
        <div class="entry_content_2">
            <!--文章-->
            <div class="entry_txts">
                <div class="entry_txt_big">
                    学校名と学科名を <br>選んでください </div>
                <div class="entry_txt_small">
                    Choose school name<br>
                    and department name.
                </div>
            </div>
            <form method="post" action="G-01-05.php">
                <div class="entry_selects">
                    <!-- 学校名 -->
                    <div class="form-group entry_school" onchange="getDep()">
                        <select name="school" id="school" class="form-control">
                            <option value="first">学校名を選択してください</option>
                            <?php
                            //DBからデータを取得
                            require "inc/db_connect.php";
                            $sql=$pdo->query('select * from school');
                            foreach ( $sql as $value ) {
                                if ($value['school_number']==$_SESSION['entry']['school']){
                                    echo '<option value="',$value['school_number'],'" selected>', $value['school_name'], '</option>';
                                }else{
                                    echo '<option value="',$value['school_number'],'">', $value['school_name'], '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <!-- 学科名 -->
                    <div class="form-group entry_department">
                        <select name="department" class="form-control" id="department">
                            <option>学校名を選択してください</option>
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