<h2><?php echo ($id == 0) ? "Inserir" : "Editar" ?> produto</h2>
<strong><?php echo $msg; ?></strong>
<form method="post" novalidate>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="descricao" class="required">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $produto->descricao ?>">
        </div>
    </div>
    <hr />
    <a href="<?php echo base_url("/produtos"); ?>"><button type="button" class="btn btn-primary">Voltar</button></a>
    <button type="submit" class="btn btn-primary"><?php echo ($id == 0) ? "Inserir" : "Editar" ?></button>
</form>