<table class="table">
    <thead>
        <tr>
            <th column="descricao" class="<?php echo (isset($_POST['orderBy']) && $_POST['orderBy'] != "") ? "active" : "" ?>">Descrição</th>
            <th column="acoes">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $produto) { ?>
            <tr>
                <td><?php echo $produto->descricao ?></td>
                <td>
                    <a href="<?php echo base_url("/$controllerName/editar/") . "/" . $produto->id ?>">
                        <button type="button" class="btn btn-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                    </a>
                    <button type="button" controllerName="<?php echo $controllerName; ?>" id="<?php echo $produto->id ?>" class="btn btn-danger excluir" data-toggle="modal" data-target="#excluirModal">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>