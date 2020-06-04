<?php
    include("../conexao.php");

    $nome = $_POST['nome'];
    $dataEntrada = $_POST['dataEntrada'];
    $quantidade = $_POST['quantidade'];

    $sql = new mysqli($host, $username, $password, $database) or die ("Conexao nao concluida");
    $sql->set_charset('utf8');

    $s = $sql->prepare("INSERT INTO produto(nomeProduto,dtEntrada,qtProduto) VALUES (?,?,?)");
    $s->bind_param('ssd',$nome,$dataEntrada,$quantidade);
    if(!$s->execute()){
        $msg = "erro ao cadastrar";
    }else{
        $msg = "Cadastro realizado";
    }
    $s->close();

    header("Location: ../home.php");
?>