<?php

namespace Gpenverne\PsrCloudFiles\Factories;

use Gpenverne\PsrCloudFiles\Interfaces\CloudItemInterface;
use Gpenverne\PsrCloudFiles\Interfaces\FolderInterface;
use Gpenverne\PsrCloudFiles\Models\Folder;

class FolderFactory implements FactoryInterface
{
    use ParametersCheckerTrait;

    /**
     * @param array $parameters
     *
     * @return FolderInterface
     */
    public function create($parameters)
    {
        $this->checkParameters(CloudItemInterface::TYPE_FOLDER, FolderInterface::REQUIRED_PARAMETERS, $parameters);

        $folder = new Folder();
        $folder->setId($parameters['id'])
            ->setName($parameters['name'])
            ->setParentFolder($parameters['parentFolder'])
            ->setProvider($parameters['provider'])
        ;

        return $folder;
    }
}
