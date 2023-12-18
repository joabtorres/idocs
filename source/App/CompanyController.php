<?php

namespace Source\App;

use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Company;
use Source\Support\Message;

/**
 * Class CompanyController Controller
 *
 * @package Source\App
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class CompanyController extends Controller
{

    /**
     * CompanyController construct
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
        $head = $this->seo->render(
            "Instituição - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            theme("/assets/images/share.jpg")
        );
        echo $this->view->render("company\search", [
            "head" => $head,
            "user" => Auth::user(),
            "companies" => (new Company)->find()->fetch(true)
        ]);
    }

    public function register(?array $data): void
    {
        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Error ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }
            if (in_array("", $data)) {
                $json['message'] = $this->message->info("Informe os dados para cadastrar o novo registro")->render();
                echo json_encode($json);
                return;
            }
        }
    }
}
