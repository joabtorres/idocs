<?php $this->layout("auth\_theme", ["head" => $head]); ?>

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