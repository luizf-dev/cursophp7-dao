<?php
require_once "header.php";
require_once ("config.php");

/*$sql = new Sql();
$usuarios = $sql->select("select * from tb_usuarios");
echo "<h3 class='red-text center'>LISTA DE REGISTROS</h3>";
echo "<hr>";

foreach ($usuarios as $row) {
    foreach ($row as $key => $value) {

        echo "<strong>".$key.": </strong>".$value."<br>";        
    }
    echo "<hr>";
}
//echo json_encode($usuarios);*/

echo "<h5>LISTA UM ÚNICO USUÁRIO</h5>";
$user = new Usuario();
$user->loadbyId(2);
echo $user ."<hr>";

echo "<h5>CARREGA A LISTA DE USUÁRIOS DA TABELA</h5>";
$lista = Usuario::getList();
echo json_encode($lista) ."<hr>";

echo "<h5>CARREGA UMA LISTA DE USUÁRIOS BUSCANDO PELO LOGIN</h5>";
$search = Usuario::search("sil");
echo json_encode($search) . "<hr>";

echo "<h5>CARREGA UM USUÁRIO USANDO O LOGIN E A SENHA</h5>";
$usuario = new Usuario();
$usuario->login("user", "12345");
echo $usuario . "<hr>";
