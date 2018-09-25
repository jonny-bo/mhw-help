<?php

namespace mhw\services;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * A service provider interface.
 *
 * @author  jonny bo
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Service $service)
    {
        $service['dispatcher'] = function () {
            return new EventDispatcher();
        };
    }
}