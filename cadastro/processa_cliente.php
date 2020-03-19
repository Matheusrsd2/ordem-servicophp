<?php

include_once ('../conexao.php');

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$endereco = mysqli_real_escape_string($conexao, trim($_POST['endereco']));
$cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
$estado = mysqli_real_escape_string($conexao, trim($_POST['estado']));
$idade = mysqli_real_escape_string($conexao, trim($_POST['idade']));
$status = mysqli_real_escape_string($conexao, trim($_POST['status']));

$sql = "INSERT INTO cliente (nome, endereco, cidade, estado, idade, status) VALUES ('$nome', '$endereco', '$cidade', '$estado','$idade','$status')";

if ($nome == null)
{
    echo "<script language='javascript'>
    window.alert('ERRO. Preencher o nome do cliente');
    location.href='form_cliente.php'; </script>";
}
else
{
    $result = mysqli_query($conexao,$sql);

    if ($result)
    {
        echo "<script> alert('Cliente cadastrado com sucesso!');
        location.href='../painel.php'; 
        </script>";
    }
    else 
    {
        echo "<script language='javascript'>
        window.alert('ERRO. O cliente ainda nao foi cadastrado. Tente novamente');
        location.href='form_cliente.php'; </script>";
    }
}


