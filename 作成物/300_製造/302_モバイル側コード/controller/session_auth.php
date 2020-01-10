<?php

class session_auth
{
    function require_unlogined_session()
    {
        // セッション開始
        @session_start();
        // ログインしていれば / に遷移
        if (isset($_SESSION['user'])) {
            header('Location: ./G-04-01.php');
            //　セッション終了
            @session_write_close();
            exit;
        }
        //　セッション終了
        @session_write_close();
    }

    function require_logined_session()
    {

        // セッション開始
        @session_start();
        // ログインしていなければ /login.php に遷移
        if (!isset($_SESSION['user'])) {
            ?>
            <script>
                alert("ログイン情報が切れたため、再ログインしてください");

                location.href = './G-03-01.php' ;
            </script><?php
            //　セッション終了
            @session_write_close();
            exit;
        }
        //　セッション終了
        @session_write_close();
    }

//    /**
//     * CSRFトークンの生成
//     *
//     * @return string トークン
//     */
//    function generate_token()
//    {
//        // セッションIDからハッシュを生成
//        return hash('sha256', session_id());
//    }
//
//    /**
//     * CSRFトークンの検証
//     *
//     * @param string $token
//     * @return bool 検証結果
//     */
//    function validate_token($token)
//    {
//        // 送信されてきた$tokenがこちらで生成したハッシュと一致するか検証
//        return $token === generate_token();
//    }
//
//    /**
//     * htmlspecialcharsのラッパー関数
//     *
//     * @param string $str
//     * @return string
//     */
//    function h($str)
//    {
//        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
//    }
}