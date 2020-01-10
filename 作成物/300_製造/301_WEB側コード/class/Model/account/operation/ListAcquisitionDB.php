<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'operation'.DIRECTORY_SEPARATOR.'ListDB.php');
//require_once 'C:\xampp\htdocs\abroad_web\class\Model\account\operation\ListDB.php';

class ListAcquisitionDB extends ListDB
{
    public function normalList($sql)
    {
        try{
            $sql = sprintf($sql, $this->name);
            $stmt = $this->db->query($sql);
            $rows = $stmt->fetchAll();
            return $rows;
        }catch (PDOException $e){
            $e->getMessage();
        }
    }
}