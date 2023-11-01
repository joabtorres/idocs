<?php

namespace Source\Support;

use Source\Core\Session;

/**
 * Class Message
 *
 * @package Source\Support
 * @author Joab T. Alencar <contato@joabtorres.com.br>
 * @version 1.0
 */
class Message
{
    /** @var string */
    private $text;

    /** @var string */
    private $type;

    /**
     * @return string texto da mensagem formatada em html e css
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string texto da mensagem
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return string type da classe css
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $message texto da mensagem
     *
     * @return Message
     */
    public function info(string $message): Message
    {
        $this->type = CONF_MESSAGE_INFO;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message texto da mensagem
     *
     * @return Message
     */
    public function success(string $message): Message
    {
        $this->type = CONF_MESSAGE_SUCCESS;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message texto da mensagem
     *
     * @return Message
     */
    public function warning(string $message): Message
    {
        $this->type = CONF_MESSAGE_WARNING;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @param string $message texto da mensagem
     *
     * @return Message
     */
    public function error(string $message): Message
    {
        $this->type = CONF_MESSAGE_ERROR;
        $this->text = $this->filter($message);
        return $this;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return "<div class='" . CONF_MESSAGE_CLASS . " {$this->getType()}'>{$this->getText()}</div>";
    }

    /**
     * @return string json
     */
    public function json(): string
    {
        return json_encode(["error" => $this->getText()]);
    }

    /**
     * Função para salvar a mensagem em uma $_SESSION['flash']
     * @return void
     */
    public function flash(): void
    {
        (new Session())->set("flash", $this);
    }

    /**
     * Função para validar o texto da mensagem informado
     * @param string $message texto da mensagem
     *
     * @return string
     */
    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}