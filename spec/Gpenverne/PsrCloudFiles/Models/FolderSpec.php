<?php

namespace spec\Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\FileInterface;
use Gpenverne\PsrCloudFiles\Interfaces\FolderInterface;
use Gpenverne\PsrCloudFiles\Models\Folder;
use PhpSpec\ObjectBehavior;

class FolderSpec extends ObjectBehavior
{
    public function let(FolderInterface $folder)
    {
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Folder::class);
    }

    public function it_returns_a_parent_folder(FolderInterface $folder)
    {
        $this->getParentFolder()->shouldReturn(null);
        $this->setParentFolder($folder)->shouldReturn($this);
        $this->getParentFolder()->shouldReturn($folder);
    }

    public function it_checks_if_it_is_the_root_folder(FolderInterface $folder)
    {
        $this->isRoot()->shouldReturn(true);
        $this->setParentFolder($folder)->shouldReturn($this);
        $this->isRoot()->shouldReturn(false);
    }

    public function it_adds_file_item(FileInterface $file)
    {
        $file->getId()->willReturn('file-id');
        $file->isFolder()->willReturn(false);

        $this->addItem($file)->shouldReturn($this);
        $this->getItems()->shouldReturn([
            'file-id' => $file,
        ]);

        $this->getFiles()->shouldReturn([
            'file-id' => $file,
        ]);
        $this->getFolders()->shouldReturn([]);
    }

    public function it_adds_folder_item(FolderInterface $folder)
    {
        $folder->getId()->willReturn('folder-id');
        $folder->isFolder()->willReturn(true);

        $this->addItem($folder)->shouldReturn($this);
        $this->getItems()->shouldReturn([
            'folder-id' => $folder,
        ]);

        $this->getFolders()->shouldReturn([
            'folder-id' => $folder,
        ]);
        $this->getFiles()->shouldReturn([]);
    }

    public function it_returns_a_path(FolderInterface $folder, FolderInterface $rootFolder)
    {
        $folder->getName()->willReturn('parentFolder');
        $folder->isRoot()->willReturn(false);
        $folder->getParentFolder()->willReturn($rootFolder);
        $rootFolder->getName()->willReturn('');
        $rootFolder->isRoot()->willReturn(true);

        $this->setParentFolder($folder)->shouldReturn($this);
        $this->setName('filename');
        $this->getPath()->shouldReturn('/parentFolder/filename');
    }

    public function it_searchs_instead_items(FileInterface $file, FolderInterface $folder)
    {
        $file->getName()->willReturn('somefile');
        $file->isFolder()->willReturn(false);
        $file->getId()->willReturn('an-id');
        $this->addItem($file);

        $this->findByPath('somefile')->shouldReturn($file);

        $folder->getName()->willReturn('somepath');
        $folder->isFolder()->willReturn(true);
        $folder->getId()->willReturn('folder-id');
        $folder->getItems()->willReturn([
            'an-id' => $file,
        ]);
        $this->addItem($folder);
        $folder->findByPath('somefile')->willReturn($file);

        $this->findByPath('somepath/somefile')->shouldReturn($file);
    }
}
