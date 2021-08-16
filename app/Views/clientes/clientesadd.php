<h2><?php echo ($id == 0) ? "Inserir" : "Editar" ?> cliente</h2>
<strong><?php echo $msg; ?></strong>
<form method="post" novalidate>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="nome" class="required">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $cliente->nome ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cliente->cpf ?>">
        </div>
    </div>
    <hr />
    <a href="<?php echo base_url("/clientes"); ?>"><button type="button" class="btn btn-primary">Voltar</button></a>
    <button type="submit" class="btn btn-primary"><?php echo ($id == 0) ? "Inserir" : "Editar" ?></button>
</form>
<script>
$('#cpf').mask('000.000.000-00');
</script>