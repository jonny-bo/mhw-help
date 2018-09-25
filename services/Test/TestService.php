<?php

namespace mhw\services\Test;

use mhw\services\Service;

class TestService
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function do()
    {
        echo "hello world";
    }
}