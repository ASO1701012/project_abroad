<?php

class ModelBase
{
    private static $connInfo;
    protected $db;
//    protected $name;

    public function __construct()
    {
        $this->initDb();
    }

    public function initDb()
    {
        self::$connInfo = [
            'host'     => 'localhost',
            'dbname'   => 'abroad',
            'dbuser'   => 'root',
            'password' => 'password'
        ];

        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;port=3306;charset=utf8;',
            self::$connInfo['host'],
            self::$connInfo['dbname']

        );

        $this->db = new PDO($dsn,self::$connInfo['dbuser'], self::$connInfo['password']);
    }

    public static function setConnectionInfo($connInfo)
    {
        self::$connInfo = [
            'host'     => 'localhost',
            'dbname'   => 'abroad',
            'dbuser'   => 'root',
            'password' => 'password'
        ];
    }
}