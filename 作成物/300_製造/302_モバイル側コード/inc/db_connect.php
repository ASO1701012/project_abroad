<?php

    $server = "mysql:host=52.192.204.29;dbname=abroad;charset=utf8";
//    $server = "mysql:host=localhost;dbname=abroad;charset=utf8";
    $userName = "root";
    $password = "password";

    try{
        $pdo=new PDO($server,$userName,$password);
    }catch(Exception $e){
        echo 'error' .$e->getMesseage;
        die();
    }


?>
