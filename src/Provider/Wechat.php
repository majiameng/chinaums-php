<?php

namespace tinymeng\Chinaums\Provider;

use tinymeng\Chinaums\Tools\Str;

class Wechat extends BaseProvider
{
    /**
     * @param string $shortcut
     * @param array $params
     * @return mixed
     */
    public function __call(string $shortcut, array $params)
    {
        $class = '\\tinymeng\\Chinaums\\Service\\Wechat\\' . Str::studly($shortcut);
        $service = new $class($this->config);
        return $service;
    }
}
