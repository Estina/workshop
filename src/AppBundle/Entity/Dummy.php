<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DummyRepository")
 * @ORM\Table(name="dummy")
 */
class Dummy
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", length=3)
     */
    private $age;
    
    public function addAge(int $age)
    {
        $this->age = $age;
    }
    
    public function getAge()
    {
        return $this->age;
    }
}
