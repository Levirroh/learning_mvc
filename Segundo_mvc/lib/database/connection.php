<?php

abstract class Connection{
    private static $conn;

    public static function getConn()
    {
        if (self::$conn == null){
            self::$conn = new PDO('mysql: host=localhost; dbname=SAEP_DB_johanngr', 'root', 'root');
        }    
        return self::$conn;
    }
}