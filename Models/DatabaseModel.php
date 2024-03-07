<?php

class Database {
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE = 'php';
    private $connection;

    public function connect() {
        try {
            $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DATABASE;
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            );

            $this->connection = new PDO($dsn, self::USERNAME, self::PASSWORD, $options);
            return $this->connection;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function close() {
        $this->connection = null;
    }
   
}

?>