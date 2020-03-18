<?php

include_once('../conexao.php');

$id     = addslashes($_GET['id']);
$sql    = "UPDATE cliente set status = 'CANCELADO' where id = '$id'";
$result = mysqli_query($conexao,$sql);

if ($result)
    echo "<script>
    alert('Cliente CANCELADO');
    location.href='lista_cliente.php'; </script>";
else
    echo "<script> 
    alert('Nao foi possivel cancelar');
    location.href='lista_cliente.php'; 
    </script>";

?>