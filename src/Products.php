<?php

namespace Donatorm\Ud52;

use PDOException;

class Products extends Connection
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getListProducts(): array
    {
        $queryListProducts = "select * from productos order by nombre,id";
        $stmt = $this->connection->prepare($queryListProducts);
        try {
            $stmt->execute();
        } catch (PDOException $ex3) {
            echo "Error recuperando la Lista de Productos. Mensaje: " . $ex3->getMessage();
            die();
        }
        $listProducts = $stmt->fetchAll();
        return $listProducts;
    }
    public function deleteProduct(int $id): bool
    {
        $queryDeleteProduct = "delete from productos where id=:i";
        $stmt = $this->connection->prepare($queryDeleteProduct);
        try {
            $stmt->execute([
                ':i' => $id
            ]);
        } catch (PDOException $ex4) {
            echo "Error al Borrar el producto. Mensaje: " . $ex4->getMessage();
            die();
        }
        return true;
    }
    public function getProduct(int $id): array
    {
        $queryGetProduct = "select * from productos where id=:i";
        $stmt = $this->connection->prepare($queryGetProduct);
        try {
            $stmt->execute([
                ':i' => $id
            ]);
        } catch (PDOException $ex5) {
            echo "Error buscando Producto. Mensaje: " . $ex5->getMessage();
            die();
        }
        $product = $stmt->fetchAll()[0];
        $stmt = null;
        return $product;
    }
    public function validateShortName(string $shortName): bool
    {
        $queryValidateShortName = "select * from productos where nombre_corto=:nc";
        $stmt = $this->connection->prepare($queryValidateShortName);
        try {
            $stmt->execute([
                ':nc' => $shortName
            ]);
        } catch (PDOException $ex6) {
            echo "Error al comprobar Nombre Corto. Mensaje: " . $ex6->getMessage();
            die();
        }
        $tableResult = $stmt->fetchAll();
        $stmt = null;
        $valid = true;
        if (count($tableResult) !== 0) {
            $valid = false;
        }
        return $valid;
    }
    public function insertProduct(string $name, string $shortName, string $description, float $pvp, string $family): bool
    {
        $queryInsertProduct = "insert into productos(nombre,nombre_corto,descripcion,pvp,familia) values(:n,:nc,:d,:p,:f)";
        $stmt = $this->connection->prepare($queryInsertProduct);
        try {
            $stmt->execute([
                ':n' => $name,
                ':nc' => $shortName,
                ':d' => $description,
                ':p' => $pvp,
                ':f' => $family
            ]);
        } catch (PDOException $ex7) {
            echo "Error al insertar el Nuevo Producto. Mensaje: " . $ex7->getMessage();
            die();
        }
        return true;
    }
    public function updateProduct(int $id, string $name, string $shortName, string $description, float $pvp, string $family): bool
    {
        $queryUpdateProduct = "update productos set nombre=:n,nombre_corto=:nc,pvp=:p,familia=:f,descripcion=:d where id=:i";
        $stmt = $this->connection->prepare($queryUpdateProduct);
        try {
            $stmt->execute([
                ':i' => $id,
                ':n' => $name,
                ':nc' => $shortName,
                ':d' => $description,
                ':p' => $pvp,
                ':f' => $family
            ]);
        } catch (PDOException $ex8) {
            echo "Error al Actualizar el Producto" . $ex8->getMessage();
            die();
        }
        return true;
    }
}
