<?php

class config
{
    private static $_instance;
    private $_pdo;

    private function __construct()
    {//private constructor:
        $this->_pdo = new PDO('mysql:host=localhost;dbname=crudDB;charset=utf8', 'root', 'root');//<-- connect here
        //You set attributes like so:
        $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //not setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);<-- PHP can't know which setAttribute method to call on what object
    }
    public static function getConnection()
    {
        if (self::$_instance === null)//don't check connection, check instance
        {
            self::$_instance = new config();
        }
        return self::$_instance;
    }
    //to TRULY ensure there is only 1 instance, you'll have to disable object cloning
    public function __clone()
    {
        return false;
    }
    public function __wakeup()
    {
        return false;
    }
}