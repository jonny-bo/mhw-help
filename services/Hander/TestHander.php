<?php
namespace mhw\services\Hander;

use mhw\services\Service;

class TestHander
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function test()
    {
        echo "hello test hander";
    }
}