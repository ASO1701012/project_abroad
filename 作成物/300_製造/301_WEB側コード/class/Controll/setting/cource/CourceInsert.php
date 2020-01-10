<?php
require_once $_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'setting'.DIRECTORY_SEPARATOR.'cource'.DIRECTORY_SEPARATOR.'CourceInsertDB.php';

class CourceInsert
{
    private $db;

    public function __construct()
    {
        $this->db = new CourceInsertDB();
    }

    public function insert($data): string
{
    $ans = $this->db->insert($data);
    if ($ans) {
        return '成功しました';
    } else {
        return '失敗しました';
    }
}
}