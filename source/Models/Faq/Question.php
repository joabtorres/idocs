<?php

namespace Source\Models\Faq;

use Source\Core\Model;

/**
 * Class Question
 *
 * @package Source\Model\Faq
 * @author  Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class Question extends Model
{
    /**
     * Question construct
     */
    public function __construct()
    {
        parent::__construct("faq_questions", ['id'], ["chanel_id", "question", "response"]);
    }

    /**
     * @return bool
     */
    public function save():bool{
        return true;
    }
}