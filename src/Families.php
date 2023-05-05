<?php

namespace Donatorm\Ud52;

use PDOException;

class Families extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getFamilies(): array
    {
        $queryGetFamilies = "select * from familias order by nombre";
        $stmt = $this->connection->prepare($queryGetFamilies);
        try {
            $stmt->execute();
        } catch (PDOException $ex8) {
            echo "Error recuperando Familias. Mensaje: " . $ex8->getMessage();
            die();
        }
        $families = $stmt->fetchAll();
        $stmt = null;
        return $families;
    }
}
