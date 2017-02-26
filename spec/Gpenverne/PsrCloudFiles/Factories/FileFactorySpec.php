<?php

namespace spec\Gpenverne\PsrCloudFiles\Factories;

use Gpenverne\PsrCloudFiles\Factories\FileFactory;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FileFactory::class);
    }
}
