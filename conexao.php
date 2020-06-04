<?php

    $host = "localhost";
    $database = "igor";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($host, $username, $password, $database) or die ("conexao falhou!");
    $mysqli->set_charset('utf8');

?>