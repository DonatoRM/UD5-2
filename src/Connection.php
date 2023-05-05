<?php

namespace Donatorm\Ud52;

use PDO;
use PDOException;

abstract class Connection
{
    protected PDO $connection;
    public function __construct(string $host = 'localhost', string $user = 'gestor', string $pass = 'secreto', string $db = 'proyecto', int $port = 3306, string $charset = 'utf8mb4')
    {
        $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=$charset";
        try {
            $this->connection = new PDO($dsn, $user, $pass);
        } catch (PDOException $ex1) {
            echo "Error de Conexión. Mensaje: " . $ex1->getMessage();
            die();
        }
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
