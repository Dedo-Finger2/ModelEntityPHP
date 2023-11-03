<?php

namespace app\database;

use PDO;

abstract class Connection
{
    /**
     * Objeto contendo a conexão com o banco
     *
     * @var PDO|null
     */
    private static ?PDO $connect = null;


    /**
     * Método responsável por retornar a conexão com o banco de dados
     *
     * @return PDO - Objeto do tipo PDO
     */
    public static function getConnection(): PDO
    {
        if (self::$connect === null) {
            self::$connect = new PDO("mysql:host=localhost;dbname=rede_social","root","", [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }

        return self::$connect;
    }
}
