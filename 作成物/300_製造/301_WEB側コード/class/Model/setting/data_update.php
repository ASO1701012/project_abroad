<?php
require_once ($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'ModelBase.php');

class data_update extends ModelBase
{
    public function mail_change($value,$id):bool {
        try{
            $sql = sprintf('
                UPDATE teacher SET email = "%s" WHERE teacher_number = %s;',
                $value,$id);
            $stmt = $this->db->prepare($sql);
            $ans = $stmt->execute();
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }

        //sql文の生成と値の埋め込み
        //sqlの実行準備
        //sqlの実行
        //true,falseを返す
    }

    public function country_change($value,$id):bool {
        try{
            $sql = sprintf('
                UPDATE teacher_responsible_country SET country_number = "%s" WHERE teacher_number = %s;',
                $value,$id);
            $stmt = $this->db->prepare($sql);
            $ans = $stmt->execute();
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }

    public function password_change($value,$id):bool {
        try{
            $sql = sprintf('
                UPDATE teacher SET password = "%s" WHERE teacher_number = %s;',
                $value,$id);
            $stmt = $this->db->prepare($sql);
            $ans = $stmt->execute();
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}