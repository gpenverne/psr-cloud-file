<?php

namespace spec\Gpenverne\PsrCloudFiles\Models;

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
}
