<?php

class Database 
{
    public $conn;
    public $stmt;

    public function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'pengaduan';

        $conn = new PDO("mysql:host=$host;dbname=$dbname",$user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $conn->setAttribute(PDO::ATTR_PERSISTENT, true);
        $this->conn = $conn;
    }

    public function __destruct()
    {
        $this->conn = null;
    }

    public function query($sql)
    {
        $this->stmt = $this->conn->prepare($sql);    
        return $this;
    }

    public function bind($param,$value)
    {
        $option = [
            'string' => PDO::PARAM_STR,
            'integer' => PDO::PARAM_INT,
            'boolean' => PDO::PARAM_BOOL,
            'null' => PDO::PARAM_NULL
        ];

        $type = gettype($param);
        $pdoType = $option[$type];

        $this->stmt->bindParam($param, $value, $pdoType);
        return $this;
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function get()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    public function first()
    {
        $this->execute();
        return $this->stmt->fetch();
    }

    public function rowCount()
    {
        $this->execute();
        return $this->stmt->rowCount();
    }

}
