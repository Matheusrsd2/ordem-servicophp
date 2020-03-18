<?php

include_once('conexao.php');

$id     = addslashes($_GET['id']);
$sql    = "UPDATE ordem_servico set status = 'CANCELADO' where id = '$id'";
$result = mysqli_query($conexao,$sql);

if ($result)
    echo "<script>
    alert('Ordem de Serviço CANCELADA');
    location.href='painel.php'; </script>";
else
    echo "<script> 
    alert('Nao foi possivel cancelar OS');
    location.href='painel.php'; 
    </script>";

?>



