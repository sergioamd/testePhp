<?php
define( 'SERVIDOR', '127.0.0.1');
define( 'USUARIO', 'root' );
define( 'SENHA', '' );
define( 'BANCO', 'bancotop');

$conectar = new PDO('mysql:host=' . SERVIDOR . ';dbname=' . BANCO, USUARIO, SENHA);

try
{
    $conectar = new PDO('mysql:host=' . SERVIDOR . ';dbname=' . BANCO, USUARIO, SENHA);
    $conectar->exec("set names utf8");
}
catch (PDOException $e)
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
?>