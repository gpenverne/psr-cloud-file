<?php

namespace Gpenverne\PsrCloudFiles\Factories;

use Gpenverne\PsrCloudFiles\Exception\NotEnoughParametersException;

trait ParametersCheckerTrait
{
    public function checkParameters($type, $keys, $parameters)
    {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $parameters)) {
                throw new NotEnoughParametersException(sprintf('"%s" key is required to generate a %s', $key, $type));
            }
        }

        return true;
    }
}
