<?php

include_once('../conexao.php');

$id     = addslashes($_GET['id']);
$sql    = "UPDATE cliente set status = 'INATIVO' where id = '$id'";
$result = mysqli_query($conexao,$sql);

if ($result)
    echo "<script>
    alert('Cliente INATIVADO');
    location.href='lista_cliente.php'; </script>";
else
    echo "<script> 
    alert('ERRO AO INATIVA CLIENTE');
    location.href='lista_cliente.php'; 
    </script>";

?>