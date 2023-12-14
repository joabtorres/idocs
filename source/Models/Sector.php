<?php

namespace Source\Models;

use Source\Core\Model;


/**
 * Class Sector
 *
 * @package Source\Model
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class Sector extends Model
{
    /**
     * Sector constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "sectores",
            ["id"],
            ["companies_id", "name"]
        );
    }
    /**
     * bootstrap function
     *
     * @param integer $companies_id
     * @param string $name
     * @param string $abbreviation
     * @return Sector
     */
    public function bootstrap(int $companies_id, string $name, string $abbreviation,): Sector
    {
        $this->name = $name;
        $this->abbreviation = $abbreviation;
        $this->companies_id = $companies_id;
        return $this;
    }
    /**
     * company function
     *
     * @return Company|null
     */
    public function company(): ?Company
    {
        if ($this->companies_id) {
            return (new Company())->findById($this->companies_id);
        }
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
