<?php

namespace Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\CloudItemInterface;
use Gpenverne\PsrCloudFiles\Interfaces\FileInterface;

class File extends CloudItem implements FileInterface
{
    /**
     * @var int
     */
    protected $size;

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * {@inheritdoc}
     */
    public function setSize($size)
    {
        $this->size = (int) $size;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return CloudItemInterface::TYPE_FILE;
    }

    /**
     * {@inheritdoc}
     */
    public function getLink()
    {
        return $this->provider->getLink($this);
    }
}
