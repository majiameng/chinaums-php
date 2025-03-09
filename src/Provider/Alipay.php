<?php

namespace tinymeng\Chinaums\Provider;


use tinymeng\Chinaums\Tools\Str;

/**
 * Alipay
 */
class Alipay extends BaseProvider
{

    /**
     * @param string $shortcut
     * @param array $params
     * @return mixed
     */
    public function __call(string $shortcut, array $params)
    {
        $class = '\\tinymeng\\Chinaums\\Service\\Alipay\\' . Str::studly($shortcut);
        $service = new $class($this->config);
        return $service;
    }

}
