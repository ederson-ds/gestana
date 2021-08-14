<div class="container">
    <form class="form" method="post" novalidate>
        <h1><?php echo ucfirst($controllerName); ?></h1>
        <a href="<?php echo base_url("/$controllerName/inserir") ?>">
            <button type="button" class="btn btn-primary" style="margin-bottom: 10px;">
                Inserir novo
            </button>
        </a>

        <div>
            <div class="row">
                <div class="col-md-5" style="display: flex;">
                    <span style="position: relative;top: 8px;margin-right: 8px;">Exibir</span>
                    <select class="form-control registros" name="registros">
                        <?php foreach ($registrosList as $registro) { ?>
                            <option <?php if ($registros == $registro) { ?> selected="selected" <?php } ?> value="<?php echo $registro ?>"><?php echo $registro ?></option>
                        <?php } ?>
                    </select>
                    <span style="position: relative;top: 8px;margin-left: 8px;">registros</span>
                </div>

                <div class="col-md-7">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="buscar" placeholder="Buscar" value="<?php echo $buscar; ?>" />
                        <div class="input-group-append">
                            <button id="buscar" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            <button id="refresh" class="btn btn-success">
                                <i class="fa fa-refresh" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>


                </div>
            </div>
        </div>