<?php

namespace spec\Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\FolderInterface;
use Gpenverne\PsrCloudFiles\Models\Provider;
use PhpSpec\ObjectBehavior;

class ProviderSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Provider::class);
    }

    public function it_returns_root_folder(FolderInterface $folder)
    {
        $this->getRootFolder()->shouldReturn(null);
        $this->setRootFolder($folder)->shouldReturn($this);
        $this->getRootFolder()->shouldReturn($folder);
    }

    public function it_returns_root_folder_when_asking_for_root_path(FolderInterface $folder)
    {
        $this->setRootFolder($folder);
        $this->findByPath('/')->shouldReturn($folder);
    }
}
