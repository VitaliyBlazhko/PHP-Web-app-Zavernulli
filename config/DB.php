<?php

class DB
{
    protected static PDO $instance;

    public static function connect(): PDO
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO(
                    DSN,
                    DB_USER,
                    DB_PASSWORD,
                    DB_OPTS
                );
            } catch (PDOException $exception) {
                var_dump($exception->getMessage());
                die();
            }
        }

        return self::$instance;
    }
}