<?php

namespace AppBundle\Service;
use AppBundle\Entity\Dummy as DummyEntity;
use AppBundle\Repository\DummyRepository;

class Dummy
{
    /** @var DummyRepository */
    private $repository;

    /**
     * Dummy constructor.
     *
     * @param DummyRepository $repository
     */
    public function __construct(DummyRepository $repository)
    {
        $this->repository = $repository;
    }


    public function addDummy(DummyEntity $dummy)
    {
        $this->repository->save($dummy);
    }
}
