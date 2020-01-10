<?php
require_once ($_SERVER['DOCUMENT_ROOT'].''.DIRECTORY_SEPARATOR.'abroad_web'.DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Model'.DIRECTORY_SEPARATOR.'ModelBase.php');
//require_once 'C:\xampp\htdocs\abroad_web\class\Model\ModelBase.php';

class ListDB extends ModelBase
{
    protected $name;

    public function __construct($e)
    {
        parent::__construct();
        $this->name = $e;
    }
}