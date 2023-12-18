<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class DocType
 *
 * @package Source\Model
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class DocType extends Model
{

    /**
     * Sector constructor.
     */

    public function __construct()
    {
        parent::__construct(
            "docs_types",
            ["id"],
            ["companies_id", "name", "type"]
        );
    }
    /**
     * bootstrap function
     *
     * @param [type] $company
     * @param [type] $name
     * @param [type] $type
     * @return DocType
     */
    public function bootstrap($company, $name, $type): DocType
    {
        $this->companies_id = $company;
        $this->name = $name;
        $this->type = $type;
        return $this;
    }

    /**
     * save function
     *
     * @return boolean
     */
    public function save(): bool
    {
        return true;
    }
}
