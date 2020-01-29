<?php 

namespace Jine\App;

class DB {
    private static $db = null;  
    private static function getDB() 
    {
        if(is_null(self::$db)) {
            self::$db = new \PDO("mysql:host=localhost;dbname=todopage; charset=utf8mb4", "root", "");
        }
        return self::$db;
    }

    public function execute(string $sql, array $data = [])
    {
        $q = self::getDB()->prepare($sql);
        return $q->execute($data);
    }
    public function fetch(string $sql, array $data = []){
        $q = self::getDB()->prepare($sql);
        $q->execute($data);
        return $q->fetch();
    }

    public function fetchAll(string $sql, array $data = []){
        $q = self::getDB()->prepare($sql);
        $q->execute($data);
        return $q->fetchAll();
    }
}