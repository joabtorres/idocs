<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Category
 *
 * @package Source\Model
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class Category extends Model
{
    /**
     * Category construct
     */
    public function __construct()
    {
        parent::__construct("categories", ["id"], ["title", "id"]);
    }

    /**
     * @param string $uri
     * @param string $columns
     *
     * @return array|mixed|Model|null
     */
    public function findByUri(string $uri, string $columns = "*")
    {
        return $this->find("uri=:uri", "uri={$uri}", $columns)->fetch();
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        return true;
    }
}