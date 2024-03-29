<?php $this->layout("_theme", ["head" => $head, "user" => $user]); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col" id="pagina-header">
            <h5>Consultar Protocolo</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= url() ?>"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="<?= url() ?>"><i class="fas fa-angle-double-right"></i> Protocolo</a></li>
                </ol>
            </nav>
        </div>
        <!--fim pagina-header;-->
    </div>
    <!--<div class="row">-->
    <div class="row" id="painel_de_consulta">
        <div class="col">
            <section class="card border-success">
                <header class="card-header bg-success">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false">
                        <h4 class="card-title h6 mb-1 mt-1"><i class="fa fa-search pull-left"></i> Painel de busca <i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse" id="collapseExample">
                    <article class="card-body">
                        <form method="GET" action="<?= url() ?>" name="formPROTOCOLOSearch">
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for='itipo'>Tipo do Protocolo: </label><br />
                                    <select class="custom-select select2-js" name="nTipo" id="itipo" onchange="selectTipoProtocolo(this.value)">
                                        <option value="" selected="selected">Todos</option>
                                        <?php
                                        foreach ($protocolo_tipo as $indice) {
                                            if (isset($chamado['setor_id']) && $indice['id'] == $chamado['setor_id']) {
                                                echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['tipo'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $indice['id'] . '">' . $indice['tipo'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Informe o setor</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for='iObjetivo'> Objetivo do Pedido: </label><br />
                                    <select class="custom-select select2-js" name="nObjeito" id="iObjetivo">
                                        <option value="" selected="selected">Todos</option>
                                        <?php
                                        foreach ($protocolo_objetivo as $indice) {
                                            if (isset($chamado['usuario_id']) && $indice['id'] == $chamado['usuario_id']) {
                                                echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['objetivo'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $indice['id'] . '">' . $indice['objetivo'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Informe o usuário solicitante
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for='iSelectBuscar'>Por: </label><br />
                                    <select class="custom-select select2-js" name="nSelectBuscar" id="iSelectBuscar">
                                        <option value="" selected="selected" disabled="disabled">Selecione</option>
                                        <option value="protoco">Nº de Protocolo</option>
                                        <option value="interessado">Interessado</option>
                                        <option value="cpf_cpnj">CPF/CNPJ</option>
                                    </select>
                                    <div class="invalid-feedback">Informe o setor</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="iCampo">Campo: </label>
                                    <input type="text" class="form-control" name="nCampo" id="iCampo" />
                                    <div class="invalid-feedback">
                                        Informe nome / email do usuário
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <label for="iDataInicial">Data Inicial: </label>
                                    <input type="text" class="form-control date_serach input-data" name="nDataInicial" id="iDataInicial" />
                                    <div class="invalid-feedback">
                                        Informe a data inicial do protocolo
                                    </div>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="iDataFinal">Data final: </label>
                                    <input type="text" class="form-control date_serach input-data" name="nDataFinal" id="iDataFinal" />
                                    <div class="invalid-feedback">
                                        Informe a data final do protocolo
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for='iModelView'>Modo de exibição: </label>
                                    <select class="custom-select" name="nModeView" id="iModelView">
                                        <option value="DESC"> Decrecente (do último para o primeiro registro)</option>
                                        <option value="ASC">Crescente (do primeiro para o último registro)</option>
                                    </select>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <button type="submit" name="nBuscarBT" value="BuscarBT" class="btn btn-success"><i class="fa fa-search pull-left"></i> Buscar</button>
                                </div>
                            </div>
                        </form>
                    </article>
                </div>
            </section>
        </div>
    </div>
    <!--<div class="row" id="painel_de_consulta">-->
    <?php
    if (!empty($protocolagens)) {
    ?>
        <div class="row">
            <div class="col mb-2 mt-2">
                <section class="card border-dark">
                    <header class="card-header bg-dark text-while">
                        <h1 class="card-title h6 mb-1 mt-1">Total de Registros Encontrados: <?php echo is_array($protocolagens) ? count($protocolagens) : '0'; ?></h1>
                    </header>
                    <div class="table-responsive">
                        <!--table-->
                        <table class="table table-striped table-bordered table-sm table-hover mb-0">
                            <thead class="bg-secondary">
                                <tr class="">
                                    <th scope="col" class="align-middle">#</th>
                                    <th scope="col" class="align-middle">Tipo do Protocolo</th>
                                    <th scope="col" class="align-middle">Objetivo do Pedido</th>
                                    <th scope="col" class="align-middle">Número do Protocolo</th>
                                    <th scope="col" class="align-middle">Data</th>
                                    <th scope="col" class="align-middle">Interessado</th>
                                    <th scope="col" class="align-middle">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qtd = 1;
                                foreach ($protocolagens as $indice) :
                                ?>
                                    <tr>
                                        <td class="text-center align-middle"><?php echo $qtd ?></td>
                                        <td class="align-middle"><?php echo !empty($indice['tipo_id']) ? $indice['tipo'] : ''; ?></td>
                                        <td class="align-middle"><?php echo !empty($indice['objetivo']) ? $indice['objetivo'] : ''; ?></td>
                                        <td class="align-middle"><?php echo !empty($indice['numero_protocolo']) ? $indice['numero_protocolo'] : ''; ?></td>
                                        <td class="align-middle"><?php echo !empty($indice['data']) ? $this->formatDateView($indice['data']) : ''; ?></td>
                                        <td class="align-middle"><?php echo !empty($indice['interessado']) ? $indice['interessado'] : ''; ?></td>
                                        <td class="align-middle table-acao text-center">
                                            <a class="btn btn-success btn-sm" href="<?= url() ?>" title="Visualizar"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-primary btn-sm" href="<?= url() ?>" title="Editar"><i class="fa fa-pencil-alt"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_relatorio_<?php echo md5($indice['id']) ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php
                                    $qtd++;
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                        <!--table-->
                    </div>
                </section>

            </div>
        </div>
    <?php } else {
    ?>
        <!--<div class="row">-->
        <div class="row">
            <div class="col mt-2 mb-2">
                <div class="alert alert-danger " role="alert" id="alert-msg">
                    <button class="close" data-bs-hide="alert">&times;</button>
                    <div id="resposta"> <i class="fa fa-times"></i> Desculpe, não foi possível localizar nenhum registro !</div>
                </div>
            </div>
        </div>
        <!--<div class="row">-->
    <?php } ?>
</div>

<!--inicio da paginação-->


<!--fim da paginação-->

<?php
if (isset($protocolagens) && is_array($protocolagens)) :
    foreach ($protocolagens as $indice) :
?>
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_relatorio_<?php echo md5($indice['id']) ?>" tabindex="-1" role="dialog">
            <article class="modal-dialog modal-md modal-dialog-centered" role="document">
                <section class="modal-content">
                    <header class="modal-header bg-danger text-while">
                        <h5 class="modal-title">Deseja remover este registro?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </header>
                    <article class="modal-body">
                        <ul class="list-unstyled">
                            <li><b>Número do Protocolo: </b> <?php echo !empty($indice['numero_protocolo']) ? $indice['numero_protocolo'] : '' ?>;</li>
                            <li><b>Interessado: </b> <?php echo isset($indice['interessado']) && !empty($indice['interessado']) ? $indice['interessado'] : '0' ?>;</li>
                            <li><b>Data: </b> <?php echo !empty($indice['data']) ? $this->formatDateView($indice['data']) : ''; ?>;</li>
                            <li><b>Objetivo do Pedido: </b> <?php echo !empty($indice['objetivo']) ? $indice['objetivo'] : ''; ?>;</li>
                        </ul>
                        <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro e todos registos relacionados ao mesmo deixaram de existir no sistema.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?= url($indice['id']) ?>"> <i class="fa fa-trash"></i> Excluir</a>
                        <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
<?php
    endforeach;
endif;
?>