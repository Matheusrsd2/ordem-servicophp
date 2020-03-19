<?php

include_once('../conexao.php');

$id = mysqli_real_escape_string($conexao, trim($_POST['id']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$idade = mysqli_real_escape_string($conexao, trim($_POST['idade']));
$status = mysqli_real_escape_string($conexao, trim($_POST['status']));

$sql = "UPDATE cliente set nome='$nome', endereco='$endereco', cidade='$cidade', estado='$estado', idade='$idade', status='$status' where id='$id'";
$result = mysqli_query($conexao, $sql);

if ($result)
{
    echo "<script> alert('Cliente ALTERADO')
    location.href='lista_cliente.php'</script>";
}