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
                <option> </option><option>AC</option><option>AP</option><option>AM</option><option>AL</option><option>BA</option><option>CE</option>
                <option>DF</option><option>ES</option><option>GO</option><option>MA</option><option>MT</option><option>MS</option>
                <option>MG</option><option>PA</option><option>PB</option><option>PR</option><option>PE</option><option>PI</option>
                <option>RJ</option><option>RN</option><option>RS</option><option>RO</option><option>RR</option><option>SC</option>
                <option>SP</option><option>SE</option><option>TO</option>
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
