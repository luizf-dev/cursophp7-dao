<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <meta name="description" content="">
    <!--GOOGLE ICONS FONTS-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="icon" href="">
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--MATERIALIZE JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--FRAMEWORK MATERIALIZE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--MINHA CUSTOMIZAÇÃO CSS-->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="container">

<?php

require_once ("config.php");

$sql = new Sql();

$usuarios = $sql->select("select * from tb_usuarios");

echo "<h3 class='red-text center'>LISTA DE REGISTROS</h3>";
echo "<hr>";

foreach ($usuarios as $row) {
    foreach ($row as $key => $value) {

        echo "<strong>".$key.": </strong>".$value."<br>";        
    }
    echo "<hr>";
}



//echo json_encode($usuarios);


