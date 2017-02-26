<?php

namespace spec\Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\FolderInterface;
use Gpenverne\PsrCloudFiles\Models\File;
use PhpSpec\ObjectBehavior;

class FileSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(File::class);
    }

    public function it_returns_a_size()
    {
        $this->getSize()->shouldReturn(null);
        $this->setSize(10)->shouldReturn($this);
        $this->getSize()->shouldReturn(10);

        $this->setSize('10')->shouldReturn($this);
        $this->getSize()->shouldReturn(10);
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
}
