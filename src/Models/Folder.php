<?php

namespace Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\CloudItemInterface;
use Gpenverne\PsrCloudFiles\Interfaces\FileInterface;
use Gpenverne\PsrCloudFiles\Interfaces\FolderInterface;

class Folder extends CloudItem implements FolderInterface
{
    /**
     * @var FileInterface[]
     */
    protected $files = [];

    /**
     * @var FolderInterface[]
     */
    protected $folders = [];

    /**
     * {@inheritdoc}
     */
    public function isRoot()
    {
        return null === $this->getParentFolder();
    }

    /**
     * {@inheritdoc}
     */
    public function addItem(CloudItemInterface $item)
    {
        if ($item->isFolder()) {
            $this->addFolder($item);

            return $this;
        }

        $this->addFile($item);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * {@inheritdoc}
     */
    public function getFolders()
    {
        return $this->folders;
    }

    /**
     * {@inheritdoc}
     */
    public function getItems()
    {
        return array_merge($this->folders, $this->files);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return CloudItemInterface::TYPE_FOLDER;
    }

    /**
     * {@inheritdoc}
     */
    public function findByPath($path)
    {
        $paths = explode(\DIRECTORY_SEPARATOR, $path);
        $firstPath = array_shift($paths);

        if (empty($paths)) {
            $cloudItem = $this->search($firstPath);

            return $cloudItem;
        } else {
            $searchType = self::TYPE_FOLDER;
            $cloudItem = $this->search($firstPath, $searchType);

            if (null !== $cloudItem && $cloudItem->isFolder()) {
                return $cloudItem->findByPath(implode(\DIRECTORY_SEPARATOR, $paths));
            }
        }
    }

    /**
     * @param FileInterface $file
     *
     * @return $this
     */
    private function addFile(FileInterface $file)
    {
        $this->files[$file->getId()] = $file;

        return $this;
    }

    /**
     * @param FolderInterface $folder
     *
     * @return $this
     */
    private function addFolder(FolderInterface $folder)
    {
        $this->folders[$folder->getId()] = $folder;

        return $this;
    }

    /**
     * @param string $itemName
     *
     * @return CloudItemInterface|null
     */
    private function search($itemName, $type = null)
    {
        if (null === $type) {
            $searchArray = $this->getItems();
        } elseif (self::TYPE_FILE == $type) {
            $searchArray = $this->getFiles();
        } else {
            $searchArray = $this->getFolders();
        }

        foreach ($searchArray as $id => $cloudItem) {
            if ($itemName === $cloudItem->getName()) {
                return $cloudItem;
            }
        }

        return null;
    }
}
