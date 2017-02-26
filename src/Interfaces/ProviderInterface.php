<?php

namespace Gpenverne\PsrCloudFiles\Interfaces;

interface ProviderInterface
{
    /**
     * @return FolderInterface
     */
    public function getRootFolder();

    /**
     * @param FolderInterface $folder
     */
    public function setRootFolder(FolderInterface $folder);
}
