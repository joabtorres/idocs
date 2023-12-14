<?php

namespace Source\Models;

use Source\Core\Model;


/**
 * Class Company
 *
 * @package Source\Model
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class Company extends Model
{
    /**
     * Company constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "companies",
            ["id"],
            ["full_name", "cnpj", "address", "phone", "email"]
        );
    }
    /**
     * bootstrap function
     *
     * @param string $fullName
     * @param string $cnpj
     * @param string $address
     * @param string|null $phone
     * @param string|null $email
     * @return Company
     */
    public function bootstrap(
        string $fullName,
        string $cnpj,
        string $address,
        string $phone = null,
        string $email = null
    ): Company {
        $this->full_name = $fullName;
        $this->cpnj = $cnpj;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        return true;
    }
}
