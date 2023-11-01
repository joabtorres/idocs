<?php

namespace Source\Models\Faq;

use Source\Core\Model;

/**
 * Class Channel
 *
 * @package Source\Model\Faq
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class Channel extends Model
{
    /**
     * Channel constructor
     */
    public function __construct()
    {
        parent::__construct("faq_channels", ["id"], ["channel", "description"]);
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        return true;
    }

}