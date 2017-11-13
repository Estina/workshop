<?php

namespace Tests\Functional\AppBundle\Repository;

use AppBundle\Entity\Dummy;
use AppBundle\Repository\DummyRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;

class DummyRepositoryTest extends WebTestCase
{
    /** @var Client */
    private $client;
    
    /** @var DummyRepository */
    private $repository;

    public function setUp()
    {
        $this->client = static::createClient(['env' => 'test']);
        $this->repository = $this->client->getContainer()->get(DummyRepository::class);
    }

    /**
     * @test
     */
    public function shouldPersist()
    {
        $this->deleteAllTestData();
        $dummy = new Dummy();
        $dummy->addAge(101);

        $this->repository->save($dummy);
        /** @var Dummy $persisted */
        $persisted = $this->repository->findOneBy(['age' => 101]);

        $this->assertEquals(101, $persisted->getAge());
    }

    private function deleteAllTestData()
    {
        $dummies = $this->repository->findBy(['age' => 101]);
        /** @var Dummy $dummy */
        foreach ($dummies as $dummy) {
            $this->repository->remove($dummy);
        }
    }
}