<?php
class Database
{  
    private $host = "localhost";
    private $db_name = "rcp_lite";
    private $username = "root";
    private $password = "@GoPapiuha1001";
    public $conn;
  
    // get the database connection
    public function getConnection()
    {
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}