<?php

namespace Source\App;

use Source\Core\Controller;

/**
 * Class HomeController Controller
 *
 * @package Source\App
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */

class UserController extends Controller
{
    public function __construct()
    {
    }
    public function register(): void
    {
        echo 'controler  de usuário registro';
    }
    public function serach(?array $data): void
    {
        echo 'controler  de consulta usuários';
    }
}
