<?php
    include("../conexao.php");

    $login = $_POST['user'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $sql = new mysqli($host, $username, $password, $database) or die ("Conexao nao concluida");
    $sql->set_charset('utf8');

    $s = $sql->prepare("INSERT INTO usuario(user,senha,email) VALUES (?,?,?)");
    $s->bind_param('sss',$login,$senha,$email);
    if(!$s->execute()){
        $msg = "erro ao cadastrar";
    }else{
        $msg = "Cadastro realizado";
    }
    $s->close();

    header("Location: ../index.php");
?>