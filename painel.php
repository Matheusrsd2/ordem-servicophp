<?php
session_start();
include('verifica_login.php');
include('conexao.php');

$sql    = "SELECT * FROM ordem_servico where status <> 'CANCELADO'";
$result = $conexao->query($sql) or die ($conexao->error);
?>

<html>
<head>
    <title>Área do Funcionário</title>
    <link rel="stylesheet" href="css/painel.css">
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="logout">
        <button class="btn btn-danger"><a href="logout.php" style="text-decoration:none"><font color="white">Sair</font></a>
            <span class="glyphicon glyphicon-off">
        </button>
    </div>
    <h4 style="font-family: 'Arsenal', sans-serif;">Olá, Funcionário <?php echo strtoupper($_SESSION['nome']);?></h4><br>
    <div id="busca">
        <form action="" method="post">
            <input type="text" name="id" placeholder="Pesquisar Codigo Cliente">
            <input name="find" type="submit" value="Buscar">
        </form>
        <?php
        if (isset($_POST['id']))
        {
            $id = ($_POST['id']);
            $sql = "SELECT * FROM cliente where id = '{$id}'";
            $resultado = mysqli_query($conexao, $sql);
            if ($resultado != null){
                while ($dados = mysqli_fetch_assoc($resultado))
                {
                    echo "<b>Nome do cliente:<b> " . $dados['nome'];
                }
            }
            else echo 'Codigo inexistente';
        }
        ?>
    </div><br>
    <button class="btn btn-secondary"><a href="cadastro/form_cliente.php" style="text-decoration:none">
       <font color="white">Adicionar cliente</font></a>  <span class="glyphicon glyphicon-plus">
    </button>
    <button class="btn btn-secondary"><a href="cadastro/lista_cliente.php" style="text-decoration:none">
        <font color="white">Listar clientes</font></a><span class="glyphicon glyphicon-user">
    </button><br><br>
    <button class="btn btn-secondary"><a href="cadastro/form_produto.php" style="text-decoration:none">
        <font color="white">Adicionar Produto</font></a> <span class="glyphicon glyphicon-plus">
    </button>
    <button class="btn btn-secondary"><a href="cadastro/lista_produto.php" style="text-decoration:none">
        <font color="white">Listar Produtos</font></a> <span class="glyphicon glyphicon-tag"></button>
    <button id="bt" class="btn btn-secondary"><a href="cadastro/form_os.php" style="text-decoration:none">
        <font color="white">Criar nova Ordem de Serviço</font></a> <span class="glyphicon glyphicon-list-alt">
    </button>
    <br><br>
    <h4>Apenas ordens de serviço ativas aparecem aqui</h4>
    <table id="t1"class="table table-dark table-hover">
        <thead> 
            <tr>
                <th>Numero OS</th>
                <th>Cliente<br>(Código)</th>
                <th>Técnico<br>(Código)</th>
                <th>Produto</th>
                <th>Data de Criação</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php while($dados = $result->fetch_array()) { ?>
            <tr>
                <td><?php echo $dados['id']; ?></td>
                <td><?php echo $dados['cliente']; ?></td>
                <td><?php echo $dados['tecnico']; ?></td>
                <td><?php echo $dados['produto']; ?></td>
                <td><?php echo $dados['created_at']; ?></td>
                <td>
                    <a href="javascript: if(confirm('Tem certeza que deseja CANCELAR?')) 
                        location.href='cancelar_os.php?id=<?php echo $dados['id'];?>'" 
                        style="text-decoration:none"><button class="btn btn-danger"><font color="white">Cancelar OS</font>
                    </a><span class="glyphicon glyphicon-remove"></button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
  
   
