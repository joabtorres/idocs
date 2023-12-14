<?php

namespace Source\App;

use Source\Core\Connect;
use Source\Core\Controller;
use Source\Models\Company as CompanyModel;

/**
 * Company class
 */
class Company extends Controller
{
    /**
     * Document construct
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
    public function search(?array $data): void
    {
        var_dump((new CompanyModel())->findById(1));
    }
}
