<?php

namespace Gpenverne\PsrCloudFiles\Interfaces;

interface FolderInterface extends CloudItemInterface
{
    const REQUIRED_PARAMETERS = [
        'id',
        'name',
        'parentFolder',
        'provider',
    ];

    /**
     * @return FileInterface[]
     */
    public function getFiles();

    /**
     * @return FolderInterface[]
     */
    public function getFolders();

    /**
     * @return CloudItemInterface[]
     */
    public function getItems();

    /**
     * @return bool
     */
    public function isRoot();

    /**
     * @param CloudItemInterface $item
     *
     * @return $this
     */
    public function addItem(CloudItemInterface $item);

    /**
     * @param string $path
     *
     * @return CloudItemInterface|null
     */
    public function findByPath($path);
}
