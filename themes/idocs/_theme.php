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
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="<?= theme("assets/css/bootstrap/bootstrap.min.css") ?>">
    <!--fontawesome-free-->
    <link rel="stylesheet" href="<?= theme("assets/css/fontawesome/fontawesome.min.css") ?>">
    <!--fontawesome-free regular-->
    <link rel="stylesheet" href="<?= theme("assets/css/fontawesome/regular.min.css") ?>">
    <!--fontawesome-free brands-->
    <link rel="stylesheet" href="<?= theme("assets/css/fontawesome/brands.min.css") ?>">
    <!--fontawesome-free solid-->
    <link rel="stylesheet" href="<?= theme("assets/css/fontawesome/solid.min.css") ?>">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?= theme("assets/css/mCustomScrollbar.min.css") ?>">
    <!-- Date datepicker CSS -->
    <link rel="stylesheet" href="<?= theme("assets/css/jquery-ui/jquery-ui.min.css") ?>">
    <!-- Our Date datepicker 2 -->
    <link rel="stylesheet" href="<?= theme("assets/css/select2/select2.min.css") ?>">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?= theme("assets/css/style.css") ?>">
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="<?= theme("assets/js/jquery-3.1.1.min.js") ?>"></script>
    <!-- Date datepicker JS -->
    <script src="<?= theme("assets/js/jquery-ui/jquery-ui.min.js") ?>"></script>
    <!-- select2 JS -->
    <script defer src="<?= theme("assets/js/select2/select2.min.js") ?>"></script>
    <script>
        base_url = "<?= url() ?>";
    </script>

</head>

<body>

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
                                    <a href="<?= url('documentos/novo-registro') ?>"><i class="fas fa-plus-square"></i> Novo
                                        Registro</a>
                                </li>
                                <li>
                                    <a href="<?= url('documentos/buscar') ?>"><i class="fas fa-tasks"></i> Consultar
                                        Protocolos</a>
                                </li>
                                <li>
                                    <a href="<?= url('documentos/grafico') ?>"><i class="fa-solid fa-chart-column"></i> Gráfico de
                                        Documentos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#sidebarUser" data-toggle="collapse" aria-expanded="false"><i class="fas fa-angle-double-right"></i> Usuários</a>
                            <ul class="collapse list-unstyled" id="sidebarUser">
                                <li>
                                    <a href="admin_docs/cadastro"><i class="fa-solid fa-user-plus"></i>
                                        Novo Registro</a>
                                </li>
                                <li>
                                    <a href="admin_docs/consultar"><i class="fas fa-tasks"></i> Consultar
                                        Usuários</a>
                                </li>
                                <li>
                                    <a href="admin_docs/consultar"><i class="fa-solid fa-user-pen"></i> Editar
                                        Perfil</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#sidebarSettings" data-toggle="collapse" aria-expanded="false"><i class="fas fa-angle-double-right"></i> Configurações</a>
                            <ul class="collapse list-unstyled" id="sidebarSettings">
                                <li>
                                    <a href="fisc_denuncia/cadastro"><i class="fa-solid fa-hotel"></i>
                                        Instituição</a>
                                </li>
                                <li>
                                    <a href="fisc_solicitacao/cadastro"><i class="fa-solid fa-sitemap"></i>
                                        Setores</a>
                                </li>
                                <li>
                                    <a href="fisc_denuncia/consultar"><i class="fa-solid fa-paste"></i>
                                        Tipos de Documentos</a>
                                </li>
                                <li>
                                    <a href="fisc_solicitacao/consultar"><i class="fa-solid fa-swatchbook"></i>
                                        Status para Documentos</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="usuario/sair"><i class="fa fa-sign-out-alt"></i> Sair</a>
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
                                    Joab Torres Alencar
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
    <!-- Bootstrap JS -->
    <script src="<?= theme("assets/js/bootstrap/bootstrap.min.js") ?>"></script>
    <script src="<?= theme("assets/js/maskedinput/jquery.maskedinput.min.js") ?>"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="<?= theme("assets/js/mCustomScrollbar.min.js") ?>"></script>
    <script src="<?= theme("assets/js/script.js") ?>"></script>
</body>

</html>