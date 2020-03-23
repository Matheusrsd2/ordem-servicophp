<?php

include_once('../conexao.php');

$id = addslashes($_GET['id']); 
$sql = "DELETE FROM produto where id = '$id'";
$result = mysqli_query($conexao,$sql);

if ($result)
{
    echo "<script> alert('Produto Deletado')
    location.href='lista_produto.php'</script>";
}
