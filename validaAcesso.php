<?php
include("conexao.php");

    $login = $_POST['user'];
    $senha = $_POST['senha'];

    $sql = new mysqli($host, $username, $password, $database) or die ("Conexao nao concluida");
    $sql->set_charset('utf8');

    $s = "SELECT * FROM usuario WHERE $login = user AND $senha = senha";
    $s = mysqli_query($)
?>