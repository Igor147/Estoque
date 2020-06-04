<?php 
error_reporting(0);
include("../conexao.php");
    $id = $_GET['id'];
    
$sql = $mysqli->prepare( "SELECT nomeProduto, dtEntrada, dtSaida, qtProduto FROM produto WHERE id=?");
$sql->bind_param('d', $id);
$sql->execute();
$sql->bind_result($dado['nome'], $dado['dtEntrada'], $dado['dtSaida'], $dado['qtProduto']);
$sql->fetch();
$sql->close();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Estoque</title>
</head>
<body class="text-center">
    <br/>
    <h1>Editar PRODUTO</h1>
    <form action="../config/editaProduto.php?id=<?=$id;?>" method="POST">
        <label>Nome</label> <input type="text" id="nome" name="nome" value="<?=$dado["nome"];?>"><br/><br/>
        <label>Data Entrada</label> <input type="date" id="dtEntrada" name="dtEntrada" value="<?=$dado["dtEntrada"];?>"><br/><br/>
        <label>Data Saida</label> <input type="date" id="dtSaida" name="dtSaida" value="<?= $dado["dtSaida"];?>"><br/><br/>
        <label>Quantidade</label> <input type="text" id="qtProduto" name="qtProduto" value="<?= $dado["qtProduto"];?>"><br/><br/>
        <input type="hidden" name="produto" value="<?=$id;?>">
        <button type="submit">Editar</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>