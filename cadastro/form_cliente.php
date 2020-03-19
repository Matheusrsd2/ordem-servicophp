<html>
<head>
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cadastros.css">
    <title>Cadastro de Cliente</title>
    <link href="https://fonts.googleapis.com/css?family=Arsenal&display=swap" rel="stylesheet">
</head>

<body>
    <h4>Informe os dados do Cliente</h4>
    <form action="processa_cliente.php" id="form-cliente" method="post">
        <div class="col-sm-8">
            <label>Nome Completo</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <div class="col-sm-8">
            <label> Endereço</label>
            <input type="text" class="form-control" name="endereco">
        </div><br>
        <div class="form-row">
            <div class="form-group col-sm-4">
                <label>Cidade</label>
                <input type="text" class="form-control" name="cidade">
            </div>
            <div class="col-md-3">
                <label>Estado</label>
                <select class="form-control" name="estado">
                <option>ACRE</option><option>AMAPA</option><option>AMAZONAS</option>
                <option>ALAGOAS</option><option>BAHIA</option><option>CEARA</option>
                <option>DISTRITO FEDERAL</option><option>ESPIRITO SANTO</option><option>GOIAS</option>
                <option>MARANHAO</option><option>MATO GROSSO</option><option>MATO GROSSO DO SUL</option>
                <option>MINAS GERAIS</option><option>PARA</option><option>PARAIBA</option>
                <option>PARANÁ</option><option>PERNAMBUCO</option><option>PIAUÍ</option>
                <option>RIO DE JANEIRO</option><option>RIO GRANDE DO NORTE</option><option>RIO GRANDE DO SUL</option>
                <option>RONDONIA</option><option>RORAIMA</option><option>SANTA CATARINA</option>
                <option>SAO PAULO</option><option>SERGIPE</option><option>TOCANTINS</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <label>Idade</label>
            <input type="number" name="idade">
        </div>
        <div id="status" class="col-md-2">
            <label>Status</label>
            <select class="form-control" name="status">
            <option>ATIVO</option>
        </div>
        <br><input type="submit" class="btn btn-warning"" value="Cadastrar">
    </form>

</body>
