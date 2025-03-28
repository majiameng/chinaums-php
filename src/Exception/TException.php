<?php
namespace tinymeng\Chinaums\Exception;

use Exception;

class TException extends Exception
{
    protected $raw;

    public function __construct($message, $code = 0, $raw = null)
    {
        parent::__construct($message, $code);
        $this->raw = $raw;
    }

    public function getRaw()
    {
        return $this->raw;
    }
}