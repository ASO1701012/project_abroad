<?php
require_once($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'account'.DIRECTORY_SEPARATOR.'notification'.DIRECTORY_SEPARATOR.'NotificationSelectDB.php');


class NotificationList extends NotificationSelectDB
{
    public function sendlist($sql)
    {
        try{
            $stmt = $this->db->query($sql);
            $rows = $stmt->fetchAll();
            return $rows;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}