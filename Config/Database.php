<?php

class Database
{

    public static $db;

    public function __construct()
    {
        try {
            self::$db = new PDO('mysql:host=localhost;dbname=bd_noticias', 'root', '');
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function connect(){
        return self::$db;
    }


}
