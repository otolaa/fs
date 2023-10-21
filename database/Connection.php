<?php

namespace Html\Database;

final class Connection
{
    /**
     * Connection
     * тип @var
     */
    private static $conn = null;
    private $db = [];

    /**
     * Connection object \PDO
     * @return \PDO
     * @throws \Exception
     */
    public function connect()
    {
        $params = $this->db;
        if ($params === false) {
            throw new \Exception("Error reading database configuration file");
        }

        $conStr = sprintf(
            "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            $params['host'],
            $params['port'],
            $params['database'],
            $params['user'],
            $params['password']
        );

        $pdo = new \PDO($conStr);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    /**
     * return object Connection
     * тип @return
     */
    public static function get()
    {
        if (null === static::$conn) {
            static::$conn = new self();
        }

        return static::$conn;
    }

    protected function __construct()
    {
        $this->db = include (DIR_ROOT.'/config/db.php');
    }
}