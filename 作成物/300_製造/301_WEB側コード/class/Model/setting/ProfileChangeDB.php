<?php
require_once ($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'operation'.DIRECTORY_SEPARATOR.'ListDB.php');
//require_once 'C:\xampp\htdocs\abroad_web\class\Model\account\operation\ListDB.php';
class ProfileChangeDB extends ListDB
{
    public function insert_db($data,$calum,$id){
        try{
            foreach ($data as $key=>$value){
                $sql= sprintf("UPDATE %s SET %s = '%s' WHERE %s = %s",$this->name,$key,$value,$calum,$id);
                $stmt = $this->db->prepare($sql);
                $res = $stmt->execute();
            }
            return true;
        }catch (PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
}