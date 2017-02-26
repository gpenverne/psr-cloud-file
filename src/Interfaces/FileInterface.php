<?php

namespace Gpenverne\PsrCloudFiles\Interfaces;

interface FileInterface extends CloudItemInterface
{
    const ITEM_TYPE = CloudItemInterface::TYPE_FILE;
    const REQUIRED_PARAMETERS = [
        'id',
        'name',
        'parentFolder',
        'size',
        'provider',
    ];

    /**
     * @return int
     */
    public function getSize();

    /**
     * @param int $size
     *
     * @return $this
     */
    public function setSize($size);
}