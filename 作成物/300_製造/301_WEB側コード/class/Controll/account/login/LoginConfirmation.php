<?php

class LoginConfirmation
{
    public static function Confirmation()
    {

        if (!empty($_SESSION["user_id"])) {
            return;
        } else {
            print_r("ログインしていません");
            header('location: login.php');
            exit();
        }
    }
}