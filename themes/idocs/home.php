<?php $this->layout("_theme", ["head" => $head]); ?>

<div class="container-fluid" id="section-container">
    <div class="row">
        <div class="col" id="pagina-header">
            <h5>Página Inicial</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="<?= url() ?>"><i class="fa fa-tachometer-alt"></i> Página Inicial</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mb-3" id="panel_search">
        <div class="col">
            <section class="card border-default">
                <header class="card-header bg-default">
                    <a data-toggle="collapse" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false">
                        <h4 class="card-title h6 mb-1 mt-1"><i class="fa fa-search pull-left"></i> Consultar tramitação de protocolo <i class="fa fa-eye pull-right"></i></h4>
                    </a>
                </header>
                <div class="collapse show" id="collapseExample">
                    <article class="card-body">
                        <form method="GET" action="" name="FormSearchDocs">
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for='itipo'>Tipo: </label><br />
                                    <select class="custom-select select2-js" name="nTipo" id="itipo" onchange="selectTipoProtocolo(this.value)">
                                        <option value="" selected="selected">Todos</option>

                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Informe o setor</div>
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
                                <div class="col-md-7 mb-3">
                                    <label for="iCampo">Campo: </label>
                                    <input type="text" class="form-control" name="nCampo" id="iCampo" />
                                    <div class="invalid-feedback">
                                        Informe nome / email do usuário
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="iDataInicial">Data Inicial: </label>
                                    <input type="text" class="form-control date_serach input-data" name="nDataInicial" id="iDataInicial" />
                                    <div class="invalid-feedback">
                                        Informe a data inicial do protocolo
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="iDataFinal">Data final: </label>
                                    <input type="text" class="form-control date_serach input-data" name="nDataFinal" id="iDataFinal" />
                                    <div class="invalid-feedback">
                                        Informe a data final do protocolo
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for='iModelView'>Modo de exibição: </label>
                                    <select class="custom-select" name="nModeView" id="iModelView">
                                        <option value="DESC"> Descrecente (do último para o primeiro registro)</option>
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
    <!--<div class="row" id="panel_search">-->

    <div class="row">
        <div class="col-md-6 mb-3">
            <section class="card border-default">
                <header class="card-header bg-default">
                    <h6 class="card-title mt-1 mb-1">
                        <a data-toggle="collapse" data-toggle="collapse" href="#totaldeRegistros" role="button" aria-expanded="false">
                            <h4 class="card-title h6 mb-1 mt-1"><i class="fa-solid fa-chart-pie"></i> Tipos de documentos</h4>
                        </a>
                    </h6>
                </header>
                <div class="collapse show" id="totaldeRegistros">
                    <article class="card-body pt-0 pb-0 cards-chart">

                        <?php if (isset($tramitacoes) && !empty($tramitacoes)) :
                        ?>
                            <div class="col-md-6">
                                <div class="chart-container mt-2 mb-2" style="height:auto">
                                    <canvas id="chart-all-docs"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <table class=" table mt-0 mb-0">
                                    <tr>
                                        <th>Categoria</th>
                                        <th width="80px"><abbr title="Quantidade" class="text-decoration-none">QTD</abbr></th>
                                    </tr>
                                    <?php foreach ($tramitacoes as $index) : ?>
                                        <tr>
                                            <td><?php echo !empty($index['label']) ? $index['label'] : '' ?></td>
                                            <td><?php echo !empty($index['data']) ? $index['data'] : '0' ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php else : ?>
                            <p class="mt-2 mb-2"> Nenhum registro encontrado!</p>
                        <?php endif; ?>
                    </article>
                </div>
            </section>
        </div> <!-- fim col-md-3 mb-3 -->
        <div class="col-md-6 mb-3">
            <section class="card border-default">
                <header class="card-header bg-default">
                    <h6 class="card-title mt-1 mb-1">
                        <a data-toggle="collapse" data-toggle="collapse" href="#totaldeRegistros" role="button" aria-expanded="false">
                            <h4 class="card-title h6 mb-1 mt-1"><i class="fa-solid fa-chart-pie"></i> Documentos com anexo arquivdo</h4>
                        </a>
                    </h6>
                </header>
                <div class="collapse show" id="totaldeRegistros">
                    <article class="card-body pt-0 pb-0 cards-chart">

                        <?php if (isset($tramitacoes) && !empty($tramitacoes)) :
                        ?>
                            <div class="col-md-6">
                                <div class="chart-container mt-2 mb-2" style="height:auto">
                                    <canvas id="chart-all-docs"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <table class=" table mt-0 mb-0">
                                    <tr>
                                        <th>Categoria</th>
                                        <th width="80px"><abbr title="Quantidade" class="text-decoration-none">QTD</abbr></th>
                                    </tr>
                                    <?php foreach ($tramitacoes as $index) : ?>
                                        <tr>
                                            <td><?php echo !empty($index['label']) ? $index['label'] : '' ?></td>
                                            <td><?php echo !empty($index['data']) ? $index['data'] : '0' ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php else : ?>
                            <p class="mt-2 mb-2"> Nenhum registro encontrado!</p>
                        <?php endif; ?>
                    </article>
                </div>
            </section>
        </div> <!-- fim col-md-3 mb-3 -->
    </div><!-- fim row -->

    <div class="row">
        <div class="col-md-6 mb-3">
            <section class="card border-default">
                <header class="card-header bg-default">
                    <h6 class="card-title mt-1 mb-1">
                        <a data-toggle="collapse" data-toggle="collapse" href="#totaldeRegistros" role="button" aria-expanded="false">
                            <h4 class="card-title h6 mb-1 mt-1"><i class="fa-solid fa-chart-bar"></i> Total de documentos cadastrados </h4>
                        </a>
                    </h6>
                </header>
                <div class="collapse show" id="totaldeRegistros">
                    <article class="card-body pt-0 pb-0 cards-chart">

                        <?php if (isset($tramitacoes) && !empty($tramitacoes)) :
                        ?>
                            <div class="col-md-6">
                                <div class="chart-container mt-2 mb-2" style="height:auto">
                                    <canvas id="chart-all-docs"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <table class=" table mt-0 mb-0">
                                    <tr>
                                        <th>Categoria</th>
                                        <th width="80px"><abbr title="Quantidade" class="text-decoration-none">QTD</abbr></th>
                                    </tr>
                                    <?php foreach ($tramitacoes as $index) : ?>
                                        <tr>
                                            <td><?php echo !empty($index['label']) ? $index['label'] : '' ?></td>
                                            <td><?php echo !empty($index['data']) ? $index['data'] : '0' ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php else : ?>
                            <p class="mt-2 mb-2"> Nenhum registro encontrado!</p>
                        <?php endif; ?>
                    </article>
                </div>
            </section>
        </div> <!-- fim col-md-3 mb-3 -->
        <div class="col-md-6 mb-3">
            <section class="card border-default">
                <header class="card-header bg-default">
                    <h6 class="card-title mt-1 mb-1">
                        <a data-toggle="collapse" data-toggle="collapse" href="#totaldeRegistros" role="button" aria-expanded="false">
                            <h4 class="card-title h6 mb-1 mt-1"><i class="fa-solid fa-chart-bar"></i> Total de documentos cadastrados no mês atual</h4>
                        </a>
                    </h6>
                </header>
                <div class="collapse show" id="totaldeRegistros">
                    <article class="card-body pt-0 pb-0 cards-chart">

                        <?php if (isset($tramitacoes) && !empty($tramitacoes)) :
                        ?>
                            <div class="col-md-6">
                                <div class="chart-container mt-2 mb-2" style="height:auto">
                                    <canvas id="chart-all-docs"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <table class=" table mt-0 mb-0">
                                    <tr>
                                        <th>Categoria</th>
                                        <th width="80px"><abbr title="Quantidade" class="text-decoration-none">QTD</abbr></th>
                                    </tr>
                                    <?php foreach ($tramitacoes as $index) : ?>
                                        <tr>
                                            <td><?php echo !empty($index['label']) ? $index['label'] : '' ?></td>
                                            <td><?php echo !empty($index['data']) ? $index['data'] : '0' ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        <?php else : ?>
                            <p class="mt-2 mb-2"> Nenhum registro encontrado!</p>
                        <?php endif; ?>
                    </article>
                </div>
            </section>
        </div> <!-- fim col-md-3 mb-3 -->
    </div><!-- fim row -->



</div>
<!-- /#section-container -->

<?php
$this->start("scripts"); ?>
<script src="<?= theme("../../shared/js/chart/chart.min.js") ?>"></script>
<script src="<?= theme("assets/js/charts.js") ?>"></script>
<?php
$this->end(); ?>