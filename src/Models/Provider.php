<?php

namespace Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\FileInterface;
use Gpenverne\PsrCloudFiles\Interfaces\FolderInterface;
use Gpenverne\PsrCloudFiles\Interfaces\ProviderInterface;

class Provider implements ProviderInterface
{
    /**
     * @var FolderInterface
     */
    private $rootFolder;

    /**
     * {@inheritdoc}
     */
    public function getRootFolder()
    {
        return $this->rootFolder;
    }

    /**
     * {@inheritdoc}
     */
    public function setRootFolder(FolderInterface $folder)
    {
        $this->rootFolder = $folder;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function findByPath($path)
    {
        $paths = explode(\DIRECTORY_SEPARATOR, $path);
        array_shift($paths);

        return $this->rootFolder->findByPath(implode(\DIRECTORY_SEPARATOR, $paths));
    }

    /**
     * {@inheritdoc}
     */
    public function getLink(FileInterface $file)
    {
        return false;
    }
}
