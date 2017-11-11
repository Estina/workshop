<?php

namespace Tests\Unit\AppBundle\Service;

use AppBundle\Repository\FakeRepository;
use AppBundle\Service\Fake;
use AppBundle\Entity\Fake as FakeEntity;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as Mock;

class FakeTest extends TestCase
{
    /** @var FakeRepository|Mock */
    private $repository;
    /** @var Fake */
    private $fake;
    
    public function setUp()
    {
        $this->repository = $this->createMock(FakeRepository::class);
        $this->fake = new Fake($this->repository);
    }

    /**
     * @test
     */
    public function shouldSaveWhenCreatingANewFake()
    {
        $this->repository
            ->expects($this->once())
            ->method('save')
            ->with($this->isInstanceOf(FakeEntity::class));
        
        $this->fake->addFake('hello');
    }

}