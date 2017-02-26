<?php

namespace spec\Gpenverne\PsrCloudFiles\Exception;

use Gpenverne\PsrCloudFiles\Exception\NotEnoughParametersException;
use PhpSpec\ObjectBehavior;

class NotEnoughParametersExceptionSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(NotEnoughParametersException::class);
    }

    public function it_is_an_exception()
    {
        $this->shouldHaveType(\Exception::class);
    }
}
