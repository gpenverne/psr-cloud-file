<?php

namespace Gpenverne\PsrCloudFiles\Factories;

use Gpenverne\PsrCloudFiles\Interfaces\CloudItemInterface;
use Gpenverne\PsrCloudFiles\Interfaces\FileInterface;

class FileFactory implements FactoryInterface
{
    use ParametersCheckerTrait;

    /**
     * @param array $parameters
     *
     * @return FileInterface
     */
    public function create($parameters)
    {
        $this->checkParameters(CloudItemInterface::TYPE_FILE, FileInterface::REQUIRED_PARAMETERS, (array) $parameters);

        $file = new File();
        $file->setName($parameters['name'])
            ->setSize((int) $parameters['size'])
            ->setParentFolder($parameters['parentFolder'])
            ->setId($parameters['id'])
        ;

        return $file;
    }
}
