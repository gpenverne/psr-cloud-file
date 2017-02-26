<?php

namespace spec\Gpenverne\PsrCloudFiles\Exception;

use Gpenverne\PsrCloudFiles\Exception\NotEnoughParametersException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotEnoughParametersExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(NotEnoughParametersException::class);
    }
}
