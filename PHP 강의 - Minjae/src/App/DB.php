<?php
namespace App;

class DB {
    static $connection = null;
    static function takeDB() {
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ //객체를 가져옴 
        ];

        if(self::$connection == null) {
            self::$connection = new \PDO("mysql:host=localhost;dbname=catdog200116;charset=utf8mb4", "root", "", $options);
        }
        return self::$connection;
    }
    static function query($sql, $data = []) {
        // SELECT, DELETE, INSERT, UPDATE
        $q = self::takeDB()->prepare($sql); 
        $q->execute($data);
        return $q;
        // return self::takeDB()->prepare($sql)->execute($data);
    }
    static function fetch($sql, $data = []) {
        return self::query($sql, $data)->fetch();
    }
    static function fetchAll($sql, $data = []) {
        return self::query($sql, $data)->fetchAll();
    }
}