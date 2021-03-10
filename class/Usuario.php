<?php

class Usuario {

    private $id;
    private $login;
    private $senha;
    private $cadastro;

    public function getId(){
        return $this->id;
    }    

    public function setId($value){
        $this->id = $value;
    }    

    public function getLogin(){
        return $this->login;
    }    

    public function setLogin($value){
        $this->login = $value;
    }  

    public function getSenha(){
        return $this->senha;
    }    

    public function setSenha($value){
        $this->senha = $value;
    }

    public function getCadastro(){
        return $this->cadastro;
    }    

    public function setCadastro($value){
        $this->cadastro = $value;
    }

    public function loadbyId($id){
        $sql = new Sql();
        $resultados = $sql->select("select * from tb_usuarios where id = :ID", array(
            ":ID"=>$id
        ));
        //if(isset($resultados[0])) outra maneira de fazer.
        if(count($resultados) > 0){

            $row = $resultados[0];
            $this->setId($row['id']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setCadastro(new Datetime($row['cadastro']));
        }

    }

    public function __toString(){
        return json_encode(array(
            "id"=>$this->getId(),
            "login"=>$this->getLogin(),
            "senha"=>$this->getSenha(),
            "cadastro"=>$this->getCadastro()->format("d-m-Y - H:i:s")
        ));
    }
}

