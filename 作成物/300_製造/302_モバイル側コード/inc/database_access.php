<?php

//データベース接続
use Cassandra\Date;

$server = "52.192.204.29";
//$server="localhost";
$userName = "root";
$password = "password";
$dbName = "abroad";

$mysqli = new mysqli($server,$userName,$password,$dbName);

if ($mysqli->connect_error){
    echo $mysqli->connect_error;
    exit();
}else{
    $mysqli->set_charset("utf8");
}
?>
