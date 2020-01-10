<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'operation'.DIRECTORY_SEPARATOR.'ListDB.php');


class ListRefineDB extends ListDB

{
    public function refineList($sql,$attribute, $content)
    {
        try{
            $sql = sprintf($sql, $this->name,$attribute,$content);
//            var_dump($sql);
            $stmt = $this->db->query($sql);
            $rows = $stmt->fetchAll();
            return $rows;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}