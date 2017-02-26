<?php

namespace Gpenverne\PsrCloudFiles\Interfaces;

interface CloudItemInterface
{
    const TYPE_FOLDER = 'folder';
    const TYPE_FILE = 'file';
    const TYPE_UNKNOWN = 'unknown';

    /**
     * @return FolderInterface|null
     */
    public function getParentFolder();

    /**
     * @return int
     */
    public function getId();

    /**
     * @return ProviderInterface
     */
    public function getProvider();

    /**
     * @return ProviderInterface
     */
    public function setProvider(ProviderInterface $provider);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return bool
     */
    public function isFile();

    /**
     * @return bool
     */
    public function isFolder();

    /**
     * @return string
     */
    public function getPath();

    /**
     * @return string
     */
    public function getType();
}
