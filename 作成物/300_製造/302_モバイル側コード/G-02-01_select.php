<?php
//直接のページ遷移を阻止
$request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
if($request !== 'xmlhttprequest') exit;
//DBへの接続
try {
    require "inc/db_connect.php";
}
catch (Exception $e) {
    exit('データベース接続失敗'.$e->getMessage());
}
//Ajaxで渡ってきた値をもとに modelテーブル から該当する model を抽出
$country_number= $_POST['country_number'];
$sql = 'SELECT * FROM target_school WHERE country_number = :country_number';
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':country_number', (int)$country_number, PDO::PARAM_INT);
$stmt->execute();

//抽出された値を $model_list配列 に格納
$dep_list = array();
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $dep_list[$row['target_school_number']] = $row['school_name'];
}
header('Content-Type: application/json');
//json形式で index.php へバックする
echo json_encode($dep_list);
?>
