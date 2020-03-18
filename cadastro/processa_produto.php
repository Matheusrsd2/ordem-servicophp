<?php



include_once ('../conexao.php');

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$referencia = mysqli_real_escape_string($conexao, trim($_POST['referencia']));

$sql = "INSERT INTO produto (nome, referencia) VALUES ('$nome', '$referencia')";

if ($nome == null)
{
    echo "<script> alert('ERRO. Preencher o nome do produto')
    location.href='form_produto.php'; 
    </script>";
}
else
{
    $result = mysqli_query($conexao,$sql);

    if ($result)
    {
        echo "<script> alert('Produto cadastrado com sucesso!');
        location.href='../painel.php'; 
        </script>";
    }
    else 
    {
        echo "<script language='javascript'>
        window.alert('ERRO. O produto ainda nao foi cadastrado. Tente novamente');
        location.href='form_produto.php'; </script>";
    }
}