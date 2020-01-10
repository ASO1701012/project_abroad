<?php

//csrf対策クラス
class CsrfMeasures
{
    public static function input(){
        $token = base64_encode(openssl_random_pseudo_bytes(32));
        $_SESSION["token"] = $token;
        return $token;
    }

    public static function validation(){
        if(!empty($_POST["token"])){
            $token1 = $_POST["token"];
            $token2 = $_SESSION["token"];
            if($token1 === $token2){
                return True;
            }else{
                print_r("トークンが一致しません\n");
                return False;
            }
        }else{
            print_r("tokenが送られていません\n");
            return False;
        }
    }
}


