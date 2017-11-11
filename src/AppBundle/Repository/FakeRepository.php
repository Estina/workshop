<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Fake;
use Doctrine\ORM\EntityRepository;

class FakeRepository extends EntityRepository
{
    public function remove(Fake $fake)
    {
        $this->_em->remove($fake);
        $this->_em->flush();
    }

    public function save(Fake $fake)
    {
        $this->_em->persist($fake);
        $this->_em->flush();
    }
}