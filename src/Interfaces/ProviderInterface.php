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
     *
     * @return $this
     */
    public function setRootFolder(FolderInterface $folder);

    /**
     * @param string $path
     *
     * @return CloudItemInterface|null
     */
    public function findByPath($path);

    /**
     * @param FileInterface $file
     *
     * @return string|false
     */
    public function getLink(FileInterface $file);
}
