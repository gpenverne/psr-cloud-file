<?php

namespace Gpenverne\PsrCloudFiles\Factories;

use Gpenverne\PsrCloudFiles\Exception\NotEnoughParametersException;
use Gpenverne\PsrCloudFiles\Interfaces\CloudItemInterface;

interface FactoryInterface
{
    /**
     * @param mixed $parameters
     *
     * @return CloudItemInterface
     */
    public function create($parameters);

    /**
     * @param string $type
     * @param array  $keys
     * @param array  $parameters
     *
     * @throws NotEnoughParametersException
     *
     * @return bool
     */
    public function checkParameters($type, $keys, $parameters);
}
