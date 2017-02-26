<?php

namespace Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\FolderInterface;
use Gpenverne\PsrCloudFiles\Interfaces\ProviderInterface;

class Provider implements ProviderInterface
{
    /**
     * @var FolderInterface
     */
    private $rootFolder;

    /**
     * @return FolderInterface
     */
    public function getRootFolder()
    {
        return $this->rootFolder;
    }

    /**
     * @param FolderInterface $folder
     *
     * @return $this
     */
    public function setRootFolder(FolderInterface $folder)
    {
        $this->rootFolder = $folder;

        return $this;
    }
}
