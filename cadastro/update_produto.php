<?php

include_once('../conexao.php');

$id = mysqli_real_escape_string($conexao, trim($_POST['id']));
$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$referencia = mysqli_real_escape_string($conexao, trim($_POST['referencia']));

$sql = "UPDATE produto set nome='$nome', referencia='$referencia' where id='$id'";
$result = mysqli_query($conexao, $sql);

if ($result)
{
    echo "<script> alert('Produto ALTERADO')
    location.href='lista_produto.php'</script>";
}