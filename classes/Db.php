<?php

/**
 * Design Pattern Singleton
 * man möchte nur 1 Objekt in der Klasse haben
 */

class Db
{
    private static object $dbh;

    public static function getConnection(): object
    {
        if (!isset(self::$dbh)) {
            // Connect to a MySQL database using driver invocation
            try {
                self::$dbh = new PDO(DB_DNS, DB_USER, DB_PASSWD);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
        return self::$dbh;
    }
}
