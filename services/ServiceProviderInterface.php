<?php

namespace mhw\services;

/**
 * A service provider interface.
 *
 * @author  jonny bo
 */
interface ServiceProviderInterface
{
    /**
     * Registers services on the given service.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Service $service A container instance
     */
    public function register(Service $service);
}
