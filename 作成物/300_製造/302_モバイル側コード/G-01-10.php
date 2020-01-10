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

    <!-- DB接続  -->
    <?php require('inc/db_connect.php');?>
    <!--session スタート-->
    <?php session_start();?>

    <!-- LINE CALLBACK   -->
    <?php

    //必要なPOSTデータを作る
    $postData = array(
        'grant_type'    => 'authorization_code',
        'code'          => $_GET['code'],
        'redirect_uri'  => 'https://abroad.vxx0.com/abroad_mobile/G-01-10.php',   //リダイレクトURL
        'client_id'     => '1653646888',                                    //チャンネルID
        'client_secret' => '0838b40410496cbcd9b838d0ab6f5f5a'               //チャンネルシークレット
    );

    //ここからアクセストークン取得処理
    // 新しい cURL リソースを作成します
    $ch = curl_init();

    // URL や他の適当なオプションを設定します
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
    curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/oauth2/v2.1/token');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // URL を取得し、ブラウザに渡します
    $response = curl_exec($ch);

    // cURL リソースを閉じ、システムリソースを解放します
    curl_close($ch);

    $json = json_decode($response);
    $accessToken = $json->access_token;
    //ここまでアクセストークン処理

    //ここからアクセストークンを使い、ユーザー情報を取得する処理
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $accessToken));
    curl_setopt($ch, CURLOPT_URL, 'https://api.line.me/v2/profile');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response,true);
    //echo $json["userId"]["displayName"]["pictureUrl"]["statusMessage"]
    //var_dump(json_decode($response));
    //ここまでユーザ情報取得処理
    ?>

    <!--  保存処理ユーザー情報DB-->
    <?php
    $school=$_SESSION['entry']['school'];
    $department=$_SESSION['entry']['department'];
    $grade=$_SESSION['entry']['grade'];
    $teacher=$_SESSION['entry']['teacher'];
    $student_number=$_SESSION['entry']['student_number'];
    $kanji_sei=$_SESSION['entry']['kanji_sei'];
    $kanji_mei=$_SESSION['entry']['kanji_mei'];
    $kana_sei=$_SESSION['entry']['kana_sei'];
    $kana_mei=$_SESSION['entry']['kana_mei'];
    $pass=$_SESSION['entry']['pass'];
//  affiliation_managementテーブルに値を代入
    $sql = 'INSERT INTO affiliation_management(
                                    school_number,
                                    department_number,
                                    grade,
                                    responsible_number)
                            values( ?,
                                    ?,
                                    ?,
                                    ?
                            )';
    $insert = $pdo -> prepare($sql);
    $insert ->execute([$school,$department,$grade,$teacher]);

//  新しくaffiliation_managementテーブルに代入されたaffilation_numberを取得
    $last_id =$pdo->lastInsertId('affiliation_number');


////  ユーザーテーブルにユーザー情報を代入
        $sql = 'INSERT INTO user(   student_number,
                                    affiliation_number,
                                    kanji_sei,
                                    kanji_mei,
                                    kana_sei,
                                    kana_mei,
                                    password,
                                    LINE_ID
                                    )
                           values(  ?,
                                    ?,
                                    ?,
                                    ?,
                                    ?,
                                    ?,
                                    ?,
                                    ?
                                    )';
    $insert = $pdo->prepare($sql);
    //パスワードはHash値にして保存
    $insert ->execute([$student_number,$last_id,$kanji_sei,$kanji_mei,$kana_sei,$kana_mei,password_hash($pass,PASSWORD_DEFAULT),$json["userId"]]);
    unset($_SESSION['entry']);
    ?>






</head>
<body>
<a href="G-01-11.html">
    <div class="body">
        <div class="entry_content_1">
            <div class="entry_txt_big">
                おつかれさまです！<br>
                ユーザー登録が終わりました<br>
            </div>
            <div class="entry_txt_small">
                Is cheers for good work !<br>
                User registration is over.
            </div>

        </div>
    </div>
</a>
</body>
</html>