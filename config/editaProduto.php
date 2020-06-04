<?php
include("../conexao.php");

$sql = new mysqli($host, $username, $password, $database) or die("falha na conexao");
$sql->set_charset('utf8');

$nome           =   $_POST['nome'];
$dtEntrada      =   $_POST['dtEntrada'];
$dtSaida        =   $_POST['dtSaida'];
$qtProduto      =   $_POST['qtProduto'];
$idProduto      =   $_POST['produto'];

$s = $sql->prepare("UPDATE produto SET nomeProduto=?, dtEntrada=?, dtSaida=?, qtProduto=? WHERE id = ?");
$s->bind_param('sssdd', $nome, $dtEntrada, $dtSaida, $qtProduto, $idProduto);
if(!$s->execute()){
    $erro = "erro ao inserir dados no banco. $s->error";
}
$s->close();


if($erro){
    echo"<script>
            alert('$erro');
            window.history.back();
        </script>";
}else{
    echo"<script>
            alert('Produto editado com sucesso!');
            location.href='../home.php';
        </script>";
}

// header("Location: ../home.php");

?>