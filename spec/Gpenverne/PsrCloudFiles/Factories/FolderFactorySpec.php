<?php

namespace spec\Gpenverne\PsrCloudFiles\Factories;

use Gpenverne\PsrCloudFiles\Exception\NotEnoughParametersException;
use Gpenverne\PsrCloudFiles\Factories\FolderFactory;
use Gpenverne\PsrCloudFiles\Interfaces\ProviderInterface;
use Gpenverne\PsrCloudFiles\Models\Folder;
use PhpSpec\ObjectBehavior;

class FolderFactorySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(FolderFactory::class);
    }

    public function it_throws_a_non_enough_parameters_exception()
    {
        $this->shouldThrow(NotEnoughParametersException::class)->duringCreate([]);
    }

    public function it_creates_a_folder(ProviderInterface $provider)
    {
        $this->create([
                'id' => 'an id',
                'name' => 'a name',
                'parentFolder' => null,
                'size' => 10,
                'provider' => $provider,
            ])->shouldHaveType(Folder::class);
    }
}
