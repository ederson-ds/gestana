<ul class="paginacao">
    <li>
        <button id="anterior" pagina="<?php echo $pagina; ?>" class="btn" type="button" <?php echo ($pagina == 1) ? "disabled" : "" ?>>
            Anterior
        </button>
    </li>
    <?php if ($offsetPages > 3) { ?>
        <a>
            <li>
                <span class="offsetPageAnterior" value="<?php echo $pagina; ?>">
                    ...
                </span>
            </li>
        </a>
    <?php } ?>
    <?php
    if ($offsetPages != 3)
        $i = $offsetPages - 2;
    else
        $i = 1;
    for (; $i <= $offsetPages && $i <= $numPaginas; $i++) {
        ?>
        <a>
            <li>
                <span class="<?php echo ($i == $pagina) ? "paginaAtiva" : "numPagina" ?><?php echo ($i == $offsetPages) ? " lastPage" : "" ?>" value="<?php echo $i; ?>">
                    <?php echo $i; ?>
                </span>
            </li>
        </a>
        <?php if ($i == $offsetPages && $i < $numPaginas) { ?>
            <a>
                <li>
                    <span class="offsetPageProximo<?php echo ($i == $offsetPages) ? " lastPage" : "" ?>" value="<?php echo $i; ?>">
                        ...
                    </span>
                </li>
            </a>
        <?php } ?>
    <?php } ?>
    <li>
        <button id="proximo" pagina="<?php echo $pagina; ?>" numPaginas="<?php echo $numPaginas; ?>" class="btn" type="button" <?php echo ($pagina == $numPaginas) ? "disabled" : "" ?>>
            Próximo
        </button>
    </li>
</ul>
<input id="offsetPages" type="hidden" name="offsetPages" value="<?php echo $offsetPages; ?>" />
Mostrando <?php echo ($pagina * $registros - ($registros - 1)) ?> a <?php echo ($pagina == ceil($totalItems / $registros) ? $totalItems : $pagina * $registros) ?>
&nbsp;de um total de <?php echo $totalItems ?>
</form>
</div>