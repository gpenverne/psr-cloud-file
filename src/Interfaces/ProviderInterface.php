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

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getToken();

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setToken($token);

    /**
     * @return string
     */
    public function getRefreshToken();

    /**
     * @param string $token
     *
     * @return $this
     */
    public function setRefreshToken($token);

    /**
     * @return DateTime|null
     */
    public function getExpiresAt();

    /**
     * @param DateTime $datetime
     *
     * @return $this
     */
    public function setExpiresAt(DateTime $datetime);
}
