<?php
require_once $_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'data_update.php';
//更新を行うクラス
class OwnProfileChange
{
    private $db;

    public function update_profile($data,$id){
        //何のデータがあるか判定を行う
        $this->db = new data_update();
//        var_dump($data);
        if (!$data['mail']==''){
            //メール
            $ans = $this->db->mail_change($data['mail'],$id);
        }
        if (!$data['country']==''){
            //国
            $this->db->country_change($data['country'],$id);
        }
        if (!$data['password1']=='' && !$data['password2']==''){
            //パスワード
            $ans = password_hash($data['password1'], PASSWORD_DEFAULT );
            $this->db->password_change($ans,$id);
        }

        ///!!!!!!!!!!以下は未実装です！！！！！！！！！！！！！！！！
        //本当ならここでトランザクション処理
        //更新がすべて完了したら完了を通知して遷移
        //失敗したら通知して遷移

    }
}