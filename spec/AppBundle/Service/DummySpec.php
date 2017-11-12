<?php

namespace spec\AppBundle\Service;

use AppBundle\Repository\DummyRepository;
use AppBundle\Service\Dummy;
use PhpSpec\ObjectBehavior;
use AppBundle\Entity\Dummy as DummyEntity;

class DummySpec extends ObjectBehavior
{
    function let(DummyRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    function it_is_initializable(DummyRepository $repository)
    {
        $this->beConstructedWith($repository);
        $this->shouldHaveType(Dummy::class);
    }

    function it_should_add_new_dummy(DummyRepository $repository, DummyEntity $dummy)
    {
        $repository->save($dummy)->shouldBeCalledTimes(1);

        $this->addDummy($dummy);
    }
}
