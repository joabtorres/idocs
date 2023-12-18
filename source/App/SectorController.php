<?php

namespace Source\App;

use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Sector;
use Source\Support\Message;

/**
 * Class CompanyController Controller
 *
 * @package Source\App
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class SectorController extends Controller
{
    /**
     * SectorController function
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
    public function search(?array $data): void
    {
        var_dump((new Sector)->find()->fetch(true));
    }
}
