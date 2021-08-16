<table class="table">
    <thead>
        <tr>
            <th column="nome" class="<?php echo (isset($_POST['orderBynome']) && $_POST['orderBynome'] != "") ? "active" : "" ?>">Nome</th>
            <th column="cpf" class="<?php echo (isset($_POST['orderBycpf']) && $_POST['orderBycpf'] != "") ? "active" : "" ?>">CPF</th>
            <th column="acoes">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente) { ?>
            <tr>
                <td><?php echo $cliente->nome; ?></td>
                <td><?php echo $cliente->cpf; ?></td>
                <td>
                    <a href="<?php echo base_url("/$controllerName/create/") . "/" . $cliente->id ?>">
                        <button type="button" class="btn btn-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                    </a>
                    <button type="button" controllerName="<?php echo $controllerName; ?>" id="<?php echo $cliente->id ?>" class="btn btn-danger excluir" data-toggle="modal" data-target="#excluirModal">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>