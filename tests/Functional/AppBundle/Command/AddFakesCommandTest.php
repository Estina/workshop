<?php

namespace Test\AppBundle\Command;

use AppBundle\Command\AddFakesCommand;
use AppBundle\Entity\Fake;
use AppBundle\Repository\FakeRepository;
use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class AddFakesCommandTest extends WebTestCase
{
    /** @var Connection */
    private $conn;
    /** @var CommandTester */
    private $commandTester;
    /** @var FakeRepository */
    private $fakeRepository;

    protected function setUp()
    {
        $client = static::createClient();
        $application = new Application(self::$kernel);
        $application->add(new AddFakesCommand());
        $command = $application->find('fakes:add');
        $this->commandTester = new CommandTester($command);
        $this->conn = $client->getContainer()->get('doctrine.dbal.default_connection');
        $this->fakeRepository = $client->getContainer()->get(FakeRepository::class);
    }

    /**
     * @test
     */
    public function shouldCreateAsManyFakesAsPassed()
    {
        $this->conn->query('TRUNCATE fake');
        $this->commandTester->execute(array(
            'command'  => 'fakes:add',
            'quantity' => 20,

        ));

        $fakes = $this->fakeRepository->findAll();

        $this->assertCount(20, $fakes);
        $this->assertInstanceOf(Fake::class, current($fakes));
    }
}