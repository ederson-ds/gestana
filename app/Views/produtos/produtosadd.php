<div class="container">
    <h2>Inserir novo produto</h2>
    <strong><?php echo $msg ?></strong>
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary"><?php echo $acao ?></button>
            </div>
        </div>
    </form>
</div>