<?php namespace Config;
use Config\DataBase;
abstract class Connection extends DataBase
{
    private $server;
    private $dataBase;
    private $user;
    private $password;
    protected $connection;
    protected $query;

    public function __construct()
    {
        $this->server = $this->dataBase()["server"];
        $this->dataBase = $this->dataBase()["dataBase"];
        $this->user = $this->dataBase()["user"];
        $this->password = $this->dataBase()["pass"];
        $this->connection();
    }

    private function connection()
    {
        $this->connection = new \PDO('mysql:host=' . $this->server . ';dbname=' . $this->dataBase, $this->user, $this->password);
    }

    abstract function query($query);

    public function __destruct()
    {
        $this->connection = null;
    }
}