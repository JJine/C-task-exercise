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

    public function execute(string $sql, array $datas = []) : int
    {
        $q = self::getDB()->prepare($sql);
        return $q->execute($datas);
    }
}