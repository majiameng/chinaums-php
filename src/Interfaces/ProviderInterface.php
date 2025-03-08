<?php

namespace tinymeng\Chinaums\Interfaces;

interface ProviderInterface
{
    public function pay($order);

    public function find($order);

    public function cancel($order);

    public function close($order);

    public function refund($order);

    public function callback($contents);

    public function success();
}
