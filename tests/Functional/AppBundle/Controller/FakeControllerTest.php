<?php

namespace Tests\Functional\AppBundle\Controller;

use AppBundle\Repository\FakeRepository;
use AppBundle\Entity\Fake;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\HttpFoundation\Response;

class FakeControllerTest extends WebTestCase
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
     *
     * @link https://symfony.com/doc/current/components/browser_kit.html
     */
    public function shouldCreateAFake()
    {
        $this->client->request('POST', '/fake/create', ['name' => 'controller']);
        /** @var Response $response */
        $response = $this->client->getResponse();
        /** @var Fake $fake */
        $fake = $this->fakeRepository->findOneBy(['name' => 'controller']);

        $this->assertNotEmpty($response, 'Controller should return a response');
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode(), 'Controller should return a 200 response');

        $this->assertNotEmpty($fake, 'Fake should be created');
        $this->assertEquals('controller', $fake->getName(), 'Fake should be created with name controller');
    }
}