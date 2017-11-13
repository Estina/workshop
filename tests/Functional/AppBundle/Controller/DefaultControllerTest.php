<?php


namespace Tests\Functional\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;

class DefaultControllerTest extends WebTestCase
{

    /** @var Client */
    private $client;


    public function setUp()
    {
        $this->client = static::createClient(['env' => 'test']);
        $this->client->insulate();
        $this->client->followRedirects();
    }

    /**
     * @test
     * @link https://symfony.com/doc/current/components/browser_kit.html
     */
    public function shouldHaveSymfonyHomePage()
    {
        $crawler = $this->client->request('GET', '/');

        file_put_contents('build/response1.html', $this->client->getResponse()->getContent());

        $link = $crawler->selectLink('How to create your first page in Symfony')->link();

        $crawler = $this->client->click($link);

        file_put_contents('build/response2.html', $this->client->getResponse()->getContent());

        $crawler = $this->client->back();

        file_put_contents('build/response3.html', $this->client->getResponse()->getContent());

        $this->assertNotEmpty($link);
    }
}