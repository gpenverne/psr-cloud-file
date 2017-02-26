<?php

namespace spec\Gpenverne\PsrCloudFiles\Factories;

use Gpenverne\PsrCloudFiles\Factories\FolderFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FolderFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FolderFactory::class);
    }
}
