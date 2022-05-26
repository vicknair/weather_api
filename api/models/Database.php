<?php

class Database {
    private $host = "localhost";
    private $username = "api_test";
    private $password = "your password";
    private $database = "weather_api";
    public $connection;
	

	public function index() {
		die;
	}

	public function getConnection() {
        $this->connection = null;

        try{
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->connection->exec("set names utf8");
        }catch(PDOException $exception){
            return false;
        }

        return $this->connection;
	}
}