<?php $this->layout("_theme", ["head" => $head, "user" => $user]); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col" id="pagina-header">
            <h5>Novo Registro</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="protocolo/consultar"><i class="fas fa-angle-double-right"></i> Documentos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="protocolo/cadastro"><i class="fas fa-plus-square"></i> Novo Registro</a></li>
                </ol>
            </nav>
        </div>
        <!--fim pagina-header;-->

    </div>
    <?php
    if (isset($arrayMessageErro)) :
        foreach ($arrayMessageErro as $key) :
    ?>
            <div class="row">
                <div class="col">
                    <div class="alert <?php echo (isset($key['class'])) ? $key['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                        <button class="close" data-hide="alert">&times;</button>
                        <div id="resposta"><?php echo (isset($key['msg'])) ? $key['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
                    </div>
                </div>
            </div>
        <?php endforeach;
    else :
        ?>
        <div class="row">
            <div class="col">
                <div class="alert <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                    <button class="close" data-hide="alert">&times;</button>
                    <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!--fim row-->
    <div class="row">
        <div class="col">
            <form method="POST" action="<?php echo '' ?>protocolo/cadastro" enctype="multipart/form-data" autocomplete="on" name="nFormProtocolo">
                <input type="hidden" name="nId" value="<?php echo !empty($arrayCad['id']) ? $arrayCad['id'] : 0; ?>" />
                <section class="card border-default">
                    <header class="card-header bg-default">
                        <h1 class="card-title h6 my-1"><i class="fas fa-plus-square"></i> Novo registro</h1>
                    </header>
                    <article class="card-body">

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="iSolicitante">Solicitante: </label>
                                <select class="custom-select" name="nSolicitante" id="iSolicitante" required>
                                    <?php
                                    if (!empty($arrayCad['solicitante_id'])) {
                                        $arrayCad['solicitante_id'] = $arrayCad['solicitante_id'];
                                    } else {
                                        if (!empty($protocolo['solicitante_id'])) {
                                            $arrayCad['solicitante_id'] = $protocolo['solicitante_id'];
                                        } else {
                                            $arrayCad['solicitante_id'] = null;
                                        }
                                    }
                                    if (empty($arrayCad['solicitante_id'])) {
                                        echo "<option value='' selected='selected' disabled='disabled'>Selecione</option>";
                                    }
                                    if (!empty($solicitantes)) {
                                        foreach ($solicitantes as $key) {
                                            if ($arrayCad['solicitante_id'] == $key['id']) {
                                                echo "<option value='{$key['id']}' selected='selected'> {$key['solicitante']}</option>";
                                            } else {
                                                echo "<option value='{$key['id']}'> {$key['solicitante']}</option>";
                                            }
                                        }
                                    } ?>
                                </select>
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe o solicitante</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for='iTipo'>Tipo do Protocolo: </label><br />
                                <select class="custom-select" name="nTipo" id="iTipo" required onchange="selectTipoProtocoloCad(this.value)">
                                    <?php
                                    if (!isset($arrayCad['tipo_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o tipo de protocolo </option>';
                                    }
                                    foreach ($tipo_protocolo as $indice) {
                                        if (isset($arrayCad['tipo_id']) && $indice['id'] == $arrayCad['tipo_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['tipo'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['tipo'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe o tipo do protocolo</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for='iObjetivo'>Objetivo do Pedido: </label><br />
                                <select class="custom-select" name="nObjetivo" id="iObjetivo" required onchange="selectObjetivo(this)">
                                    <?php
                                    if (!isset($arrayCad['objetivo_id'])) {
                                        echo '<option value="" selected = "selected" disabled="disabled">Selecione o objetivo do pedido </option>';
                                    }
                                    foreach ($protocolo_objetivo as $indice) {
                                        if (isset($arrayCad['objetivo_id']) && $indice['id'] == $arrayCad['objetivo_id']) {
                                            echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['objetivo'] . '</option>';
                                        } else {
                                            echo '<option value = "' . $indice['id'] . '">' . $indice['objetivo'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe o objetivo do pedido</div>
                            </div>
                        </div>
                        <!--<div class="row">-->
                        <div class="form-row">

                            <div class="col-md-4 mb-3">
                                <label for='iNumeroProtocolo'>Número do Protocolo: </label><br />
                                <input type="text" name="nNumeroProtocolo" class="form-control input-protocolo <?= !empty($arrayError['numero_protocolo']) ? "is-invalid" : '' ?>" id="iNumeroProtocolo" placeholder="Exemplo: 01380/2020" value="<?php echo !empty($arrayCad['numero_protocolo']) ? $arrayCad['numero_protocolo'] : ''; ?>" required>
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> <?= !empty($arrayError['numero_protocolo']) ? $arrayError['numero_protocolo'] : 'Informe o número do protocolo' ?> </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for='iData'>Data do Protocolo: </label><br />
                                <input type="text" name="nData" class="form-control input-data date_serach" id="iData" placeholder="Exemplo: 27/10/2020" value="<?php echo !empty($arrayCad['data']) ? $this->formatDateView($arrayCad['data']) : ''; ?>" required>
                                <div class="invalid-feedback">
                                    <i class="fa fa-info-circle"></i> Informe a data do protocolo
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for='iNFolhas'>Nº de Folhas: </label><br />
                                <input type="text" name="nFolhas" class="form-control" id="iNFolhas" placeholder="Exemplo: 50" value="<?php echo !empty($arrayCad['numero_folhas']) ? $arrayCad['numero_folhas'] : ''; ?>" required>
                                <div class="invalid-feedback">
                                    <i class="fa fa-info-circle"></i> Informe o nº de folhas
                                </div>
                            </div>
                        </div>
                    </article>
                    <!--<article class="card-body">-->
                </section>

                <section class="card border-default mt-3">
                    <header class="card-header bg-default">
                        <h4 class="card-title h6 my-1"><i class="fas fa-id-card"></i> Interessado</h4>
                    </header>
                    <article class="card-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="iInteressado">Interessado: </label>
                                <?php
                                if (!empty($arrayCad['interessado'])) {
                                    $arrayCad['interessado'] = $arrayCad['interessado'];
                                } else {
                                    if (!empty($protocolo['interessado'])) {
                                        $arrayCad['interessado'] = $protocolo['interessado'];
                                    } else {
                                        $arrayCad['interessado'] = '';
                                    }
                                }
                                ?>
                                <input type="text" class="form-control" name="nInteressado" id="iInteressado" value="<?= $arrayCad['interessado'] ?>" placeholder="Exemplo: Prefeitura Municipal de Castanhal" required />
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe o interessado</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="iEmpreendimento">Empreendimento: </label>
                                <?php
                                if (!empty($arrayCad['empreendimento'])) {
                                    $arrayCad['empreendimento'] = $arrayCad['empreendimento'];
                                } else {
                                    if (!empty($protocolo['empreendimento'])) {
                                        $arrayCad['empreendimento'] = $protocolo['empreendimento'];
                                    } else {
                                        $arrayCad['empreendimento'] = '';
                                    }
                                }
                                ?>
                                <input type="text" class="form-control" name="nEmpreendimento" id="iEmpreendimento" value="<?= $arrayCad['empreendimento'] ?>" placeholder="Exemplo: Secretaria de Obras" required />
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe o empreendimento</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="iIdentificacao">Identificação: </label>
                                <select class="custom-select" name="nIdentificacao" id="iIdentificacao" required>
                                    <?php
                                    if (!empty($arrayCad['identificacao'])) {
                                        $arrayCad['identificacao'] = $arrayCad['identificacao'];
                                    } else {
                                        if (!empty($protocolo['identificacao'])) {
                                            $arrayCad['identificacao'] = $protocolo['identificacao'];
                                        } else {
                                            $arrayCad['identificacao'] = null;
                                        }
                                    }
                                    if (empty($arrayCad['identificacao'])) {
                                        echo "<option value='' selected='selected' disabled='disabled'>Selecione</option>";
                                    }
                                    $identificacoes = [
                                        ["identificacao" => "Pessoa Física"],
                                        ["identificacao" => "Pessoa Jurídica"]
                                    ];
                                    if (!empty($identificacoes)) {
                                        foreach ($identificacoes as $key) {
                                            if ($arrayCad['identificacao'] == $key['identificacao']) {
                                                echo "<option value='{$key['identificacao']}' selected='selected'> {$key['identificacao']}</option>";
                                            } else {
                                                echo "<option value='{$key['identificacao']}'> {$key['identificacao']}</option>";
                                            }
                                        }
                                    } ?>
                                </select>
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe o solicitante</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="icnpj_cpf">CPF/CNPJ: </label>
                                <?php
                                if (!empty($arrayCad['cnpj_cpf'])) {
                                    $arrayCad['cnpj_cpf'] = $arrayCad['cnpj_cpf'];
                                } else {
                                    if (!empty($protocolo['cnpj_cpf'])) {
                                        $arrayCad['cnpj_cpf'] = $protocolo['cnpj_cpf'];
                                    } else {
                                        $arrayCad['cnpj_cpf'] = '';
                                    }
                                }
                                ?>
                                <input type="text" class="form-control" name="ncnpj_cpf" id="icnpj_cpf" maxlength="18" value="<?= $arrayCad['cnpj_cpf'] ?>" placeholder="Exemplo: XXX.XXX.XXX-XX / XX.XXX.XXX/0001-XX " required />
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe o CPF/CNPJ</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="iTelefone">Telefone: </label>
                                <?php
                                if (!empty($arrayCad['telefone'])) {
                                    $arrayCad['telefone'] = $arrayCad['telefone'];
                                } else {
                                    if (!empty($protocolo['contato'])) {
                                        $arrayCad['telefone'] = $protocolo['contato'];
                                    } elseif (!empty($protocolo['telefone'])) {
                                        $arrayCad['telefone'] = $protocolo['contato'];
                                    } else {
                                        $arrayCad['telefone'] = '';
                                    }
                                }
                                ?>
                                <input type="text" class="form-control" name="nTelefone" id="iTelefone" value="<?= $arrayCad['telefone'] ?>" placeholder="Exemplo: (99) 99999-9999" required />
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe o telefone</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="iEmail">E-mail: </label>
                                <?php
                                if (!empty($arrayCad['email'])) {
                                    $arrayCad['email'] = $arrayCad['email'];
                                } else {
                                    if (!empty($protocolo['email'])) {
                                        $arrayCad['email'] = $protocolo['email'];
                                    } else {
                                        $arrayCad['email'] = '';
                                    }
                                }
                                ?>
                                <input type="text" class="form-control <?= !empty($arrayError['email']) ? "is-invalid" : '' ?>" name="nEmail" id="iEmail" value="<?= $arrayCad['email'] ?>" placeholder="Exemplo: user@email.com" />
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> <?= !empty($arrayError['email']) ? $arrayError['email'] : 'Informe o e-mail' ?> </div>
                            </div>
                        </div>
                    </article>
                </section>
                <section class="card border-default mt-3">
                    <header class="card-header bg-default">
                        <h4 class="card-title h6 my-1"><i class="fas fa-info-circle"></i> Informação complementar</h4>
                    </header>
                    <article class="card-body">
                        <div class="form-row">
                            <div class="col mb-3">
                                <label for="iDescricao">Descrição: </label>
                                <?php
                                if (!empty($arrayCad['descricao'])) {
                                    $arrayCad['descricao'] = $arrayCad['descricao'];
                                } else {
                                    $arrayCad['descricao'] = '';
                                }
                                ?>
                                <textarea class="form-control" name="nDescricao" id="iDescricao" rows="4" required><?= $arrayCad['descricao'] ?></textarea>
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe a descrição</div>
                            </div>
                        </div>
                    </article>
                </section>
                <!--<section class="card">-->
                <section class="card mt-3 border-default">
                    <header class="card-header bg-default">
                        <h1 class="card-title h6 my-1"><i class="fas fa-search-location"></i> Endereço</h1>
                    </header>
                    <article class="card-body">
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for='iCidade'>Cidade: </label> <span class="btn btn-success btn-sm p-1" onclick="novaCidade()"> <i class="fa-solid fa-plus"></i> Novo</span> <span class="btn btn-secondary btn-sm p-1" onclick="voltarCidade()"><i class="fa-solid fa-rotate-left"></i> Selecionar</span><br />
                                <div id="divCidade" class="<?= !empty($arrayCad['nova_cidade']) ? 'd-none' : 'd-block' ?>">
                                    <select class="select-single custom-select" name="nCidade" id="iCidade" onchange="carregarSelectBairros(this.value)">
                                        <?php
                                        if (!empty($arrayCad['cidade_id'])) {
                                            $arrayCad['cidade_id'] = $arrayCad['cidade_id'];
                                        } else {
                                            if (!empty($protocolo['cidade_id'])) {
                                                $arrayCad['cidade_id'] = $protocolo['cidade_id'];
                                            } else {
                                                $arrayCad['cidade_id'] = null;
                                            }
                                        }
                                        if (empty($arrayCad['cidade_id'])) {
                                            echo "<option value='' selected='selected' disabled='disabled'>Selecione</option>";
                                        }
                                        if (!empty($cidades)) {
                                            foreach ($cidades as $key) {
                                                if ($arrayCad['cidade_id'] == $key['id']) {
                                                    echo "<option value='{$key['id']}' selected='selected'> {$key['cidade']}</option>";
                                                } else {
                                                    echo "<option value='{$key['id']}'> {$key['cidade']}</option>";
                                                }
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <input type="text" class="form-control <?= !empty($arrayCad['nova_cidade']) ? 'd-block' : 'd-none' ?>" name="nNovaCidade" id="iNovaCidade" placeholder="Informe a cidade" value="<?= ($arrayCad["nova_cidade"] ?? '') ?>">
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe a cidade</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='iBairro'>Bairro: </label> <span class="btn btn-success btn-sm p-1" onclick="novoBairro()"><i class="fa-solid fa-plus"></i> Novo</span> <span class="btn btn-secondary btn-sm p-1 <?= !empty($arrayCad['nova_cidade']) ? 'd-none' : 'd-inline-block' ?>" id="iVoltarBairro" onclick="voltarBairro()"><i class="fa-solid fa-rotate-left"></i> Selecionar</span><br />
                                <div id="divBairro" class="<?= !empty($arrayCad['nova_cidade']) ? 'd-none' : 'd-block' ?>">
                                    <select class="custom-select" name="nBairro" id="iBairro">
                                        <?php
                                        if (!empty($arrayCad['bairro_id'])) {
                                            $arrayCad['bairro_id'] = $arrayCad['bairro_id'];
                                        } else {
                                            if (!empty($protocolo['bairro_id'])) {
                                                $arrayCad['bairro_id'] = $protocolo['bairro_id'];
                                            } else {
                                                $arrayCad['bairro_id'] = null;
                                            }
                                        }
                                        if (empty($arrayCad['bairro_id'])) {
                                            echo "<option value='' selected='selected' disabled='disabled'>Selecione</option>";
                                        }
                                        if (!empty($bairros)) {
                                            foreach ($bairros as $key) {
                                                if ($arrayCad['bairro_id'] == $key['id']) {
                                                    echo "<option value='{$key['id']}' selected='selected'> {$key['bairro']}</option>";
                                                } else {
                                                    echo "<option value='{$key['id']}'> {$key['bairro']}</option>";
                                                }
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <input type="text" class="form-control <?= !empty($arrayError['novo_bairro']) ? "is-invalid" : '' ?> <?= !empty($arrayCad['nova_cidade']) ? 'd-block' : 'd-none' ?> d-none" name="nNovoBairro" id="iNovoBairro" placeholder="Informe o bairro" value="<?= ($arrayCad['novo_bairro'] ?? '') ?>">
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> <?= !empty($arrayError['novo_bairro']) ? $arrayError['novo_bairro'] : 'Informe o bairro' ?> </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for='iEndereco'>Endereço / Complemento: </label><br />
                                <?php
                                if (!empty($arrayCad['logradouro'])) {
                                    $arrayCad['logradouro'] = $arrayCad['logradouro'];
                                } else {
                                    if (!empty($protocolo['logradouro'])) {
                                        $arrayCad['logradouro'] = $protocolo['logradouro'];
                                    } else {
                                        $arrayCad['logradouro'] = '';
                                    }
                                }
                                ?>
                                <input type="text" name="nEndereco" class="form-control" id="iEndereco" placeholder="Exemplo: Próximo a Praça do Estrela" value="<?php echo !empty($arrayCad['logradouro']) ? $arrayCad['logradouro'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe o endereço
                                </div>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for='iNumero'>Número: </label><br />
                                <?php
                                if (!empty($arrayCad['numero'])) {
                                    $arrayCad['numero'] = $arrayCad['numero'];
                                } else {
                                    if (!empty($protocolo['numero'])) {
                                        $arrayCad['numero'] = $protocolo['numero'];
                                    } else {
                                        $arrayCad['numero'] = '';
                                    }
                                }
                                ?>
                                <input type="text" name="nNumero" class="form-control" id="iNumero" placeholder="Exemplo: S/N" value="<?php echo !empty($arrayCad['numero']) ? $arrayCad['numero'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe o número
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="iGPS">Coordenadas GPS:</label>
                                <?php
                                if (!empty($arrayCad['coordenadas_gps'])) {
                                    $arrayCad['coordenadas_gps'] = $arrayCad['coordenadas_gps'];
                                } else {
                                    if (!empty($protocolo['coordenadas_gps'])) {
                                        $arrayCad['coordenadas_gps'] = $protocolo['coordenadas_gps'];
                                    } else {
                                        $arrayCad['coordenadas_gps'] = '';
                                    }
                                }
                                ?>
                                <input type="text" class="form-control" name="nGPS" id="iGPS" value="<?= !empty($arrayCad['coordenadas_gps']) ? $arrayCad['coordenadas_gps'] : ''; ?>" placeholder='Exemplo: 41°24&rsquo;12.2"N 2°10&rsquo;26.5"E' />
                                <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe coordenadas GPS</div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='cLatitude'>Latitude: </label><br />
                                <?php
                                if (!empty($arrayCad['latitude'])) {
                                    $arrayCad['latitude'] = $arrayCad['latitude'];
                                } else {
                                    if (!empty($protocolo['latitude'])) {
                                        $arrayCad['latitude'] = $protocolo['latitude'];
                                    } else {
                                        $arrayCad['latitude'] = '';
                                    }
                                }
                                ?>
                                <input type="text" name="nLatitude" class="form-control" id="iLatitude" placeholder="Exemplo: -1.2955583054409823" value="<?php echo !empty($arrayCad['latitude']) ? $arrayCad['latitude'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe a Latitude
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for='cLongitude'>Longitude: </label><br />
                                <?php
                                if (!empty($arrayCad['longitude'])) {
                                    $arrayCad['longitude'] = $arrayCad['longitude'];
                                } else {
                                    if (!empty($protocolo['longitude'])) {
                                        $arrayCad['longitude'] = $protocolo['longitude'];
                                    } else {
                                        $arrayCad['longitude'] = '';
                                    }
                                }
                                ?>
                                <input type="text" name="nLongitude" class="form-control" id="iLongitude" placeholder="Exemplo: -47.91926629129639" value="<?php echo !empty($arrayCad['longitude']) ? $arrayCad['longitude'] : ''; ?>">
                                <div class="invalid-feedback">
                                    Informe a Longitude
                                </div>
                            </div>
                        </div>
                    </article>
                </section>
                <!--<section class="card">-->
                <div class="row mt-3">
                    <div class="form-group col">
                        <button class="btn btn-success" name="nSalvar" value="Salvar" onclick="valida_formProtocolo()" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                        <a href="<?php echo 'BASE_URL' ?>home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<section class="modal fade" id="modal_buscar_procotolo" role="dialog">
    <article class="modal-dialog modal-xl" role="document">
        <section class="modal-content">
            <header class="modal-header bg-light">
                <h5 class="modal-title h6 my-1"><i class="fas fa-search"></i> Buscar Protocolo do Processo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </header>
            <article class="modal-body">
                <form id="formBuscarProtocolo" onsubmit="event.preventDefault()">
                    <input type="hidden" id="iURL" value="<?= 'BASE_URL' . "protocolo/cadastro" ?>" />
                    <div class="form-row">
                        <div class="col-md-4 col-lg-3">
                            <label for="iBuscar">Buscar: </label>
                            <select class="custom-select" name="nBuscar" id="iBuscar" required>
                                <option value="protocolo">Protocolo</option>
                                <option value="interessado">Interessado</option>
                            </select>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <label for="iCampo">Por: </label>
                            <input type="text" name="nCampo" id="iCampo" class="form-control" required />
                            <div class="invalid-feedback"><i class="fa fa-info-circle"></i> Informe este campo</div>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col">
                            <span class="btn btn-success" id="btnPesquisarProcotolo"><i class="fa fa-search pull-left"></i> Buscar</span>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-sm table-hover mb-0 mt-4" id="resultadoBuscarProtocolo">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="align-middle" width="120">Tipo</th>
                            <th class="align-middle" width="150">Protocolo</th>
                            <th class="align-middle">Interessado</th>
                            <th class="align-middle text-center" width="70">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4">Nenhum resultado encontrado!</td>
                        </tr>
                    </tbody>
                </table>
            </article>
            <footer class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
            </footer>
        </section>
    </article>
</section>