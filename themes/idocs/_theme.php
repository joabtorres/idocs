<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $head ?>
    <link rel="icon" type="image/gif" href="<?= theme("assets/image/icon.png") ?>" sizes="32x32" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= theme("assets/styles_minify.css") ?>">
    <script>
        base_url = "<?= url() ?>";
    </script>

</head>

<body>
    <div class="ajax_load">
        <div class="ajax_load_box">
            <div class="ajax_load_box_circle"></div>
            <p class="ajax_load_box_title">Aguarde, carregando...</p>
        </div>
    </div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="sidebar-container">
                <div>
                    <div id="dismiss">
                        <i class="fas fa-arrow-left"></i>
                    </div>

                    <div class="sidebar-header">
                        <img src="<?= theme("assets/image/logo-login.png") ?>" class="img-fluid" />
                    </div>

                    <ul class="list-unstyled components">
                        <li>
                            <a href="<?= url() ?>"><i class="fa fa-tachometer-alt "></i> Página Inicial</a>
                        </li>
                        <li>
                            <a href="#sidebarDocument" data-toggle="collapse" aria-expanded="false"><i class="fas fa-angle-double-right"></i> Documentos</a>
                            <ul class="collapse list-unstyled" id="sidebarDocument">
                                <li>
                                    <a href="<?= url('documento/novo-registro') ?>"><i class="fas fa-plus-square"></i> Novo
                                        Registro</a>
                                </li>
                                <li>
                                    <a href="<?= url('documento/consultar') ?>"><i class="fas fa-tasks"></i> Consultar
                                        Protocolos</a>
                                </li>
                                <li>
                                    <a href="<?= url('documento/grafico') ?>"><i class="fa-solid fa-chart-column"></i> Gráfico de
                                        Documentos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#sidebarUser" data-toggle="collapse" aria-expanded="false"><i class="fas fa-angle-double-right"></i> Usuários</a>
                            <ul class="collapse list-unstyled" id="sidebarUser">
                                <li>
                                    <a href="usuario/novo-registro"><i class="fa-solid fa-user-plus"></i>
                                        Novo Registro</a>
                                </li>
                                <li>
                                    <a href="usuario/consultar"><i class="fas fa-tasks"></i> Consultar
                                        Usuários</a>
                                </li>
                                <li>
                                    <a href="usuario/editar"><i class="fa-solid fa-user-pen"></i> Editar
                                        Perfil</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#sidebarSettings" data-toggle="collapse" aria-expanded="false"><i class="fas fa-angle-double-right"></i> Configurações</a>
                            <ul class="collapse list-unstyled" id="sidebarSettings">
                                <li>
                                    <a href="<?= url("instituicao") ?>"><i class="fa-solid fa-hotel"></i>
                                        Instituição</a>
                                </li>
                                <li>
                                    <a href="<?= url("setores") ?>"><i class="fa-solid fa-sitemap"></i>
                                        Setores</a>
                                </li>
                                <li>
                                    <a href="<?= url("/tipos-de-documentos") ?>"><i class="fa-solid fa-paste"></i>
                                        Tipos de Documentos</a>
                                </li>
                                <li>
                                    <a href="<?= url("/statuss-para-documentos") ?>"><i class="fa-solid fa-swatchbook"></i>
                                        Status para Documentos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= url("/sair") ?>"><i class="fa fa-sign-out-alt"></i> Sair</a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-footer text-secondary">
                    <i class="fa-solid fa-copyright"></i> 2023 - Desenvolvido com <i class="fa-solid fa-heart text-danger"></i> <br> por <a href="#" class="text-decoration-none text-white">Joab
                        Torres</a>
                </div>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-justify"></i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user text-primary"></i>
                                    <?= ("{$user->first_name} {$user->last_name}" ?? "") ?>
                                    <b class="caret"></b>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="usuario/editar/"><i class="fas fa-users-cog text-primary"></i> Editar Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="usuario/sair"><i class="fa fa-sign-out-alt text-primary"></i> Sair</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--conteudo da página-->

            <main class="main-content">
                <?= $this->section("content"); ?>
            </main>

            <!--conteudo da página-->
            <div class="mb-5"></div>
            <footer id="col">
                <hr>
                <p class="text-right small mb-0 pb-0">
                    <i class="fa-solid fa-copyright"></i> 2023 - Desenvolvido com <i class="fa-solid fa-heart text-danger"></i> por <a href="#" class="text-decoration-none text-primary font-bold">Joab Torres</a> <br />
                    <?= CONF_SITE_NAME ?> - Versão <?= CONF_SITE_VERSION ?>
                </p>
            </footer>
        </div>

    </div>

    <div class="overlay"></div>
    <script src="<?= theme("/assets/scripts_minify.js"); ?>"></script>
    <?= $this->section("scripts"); ?>
</body>

</html>