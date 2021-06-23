<form class="form" method="post">
    <div class="container">
        <h1>Produtos</h1>
        <a href="<?php echo base_url("/produtos/inserir") ?>" class="btn btn-primary" style="margin-bottom: 5px;">Inserir novo</a>
        <div class="row">
            <div class="col-md-4 col-lg-6 col-xl-3" style="display: flex;"><span style="top: 8px;position: relative;margin-right: 5px;">Exibir</span>
                <select class="form-select registros" name="registros">
                    <?php foreach ($registrosList as $registro) { ?>
                        <option <?php if ($registros == $registro) { ?> selected="selected" <?php } ?> value="<?php echo $registro ?>"><?php echo $registro ?></option>
                    <?php } ?>
                </select>
                <span style="top: 8px;position: relative;margin-left: 5px;">registros</span>
            </div>
            <div class="col-12 co-sm-8 col-md-8 col-lg-6 col-xl-9">
                <div class="input-group">
                    <input type="text" class="form-control" name="buscar" placeholder="Buscar" value="<?php echo $buscar; ?>" />
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit" style="border-radius: 0px 10px 10px 0px;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) { ?>
                        <tr>
                            <td><?php echo $produto->descricao ?></td>
                            <td>
                                <a href="<?php echo base_url("/produtos/editar/") . "/" . $produto->id ?>" class="btn btn-warning" style="margin-bottom: 5px;"><i class="fas fa-edit"></i></a>
                                <a href="<?php echo base_url("/produtos/excluir") ?>" class="btn btn-danger" style="margin-bottom: 5px;"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <ul class="paginacao">
                <li id="anterior" pagina="<?php echo $pagina; ?>" class="<?php echo ($disabilitaAnterior) ? "disabled" : "" ?>">
                    Anterior
                </li>
                <?php for ($i = 1; $i <= $numPaginas; $i++) { ?>
                    <a>
                        <li class="<?php echo ($i == $pagina) ? "paginaAtiva" : "numPagina" ?>" value="<?php echo $i; ?>"><?php echo $i; ?></li>
                    </a>
                <?php } ?>
                <li id="proximo" pagina="<?php echo $pagina; ?>" numPaginas="<?php echo $numPaginas; ?>" class="<?php echo ($disabilitaProximo) ? "disabled" : "" ?>">
                    Próximo
                </li>
            </ul>
        </div>
        <div class="row">
            Mostrando <?php echo ($pagina * $registros - ($registros - 1)) ?> a <?php echo ($pagina == ceil($totalItems / $registros) ? $totalItems : $pagina * $registros) ?>
            de um total de <?php echo $totalItems ?>
        </div>
    </div>
</form>