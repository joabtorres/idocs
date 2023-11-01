<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Support\Message;


/**
 * Class App
 *
 * @package Source\App
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class App extends Controller
{
    /**
     * App constructor
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_APP);
        //RESTRIÇÃO
        if(!Auth::user()){
            (new Message())->warning(
                "Efetue login para acessar o APP."
            )->flash();
            redirect("/entrar");
        }
    }

    /**
     * APP HOME
     *
     * @return void
     */
    public function home()
    {
        echo flash();
        var_dump(Auth::user());
        echo "<a href='" . url("/app/sair") . "'>Sair</a>";
    }

    /**
     * APP LOGOUT
     * @return void
     */
    public function logout()
    {
        (new Message())->info(
            "Você saiu com sucesso " . Auth::user()->first_name . " volte logo :)"
        )->flash();

        Auth::logout();
        redirect("/entrar");
    }
}