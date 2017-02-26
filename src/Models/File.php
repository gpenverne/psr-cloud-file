<?php

namespace Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\FileInterface;

class File extends CloudItem implements FileInterface
{
    /**
     * @var int
     */
    protected $size;

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     *
     * @return $size
     */
    public function setSize($size)
    {
        $this->size = (int) $size;

        return $this;
    }
}
