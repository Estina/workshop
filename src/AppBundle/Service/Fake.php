<?php

namespace AppBundle\Service;

use AppBundle\Entity\Fake as FakeEntity;
use AppBundle\Repository\FakeRepository;

class Fake
{
    /**
     * @var FakeRepository
     */
    private $repository;

    public function __construct(FakeRepository $em)
    {
        $this->repository = $em;
    }

    public function addFake($name)
    {
        $fake = new FakeEntity($name);
        $this->repository->save($fake);
    }

    public function findByName($name)
    {
        return $this->repository->findOneBy(['name' => $name]);
    }
}