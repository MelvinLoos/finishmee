<?php

$_ENV['DATABASE_HOST'] = 'localhost';
$_ENV['DATABASE_NAME'] = 'app';
$_ENV['DATABASE_USERNAME'] = 'username';
$_ENV['DATABASE_PASSWORD'] = 'password';

$_ENV = parse_ini_file(__DIR__.'/.env.ini') + $_ENV;

class Database
{
    private $client;

    /**
     * Creates the database client
     * @return self
     */
    public static function connect()
    {
        $db = new static();
        $db->client = new mysqli($_ENV['DATABASE_HOST'], $_ENV['DATABASE_USERNAME'], $_ENV['DATABASE_PASSWORD'], $_ENV['DATABASE_NAME']);
        return $db;
    }

    public function createSchema()
    {
        $sql = <<<SQL
CREATE TABLE `rooms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(32) NOT NULL,
  `host` int NOT NULL
);
SQL;
        $this->doQuery($sql, 'Failed to create `rooms` table');
    }

    public function getDatabaseTables()
    {
        return $this->doQuery("Show tables", 'Failed to query for tables');
    }

    public function getRooms()
    {
        $sql = <<<SQL
SELECT * FROM `rooms`
SQL;
        return $this->doQuery($sql, 'Failed to create `rooms` table');
    }

    private function doQuery($sql, $errorMessage = 'Failed to perform query')
    {
        if (!$result = $this->client->query($sql)) {
            throw new Exception($errorMessage . ': ' . $this->client->error);
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
