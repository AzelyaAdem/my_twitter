<?php
class Database {
    protected $pdo = null;
    public function __construct() {
        try {
            $dsn = "mysql:host=localhost;dbname=common_database";
            $this->pdo = new PDO($dsn, 'root', '');
        }
        catch (Exception $e) {
            echo "Error : can't connect to database : " . $e;
        }
    }
}