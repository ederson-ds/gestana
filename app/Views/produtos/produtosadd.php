<h2><?php echo $acao ?> produto</h2>
<strong><?php echo $msg ?></strong>
<form method="post" novalidate>
    <div class="form-group">
        <div>
            <label for="descricao" class="required">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $produto->descricao ?>">
        </div>
        <span style="color: red;font-size: 12px;"><?php echo $descricao_error; ?></span>
    </div>
    <hr/>
    <a href="<?php echo base_url("/produtos"); ?>"><button type="button" class="btn btn-primary">Voltar</button></a>
    <button type="submit" class="btn btn-primary"><?php echo $acao ?></button>
</form>