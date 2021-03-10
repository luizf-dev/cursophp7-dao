<?php

class Sql extends PDO {

    private $connect;

    public function  __construct(){

        $this->connect = new PDO("mysql:dbname=db_php_7;host=localhost", "luiz_fernando", "13142326");

    }

    private function setParams($statement, $parameters = array()){

        foreach ($parameters as $key => $value){

            $this->setParam($statement, $key, $value);

        }        
    }

    private  function setParam($statement, $key, $value){

        $statement->bindParam($key, $value);
    }


    public function query($rawQuery, $params = array()){

        $stmt = $this->connect->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($rawQuery, $params = array()):array {

       $stmt =  $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}