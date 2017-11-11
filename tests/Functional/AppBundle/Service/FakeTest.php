<?php

namespace Tests\Functional\AppBundle\Service;

use AppBundle\Service\Fake;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;

class FakeTest extends WebTestCase
{
    /** @var Client */
    private $client;
    /** @var Fake */
    private $fake;

    public function setUp()
    {
        $this->client = static::createClient(['env' => 'test']);
        $this->fake = $this->client->getContainer()->get(Fake::class);
    }

    /**
     * @test
     */
    public function fakeCanCreateFakeItems()
    {
        $this->fake->addFake('hello');
        $addedFake = $this->fake->findByName('hello');

        $this->assertNotEmpty($addedFake);
    }

}