<?php
//直接のページ遷移を阻止
$request = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) : '';
if($request !== 'xmlhttprequest') exit;
//DBへの接続
//本来は db_connect関数 を作成して、DRYにした方が良いです。
try {
    require "inc/db_connect.php";
}
catch (Exception $e) {
    exit('データベース接続失敗'.$e->getMessage());
}
//Ajaxで渡ってきた値をもとに modelテーブル から該当する model を抽出
$school_number= $_POST['school_number'];
$sql = 'SELECT * FROM department WHERE school_number = :school_number';
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':school_number', (int)$school_number, PDO::PARAM_INT);
$stmt->execute();

//抽出された値を $model_list配列 に格納
$dep_list = array();
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    $dep_list[$row['department_number']] = $row['department_name'];
}
header('Content-Type: application/json');
//json形式で index.php へバックする
echo json_encode($dep_list);
?>
