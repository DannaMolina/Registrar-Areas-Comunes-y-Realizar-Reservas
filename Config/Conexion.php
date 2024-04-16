<?php

class Conexion
{

    public function conectar()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=condominio", "root", "123456789");
        return $pdo;
        //var_dump($pdo);
    }
}

$con = new Conexion();
$con->conectar();
