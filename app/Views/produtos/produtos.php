<?php

$numPaginas = ceil($totalItems / $registros);
$disabilitaAnterior = $pagina == 1;
$disabilitaProximo = $pagina == $numPaginas;

?>
<form class="form" method="post">
    <div class="container">
        listagem dos produtos<br>
        <a href="<?php echo base_url("/produtos/inserir") ?>">Inserir novo</a>
        <div class="row">
            <div class="col-md-4 col-lg-6 col-xl-3" style="display: flex;"><span style="top: 8px;position: relative;margin-right: 5px;">Exibir</span>
                <select class="form-select registros" name="registros">
                    <?php foreach ($registrosList as $registro) { ?>
                        <option <?php if ($registros == $registro) { ?> selected="selected" <?php } ?> value="<?php echo $registro ?>"><?php echo $registro ?></option>
                    <?php } ?>
                </select>
                <span style="top: 8px;position: relative;margin-left: 5px;">registros</span>
            </div>
        </div>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto) { ?>
                        <tr>
                            <td><?php echo $produto->descricao ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <ul class="paginacao">
                <li class="<?php echo ($disabilitaAnterior) ? "disabled" : "" ?>">
                    Anterior
                </li>
                <?php for ($i = 1; $i <= $numPaginas; $i++) { ?>
                    <a>
                        <li class="<?php echo ($i == $pagina) ? "paginaAtiva" : "numPagina" ?>" value="<?php echo $i; ?>"><?php echo $i; ?></li>
                    </a>
                <?php } ?>
                <li class="<?php echo ($disabilitaProximo) ? "disabled" : "" ?>">
                    Próximo
                </li>
            </ul>
        </div>
    </div>
</form>