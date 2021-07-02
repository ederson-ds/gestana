<form class="form" method="post" novalidate>
    <h1>Produtos</h1>
    <a href="<?php echo base_url("/produtos/inserir") ?>">
        <button type="button" style="margin-bottom: 10px;">
            Inserir novo
        </button>
    </a>

    <div>
        <span>Exibir</span>
        <select class="form-select registros" name="registros">
            <?php foreach ($registrosList as $registro) { ?>
                <option <?php if ($registros == $registro) { ?> selected="selected" <?php } ?> value="<?php echo $registro ?>"><?php echo $registro ?></option>
            <?php } ?>
        </select>
        <span>registros</span>
        <input type="text" class="form-control" name="buscar" placeholder="Buscar" value="<?php echo $buscar; ?>" />
        <button>
            <i class="fa fa-search"></i>
        </button>
        <button id="refresh">
            <i class="fas fa-sync"></i>
        </button>
    </div>

    <table>
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
                        <a href="<?php echo base_url("/produtos/editar/") . "/" . $produto->id ?>">
                            <button type="button">
                                <i class="fas fa-edit"></i>
                            </button>
                        </a>
                        <a href="#abrirModal" controllerName="produtos" class="excluir" id="<?php echo $produto->id ?>">
                            <button type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <ul class="paginacao">
        <li>
            <button id="anterior" pagina="<?php echo $pagina; ?>" type="button">
                Anterior
            </button>
        </li>
        <?php for ($i = 1; $i <= $numPaginas; $i++) { ?>
            <a>
                <li>
                    <button type="button" class="<?php echo ($i == $pagina) ? "paginaAtiva" : "numPagina" ?>" value="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </button>
                </li>
            </a>
        <?php } ?>
        <li>
            <button id="proximo" pagina="<?php echo $pagina; ?>" numPaginas="<?php echo $numPaginas; ?>" type="button">
                Próximo
            </button>
        </li>
    </ul>
    Mostrando <?php echo ($pagina * $registros - ($registros - 1)) ?> a <?php echo ($pagina == ceil($totalItems / $registros) ? $totalItems : $pagina * $registros) ?>
    de um total de <?php echo $totalItems ?>
</form>

<div id="abrirModal" class="modal">
    <div>
        <a href="#fechar" title="Fechar" class="fechar">x</a>
        <h2>Confirmação</h2>
        <p>Tem certeza que deseja excluir?</p>
        <a href="" id="excluirSim">
            <button type="button">
                Sim
            </button>
        </a>
    </div>
</div>