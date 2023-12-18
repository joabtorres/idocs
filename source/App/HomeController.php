<?php

namespace Source\App;

use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Support\Message;

/**
 * Class HomeController Controller
 *
 * @package Source\App
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class HomeController extends Controller
{
    /**
     * HomeController construct
     */
    public function __construct()
    {
        //redirect("/ops/manutencao");
        Connect::getInstance();
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
        if (!Auth::user()) {
            (new Message())->warning(
                "Efetue login para acessar o iDocs."
            )->flash();
            redirect("/entrar");
        }
    }
    /**
     * HOME
     *
     * @return void
     */
    public function home(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );
        echo $this->view->render("home", [
            "head" => $head,
            "user" => Auth::user()
        ]);
    }
}
