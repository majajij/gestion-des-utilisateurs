<?php

class Connection{
    public $config;
    protected $host;
    protected $user;
    protected $password;
    protected $database;
    protected $connection;

    public function __construct(){
        $this->config = parse_ini_file("../env.ini",true);
        $this->host = $this->config['database']['MYSQL_HOST'];
        $this->user = $this->config['database']['MYSQL_USER'];
        $this->password = $this->config['database']['MYSQL_PASSWORD'];
        $this->database = $this->config['database']['MYSQL_DATABASE'];
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
        // $this->connection = new mysqli($this->host,$this->user,$this->password,$this->database);
    }

    public function query($sql) {
        try {
            return $this->connection->query($sql);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
      }

}

?>