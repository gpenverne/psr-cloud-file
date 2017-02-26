<?php

namespace Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\FolderInterface;
use Gpenverne\PsrCloudFiles\Interfaces\ProviderInterface;

class CloudItem
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var FolderInterface|null
     */
    protected $parentFolder;

    /**
     * @var ProviderInterface
     */
    protected $provider;

    /**
     * @var string
     */
    protected $id;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return FolderInterface
     */
    public function getParentFolder()
    {
        return $this->parentFolder;
    }

    /**
     * @param FolderInterface|null $parentFolder
     *
     * @return $this
     */
    public function setParentFolder($parentFolder)
    {
        $this->parentFolder = $parentFolder;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFile()
    {
        return self::ITEM_TYPE === self::TYPE_FILE;
    }

    /**
     * @return bool
     */
    public function isFolder()
    {
        return self::ITEM_TYPE === self::TYPE_FOLDER;
    }

    /**
     * @return ProviderInterface
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param ProviderInterface $provider
     *
     * @return $this
     */
    public function setProvider(ProviderInterface $provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        if ($this->isFolder() && $this->isRoot()) {
            return \DIRECTORY_SEPARATOR;
        }

        $currentFolder = $this->getParentFolder();
        $paths = [
            $this->getName(),
        ];

        while (!$currentFolder->isRoot()) {
            $paths[] = $currentFolder->getName();
            $currentFolder = $this->getParentFolder();
        }

        $array = array_reverse($paths);

        return implode(\DIRECTORY_SEPARATOR, $array);
    }
}
