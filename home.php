<?php 
session_start();
include("conexao.php");

if(!$_SESSION['id']){
  // header("location: index.php");
  echo "<script>alert('Faça login para acessar essa página!');location.href='index.php';</script>";
}

$sql = $mysqli->prepare("SELECT id, nomeProduto, dtEntrada, dtSaida, qtProduto FROM produto ");

$sql->execute();
$sql->bind_result($id_, $nome_, $dtEntrada_, $dtSaida_, $qtProduto_);
while($sql->fetch()){
  $dado['id'][]  = $id_;
  $dado['nome'][]  = $nome_;
  $dado['dtEntrada'][] = $dtEntrada_;
  $dado['dtSaida'][]  = $dtSaida_;
  $dado['qtProduto'][] = $qtProduto_;
}
$sql->close();

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Agenda</title>
  </head>
  <body>
      <br/>
      <div class = container>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NOME</th>
                    <th scope="col">DATA ENTRADA</th>
                    <th scope="col">DATA SAÍDA</th>
                    <th scope="col">QUANTIDADE</th>
                </tr>
            </thead>
            <?php for($i=0;$i<count($dado['id']); $i++){ ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $dado["id"][$i]; ?></th>
                    <td><?= $dado["nome"][$i]; ?></td>
                    <td><?= $dado["dtEntrada"][$i]; ?></td>
                    <td><?= $dado["dtSaida"][$i]; ?></td>
                    <td><?= $dado["qtProduto"][$i]; ?></td>
                    <td><a href="pages/editaProduto.php?id=<?=$dado["id"][$i]; ?>">Editar</a> 
                    <a href="config/deletaProduto.php?id=<?= $dado["id"][$i]; ?>" onclick="return confirm('Deletar este produto?')"> Remover</a></td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
        <a href="pages/cadastraProduto.php">Controle de usuario</a> |
        <a href="pages/cadastraProduto.php">Cadastrar novo Produto</a>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>