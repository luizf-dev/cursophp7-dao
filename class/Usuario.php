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

    //LISTA APENAS O ID SELECIONADO//
    public function loadbyId($id){
        $sql = new Sql();
        $resultados = $sql->select("select * from tb_usuarios where id = :ID", array(
            ":ID"=>$id
        ));
        //if(isset($resultados[0])) outra maneira de fazer.
        if(count($resultados) > 0){

            $this->setDados($resultados[0]);            
        }

    }

    //LISTA TODOS OS USUARIOS QUE ESTAO NA TABELA//
    public static function getList(){

        $sql = new Sql();

        return $sql->select("select * from tb_usuarios");
    }

    public static function search($login){

        $sql = new Sql();

        return $sql->select("select * from tb_usuarios where login like :SEARCH order by login", array(
            ':SEARCH'=>"%" . $login . "%"
        ));
    }

    public function login($login, $senha){

        $sql = new Sql();
        $resultados = $sql->select("select * from tb_usuarios where login = :LOGIN and senha = :SENHA", array(
            ":LOGIN"=>$login,
            ":SENHA"=>$senha
        ));

        //if(isset($resultados[0])) outra maneira de fazer.
        if(count($resultados) > 0){

            $this->setDados($resultados[0]);
            
        }else{
            throw new Exception("<h1 class='red-text'>LOGIN OU SENHA INVÁLIDOS!!</h1>");
        }
    }

    public function setDados($dados){

            $this->setId($dados['id']);
            $this->setLogin($dados['login']);
            $this->setSenha($dados['senha']);
            $this->setCadastro(($dados['cadastro']));
    }

    public function insert(){

        $sql = new Sql();
        $resultados = $sql->select('CALL sp_usuarios_insert(:LOGIN, :SENHA)', array(
            ':LOGIN'=>$this->getLogin(),
            ':SENHA'=>$this->getSenha()
        ));

        if(count($resultados) > 0){

            $this->setDados($resultados[0]);
    }
    }

    public function update($login, $senha){

        $this->setLogin($login);
        $this->setSenha($senha);

        $sql = new Sql();
        $sql->query("update tb_usuarios set login = :LOGIN, senha = :SENHA where id = :ID", array(
            ':LOGIN'=>$this->getLogin(),
            ':SENHA'=>$this->getSenha(),
            ':ID'=>$this->getId()
        ));
    }

    public function __construct($login = "", $senha = ""){

        $this->setLogin($login);
        $this->setSenha($senha);
    }

    public function __toString(){
        return json_encode(array(
            "id"=>$this->getId(),
            "login"=>$this->getLogin(),
            "senha"=>$this->getSenha(),
            "cadastro"=>$this->getCadastro()//->format("d-m-Y - H:i:s")
        ));
    }
}

