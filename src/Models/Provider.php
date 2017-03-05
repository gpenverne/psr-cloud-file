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
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $refreshToken;

    /**
     * @var DateTime
     */
    protected $expiresAt;

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

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * {@inheritdoc}
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * {@inheritdoc}
     */
    public function setRefreshToken($token)
    {
        $this->refreshToken = $token;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setExpiresAt(\DateTime $datetime)
    {
        $this->expiresAt = $datetime;

        return $this;
    }
}
