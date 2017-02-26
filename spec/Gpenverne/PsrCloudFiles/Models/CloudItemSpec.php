<?php

namespace spec\Gpenverne\PsrCloudFiles\Models;

use Gpenverne\PsrCloudFiles\Interfaces\FolderInterface;
use Gpenverne\PsrCloudFiles\Interfaces\ProviderInterface;
use Gpenverne\PsrCloudFiles\Models\CloudItem;
use PhpSpec\ObjectBehavior;

class CloudItemSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(CloudItem::class);
    }

    public function it_returns_a_name()
    {
        $this->getName()->shouldReturn(null);
        $this->setName('a name')->shouldReturn($this);
        $this->getName()->shouldReturn('a name');
    }

    public function it_returns_an_id()
    {
        $this->getId()->shouldReturn(null);
        $this->setId('an-id')->shouldReturn($this);
        $this->getId()->shouldReturn('an-id');
    }

    public function it_returns_a_parent_folder(FolderInterface $folder)
    {
        $this->getParentFolder()->shouldReturn(null);
        $this->setParentFolder($folder)->shouldReturn($this);
        $this->getParentFolder()->shouldReturn($folder);
    }

    public function it_returns_a_provider(ProviderInterface $provider)
    {
        $this->getProvider()->shouldReturn(null);
        $this->setProvider($provider)->shouldReturn($this);
        $this->getProvider()->shouldReturn($provider);
    }
}
