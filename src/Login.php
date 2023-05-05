<?php

namespace Donatorm\Ud52;

use PDOException;

class Login extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function validateLogin(string $user, string $pass): bool
    {
        $hashPass = hash('sha256', $pass);
        $queryValidateLogin = "select * from usuarios where usuario=:u and pass=:p";
        $stmt = $this->connection->prepare($queryValidateLogin);
        try {
            $stmt->execute([
                ':u' => $user,
                ':p' => $hashPass
            ]);
        } catch (PDOException $ex2) {
            echo "Error Validación Login. Mensaje: " . $ex2->getMessage();
            die();
        }
        $valido = true;
        if (count($stmt->fetchAll()) === 0) {
            $valido = false;
        }
        $stmt = null;
        return $valido;
    }
}
