<?php

namespace Tests\Functional\AppBundle\Repository;

use AppBundle\Entity\Fake;
use AppBundle\Repository\FakeRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;

class FakeRepositoryTest extends WebTestCase
{
    /** @var Client */
    private $client;
    /** @var FakeRepository */
    private $fakeRepository;

    public function setUp()
    {
        $this->client = static::createClient(['env' => 'test']);
        $this->fakeRepository = $this->client->getContainer()->get(FakeRepository::class);
    }

    /**
     * @test
     */
    public function shouldPersist()
    {
        $this->deleteAllTestData();
        $fake = new Fake('test');

        $this->fakeRepository->save($fake);
        $persisted = $this->fakeRepository->findOneBy(['name' => 'test']);

        $this->assertEquals('test', $persisted->getName());
    }

    private function deleteAllTestData()
    {
        $fakes = $this->fakeRepository->findBy(['name' => 'test']);
        /** @var Fake $fake */
        foreach ($fakes as $fake) {
            $this->fakeRepository->remove($fake);
        }
    }
}