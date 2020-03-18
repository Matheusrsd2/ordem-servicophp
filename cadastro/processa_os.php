<?php

include_once ('../conexao.php');

$cliente = mysqli_real_escape_string($conexao, trim($_POST['cliente']));
$tecnico = mysqli_real_escape_string($conexao, trim($_POST['tecnico']));
$produto = mysqli_real_escape_string($conexao, trim($_POST['produto']));
$status = mysqli_real_escape_string($conexao, trim($_POST['status']));

$sql = "INSERT INTO ordem_servico (cliente,tecnico,produto,status,created_at) VALUES ('$cliente', '$tecnico', '$produto', '$status',NOW())";

if ($cliente == null || $tecnico == null || $produto == null)
{
    echo "<script language='javascript'>
    window.alert('ERRO. Preencher todos os campos');
    location.href='form_os.php'; </script>";
}
else
{
    $result = mysqli_query($conexao,$sql);

    if ($result)
    {
        echo "<script> alert('Sucesso!');
        location.href='../painel.php'; 
        </script>";
    }
    else 
    {
        echo "<script language='javascript'>
        window.alert('ERRO. Tente novamente');
        location.href='form_os.php'; </script>";
    }
}