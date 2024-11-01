<?php

/**
 * Design Pattern Singleton
 * man möchte nur 1 Objekt in der Klasse haben
 */

class Db
{
    /**
     * @var object $dbh
     */
    private static object $dbh;

    /**
     * getConnection
     *
     * @return object
     */
    public static function getConnection(): PDO
    {
        if (!isset(self::$dbh)) {
            // Connect to a MySQL database using driver invocation
            try {
                self::$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
            } catch (PDOException $e) {
                // Write log file (newest first)
                $oldLog = file_get_contents(LOG_PATH);
                $timestamp = (new DateTime())->format('Y-m-d H:i:s.u ');
                file_put_contents(LOG_PATH, $timestamp . $e->getMessage() . "\n" . $oldLog);
                throw new Exception("Es ist ein Fehler aufgetreten");
            }
        }
        return self::$dbh;
    }
}
