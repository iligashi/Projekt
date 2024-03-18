<?php
class Database {
    private const HOST = 'localhost';
    private const DATABASE = 'db';
    private const CHARSET = 'utf8mb4';

    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DATABASE . ";charset=" . self::CHARSET;

        try {
            $this->connection = new PDO($dsn, null, null);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function fetch($result) {
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchAll($result) {
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLastInsertId() {
        return $this->connection->lastInsertId();
    }

    public function __destruct() {
        $this->connection = null;
    }
}
?>
