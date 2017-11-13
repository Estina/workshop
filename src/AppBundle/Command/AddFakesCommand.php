<?php
namespace AppBundle\Command;

use AppBundle\Service\Fake;
use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddFakesCommand extends ContainerAwareCommand
{
    /** @var Fake */
    private $fake;

    public function configure()
    {
        $this->setName('fakes:add')
            ->setDescription('Add fakes')
            ->addArgument('quantity', InputArgument::OPTIONAL, 'Quantity of fakes added', 1)
            ->setHelp(':)');
    }

    public function initialize(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $this->fake = $container->get(Fake::class);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $quantity = $input->getArgument('quantity');
        $faker = Factory::create();

        while ($quantity > 0) {
            $this->fake->addFake($faker->name);
            $quantity--;
        }
    }
}