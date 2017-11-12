<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Dummy;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DummySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Dummy::class);
    }

    function it_should_be_able_to_add_age()
    {
        $this->addAge(1);
        $this->getAge()->shouldReturn(1);
    }
}
