<?php
session_start();

require_once('../conexao.php');

$senha      =   $_POST['senha'];
$usuario    =   $_POST['user'];

$autentica = $mysqli->prepare("SELECT id FROM usuario WHERE user = ? AND senha = ?");
$autentica->bind_param('ss', $usuario, $senha);
$autentica->execute();
$autentica->bind_result($id_);
$autentica->fetch();
$autentica->close();

if($id_){
    $_SESSION['id'] = $id_;
    header("location: ../home.php");
}else{
    echo "<script>alert('login errado');location.href='../index.php';</script>";
}

