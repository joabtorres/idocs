<?php

namespace Source\App;

use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Support\Message;

/**
 * Class DocumentController Controller
 *
 * @package Source\App
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */

class DocumentController extends Controller
{
    /**
     * DocumentController construct
     */
    public function __construct()
    {
        Connect::getInstance();
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
        //RESTRIÇÃO
        if (!Auth::user()) {
            (new Message())->warning(
                "Efetue login para acessar o iDocs."
            )->flash();
            redirect("/entrar");
        }
    }

    /**
     * Document new register
     *
     * @return void
     */
    public function register(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );
        echo $this->view->render("document/form-new-register", [
            "head" => $head,
            "user" => Auth::user()
        ]);
    }

    /**
     * Document serach registed
     *
     * @return void
     */
    public function search(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );
        echo $this->view->render("document/search", [
            "head" => $head,
            "user" => Auth::user()
        ]);
    }
    /**
     * graphic function
     *
     * @param array|null $data
     * @return void
     */
    public function graphic(?array $data): void
    {
        echo "controller gráfico estatisticos";
    }
}
