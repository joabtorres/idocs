<?php

namespace Source\App;

use Source\Core\Connect;
use Source\Core\Controller;

class Document extends Controller
{
    /**
     * Web construct
     */
    public function __construct()
    {
        Connect::getInstance();
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
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
            "head" => $head
        ]);
    }

    /**
     * Document new register
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
            "head" => $head
        ]);
    }
}
