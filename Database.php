<?php

class Database
{
    public $connection;

    public function __construct($config, $dbname='root', $dbpassword='')
    {
        
        $dsn =  "mysql:". http_build_query($config, '', ';');
        // $dsn = "mysql:host=localhost;port=3306;dbname=php_demo;user=root;password=;charset=utf8mb4";

        $this->connection = new PDO($dsn, $dbname, $dbpassword, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }
    public function query($query)
    {

        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}
