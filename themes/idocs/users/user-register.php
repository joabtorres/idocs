<div class="container-fluid">
    <div class="row">
        <div class="col" id="pagina-header">
            <h5>Novo Usuário</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo 'BASE_URL' ?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-angle-double-right"></i> Usuários</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo 'BASE_URL' ?>usuario/cadastro"><i class="fas fa-user-plus"></i> Novo Usuário</a></li>
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
    <!--<div class="row">-->
    <!--fim row-->
    <div class="row" id="container-usuario-form">
        <div class="col">
            <section class="card border-dark">
                <header class="card-header bg-dark">
                    <h1 class="card-title h6 my-1"><i class="fas fa-user-plus"></i> Novo Usuário</h1>
                </header>
                <article class="card-body">
                    <form method="POST" action="<?php echo 'BASE_URL' ?>usuario/cadastro" enctype="multipart/form-data" autocomplete="off" name="nFormUsuario" class="needs-validation <?php echo (!empty($arrayErro)) ? 'was-validated' : ''; ?>" novalidate>
                        <input type="hidden" name="nId" value="<?php echo !empty($arrayCad['id']) ? $arrayCad['id'] : 0; ?>" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for='iSetor'>Setor: * </label>
                                    <select class="custom-select" name="nSetor" id="iSetor" required>
                                        <?php
                                        foreach ($setores as $indice) {
                                            if (isset($arrayCad['setor_id']) && $indice['id'] == $arrayCad['setor_id']) {
                                                echo '<option value = "' . $indice['id'] . '" selected = "selected">' . $indice['nome'] . ' - ' . $indice['abreviacao'] . '</option>';
                                            } else {
                                                echo '<option value = "' . $indice['id'] . '">' . $indice['nome'] . ' - ' . $indice['abreviacao'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Informe o setor</div>
                                </div>
                                <div class="mb-3">
                                    <label for='iAssunto'>Cargo: *</label><br />
                                    <input type="text" name="nCargo" class="form-control" id="iAssunto" placeholder="Exemplo: Coordenador" value="<?php echo !empty($arrayCad['cargo']) ? $arrayCad['cargo'] : ''; ?>" required>
                                    <div class="invalid-feedback">
                                        Informe o cargo
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iMatricula'>Portaria/Matricula: </label><br />
                                    <input type="text" name="nMatricula" class="form-control" id="iMatricula" placeholder="Exemplo: 1.122/19" value="<?php echo !empty($arrayCad['portaria']) ? $arrayCad['portaria'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for='iNome'>Nome: *</label><br />
                                    <input type="text" name="nNome" class="form-control" id="iNome" placeholder="Exemplo: Joab Torres Alencar" value="<?php echo !empty($arrayCad['nome']) ? $arrayCad['nome'] : ''; ?>" required>
                                    <div class="invalid-feedback">
                                        Informe o nome
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iUsuario'>Usuário: *</label><br />
                                    <input type="text" name="nUsuario" class="form-control <?php echo !empty($arrayErro['usuario']) ? $arrayErro['usuario']['class'] : ''; ?>" id="iUsuario" placeholder="Exemplo: joab.torres" value="<?php echo !empty($arrayCad['usuario']) ? $arrayCad['usuario'] : ''; ?>" required>
                                    <div class="invalid-feedback">
                                        <?php echo !empty($arrayErro['usuario']) ? $arrayErro['usuario']['msg'] : 'Informe o usuário'; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iEmail'>E-mail: *</label><br />
                                    <input type="email" name="nEmail" class="form-control <?php echo !empty($arrayErro['email']) ? $arrayErro['email']['class'] : ' '; ?>" id="iEmail" placeholder="Exemplo: joab.alencar@hotmail.com" value="<?php echo !empty($arrayCad['email']) ? $arrayCad['email'] : ''; ?>" required>
                                    <div class="invalid-feedback">
                                        <?php echo !empty($arrayErro['email']) ? $arrayErro['email']['msg'] : 'Informe o email'; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iSenha'>Senha: *</label><br />
                                    <input type="password" minlength="8" name="nSenha" class="form-control <?php echo !empty($arrayErro['senha']) ? $arrayErro['senha']['class'] : ''; ?>" id="iSenha" required title="Deve conter pelo menos 8 ou mais caracteres">
                                    <div class="invalid-feedback">
                                        <?php echo !empty($arrayErro['senha']) ? $arrayErro['senha']['msg'] : 'Informe o senha'; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iRepetirSenha'>Repetir Senha: *</label><br />
                                    <input type="password" minlength="8" name="nRepetirSenha" class="form-control <?php echo !empty($arrayErro['senha']) ? $arrayErro['senha']['class'] : ''; ?>" id="iRepetirSenha" required title="Deve conter pelo menos 8 ou mais caracteres">
                                    <div class="invalid-feedback">
                                        <?php echo !empty($arrayErro['senha']) ? $arrayErro['senha']['msg'] : "Os campos 'Senha' e 'Repetir Senha' devem ser preenchidos"; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for='idatacadastro'>Data de cadastro: *</label>
                                    <input type="text" name="nDataCadastro" class="form-control input-data date_serach" id="idatacadastro" placeholder="Exemplo: 25/01/2021" value="<?php echo !empty($arrayCad['data_cadastro']) ? $this->formatDateView($arrayCad['data_cadastro']) : ''; ?>" required>
                                    <div class="invalid-feedback">
                                        Informe a data de cadastro
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='idatafinalizacao'>Data de finalização: </label>
                                    <input type="text" name="nDataFinalizacao" class="form-control input-data date_serach" id="idatafinalizacao" placeholder="Exemplo: 05/06/2021" value="<?php echo !empty($arrayCad['data_finalizacao']) ? $this->formatDateView($arrayCad['data_finalizacao']) : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for='iOBS'>Observação: </label>
                                    <input type="text" name="nObservacao" class="form-control" id="iOBS" placeholder="Exemplo: Mudança de setor / Exonerado" value="<?php echo !empty($arrayCad['observacao']) ? $arrayCad['observacao'] : ''; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for='iTema'>Estilo do Tema: </label>
                                    <select name="nTema" class="custom-select" id="iTema">
                                        <?php
                                        $temas = [
                                            [
                                                "mode" => "",
                                                "name" => "Padrão"
                                            ], [
                                                "mode" => "mode-green",
                                                "name" => "Verde"
                                            ], [
                                                "mode" => "mode-dark",
                                                "name" => "Escuro"
                                            ]
                                        ];
                                        foreach ($temas as $key) {
                                            if ($arrayCad['mode'] == $key['mode']) {
                                                echo "<option value='{$key['mode']}'selected='selected'>{$key['name']}</option>";
                                            } else {
                                                echo "<option value='{$key['mode']}'>{$key['name']}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Informe o nível de acesso
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for='iAcesso'>Nivel de Acesso: *</label>
                                    <select name="nAcesso" class="custom-select" id="iAcesso" required>
                                        <?php
                                        if (empty($arrayCad['acesso'])) {
                                            echo "<option value='' disabled selected='selected'>Selecione o nível de acesso</option>";
                                        }
                                        $arrayOptions = ["0" => "Usuário Inativo", "1" => "Básico", "2" => "Intermediário", "10" => "Administrador"];
                                        foreach ($arrayOptions as $key => $value) {
                                            if (isset($arrayCad['acesso']) && $key == $arrayCad['acesso']) {
                                                echo "<option value='{$key}' selected='selected'>{$value}</option>";
                                            } else {
                                                echo "<option value='{$key}'>{$value}</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Informe o nível de acesso
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <span>Status:</span><br />
                                    <?php
                                    if (isset($usuario['status'])) {
                                        $status = array(array('nome' => 'Ativo', 'valor' => '1'), array('nome' => 'Inativo', 'valor' => '0'));
                                        foreach ($status as $statu) {
                                            if ($arrayCad['status'] == $statu['valor']) {
                                                echo ' <label><input type="radio" name="nStatus" value="' . $statu['valor'] . '" checked /> ' . $statu['nome'] . '</label> ';
                                            } else {
                                                echo ' <label><input type="radio" name="nStatus" value="' . $statu['valor'] . '" /> ' . $statu['nome'] . '</label> ';
                                            }
                                        }
                                    } else {
                                        echo ' <label><input type="radio" name="nStatus" value="1" checked/> Ativo</label> ';
                                        echo ' <label><input type="radio" name="nStatus" value="0"/> Inativo </label> ';
                                    }
                                    ?>

                                </div>
                                <figure class="text-center mt-5">
                                    <div class="col-md-12 mt-1 text-center">
                                        <div class="img-thumbnail rounded-circle mt-1 mt-md-5" id="imageUser" style="<?php echo (!empty($arrayCad['anexo'])) ? 'background-image: url(' . 'BASE_URL' . $arrayCad['anexo'] . ');' : ''; ?>"></div>
                                    </div>
                                    <figcaption class="mt-3">
                                        <div class="small my-1 text-success">Recomendação: selecione uma foto no formato 1 x 1 (quadrada).</div>
                                        <label class="btn btn-warning text-while" onclick="readDefaultURL()">Padrão</label>
                                        <label class="btn btn-success" for="cFileImagem">Escolher Imagem</label>
                                        <input type="file" name="tImagem-1" id="cFileImagem" onchange="readURL(this)" />
                                        <input type="hidden" name="nImagem" id="iImagem-user" value="<?php echo isset($arrayCad['imagem']) && !is_array($arrayCad['imagem']) ? $arrayCad['imagem'] : null; ?>" />
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <button class="btn btn-success" name="nSalvar" value="Salvar" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                                <a href="<?php echo 'BASE_URL' ?>home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                            </div>
                        </div>
                    </form>
                </article>
                <!--<article class="card-body">-->
            </section>
            <!--<section class="card">-->
        </div>
    </div>
</div>