<?php

namespace Surveyplus\App\Config;

use PDO;
use PDOException;

/**
 * Manage Database Base actions
 */
class Database{

    /** @var array Data Source Name, contains all the database connection settings */
    private array $dsn = [];

    /** @var mixed Database connection */
    private $conn;

    public function __construct(){

        $this->dsn = [
            "host" => "localhost",
            "database" => "surveyplus",
            "username" => "root",
            "password" => "",
            "engine" => "mysql"
        ];

    }


    /**
     * Connect the database
     * @return void
     */
    public function connect()
    {   
       try{
            $this->conn = new PDO("$this->dsn['engine']:host=$this->dsn['host'];dbname=$this->dsn['database']", $this->dsn['username'], $this->dsn['password']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       } catch(PDOException $e){

            throw $e->getMessage();

       }

    }

    /**
     * Execute database queries
     *
     * @return mixed query execution
     */
    public function query()
    {
        return $this->conn->query();
    }




}