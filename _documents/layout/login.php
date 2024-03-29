<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <!--fontawesome-free-->
    <link rel="stylesheet" href="assets/css/fontawesome/fontawesome.min.css">
    <!--fontawesome-free regular-->
    <link rel="stylesheet" href="assets/css/fontawesome/regular.min.css">
    <!--fontawesome-free brands-->
    <link rel="stylesheet" href="assets/css/fontawesome/brands.min.css">
    <!--fontawesome-free solid-->
    <link rel="stylesheet" href="assets/css/fontawesome/solid.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 bg-light d-flex align-items-center justify-content-center" id="content-logo">
                <div>
                    <img src="assets/image/logo-login.png" class="mx-auto d-block">
                </div>
            </div>
            <div class="col-md-5 bg-strong pt-3 pb-3" id="content-login">
                <div></div>
                <div>
                    <section class="offset-lg-1 offset-md-2 col-lg-10 me-auto">
                        <p class="text-white"><strong>Login</strong></p>
                        <form action="index.php">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary text-white border-primary pe-4 ps-4"><i class="fa-solid fa-user"></i></div>
                                </div>
                                <input type="email" class="form-control border-primary" placeholder="Informe o e-mail" aria-label="Informe o e-mail" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-primary text-white border-primary pe-4 ps-4"><i class="fa-solid fa-lock"></i></div>
                                </div>
                                <input type="password" class="form-control" placeholder="Informe a senha" aria-label="Informe a senha" aria-describedby="basic-addon1">
                            </div>
                            <div>
                                <div class="m-0 text-end text-secondary mt-1 mb-1">Esqueceu a senha? <a href="#" class="text-primary text-decoration-none">Clique aqui</a></div>
                                <button class="btn btn-primary pe-4 ps-4"><i class="fa-solid fa-right-to-bracket"></i>
                                    Entrar</button>
                            </div>
                        </form>
                        <div class="bg-danger p-2 mt-2 mb-2 text-white text-center">
                            E-mail ou senha inválido
                        </div>
                    </section>
                </div>
                <footer class="text-center text-secondary">
                    <i class="fa-solid fa-copyright"></i> 2023 - Desenvolvido com <i class="fa-solid fa-heart text-danger"></i> por <a href="#" class="text-decoration-none">Joab
                        Torres</a>
                </footer>
            </div>
        </div>

    </div>

    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>