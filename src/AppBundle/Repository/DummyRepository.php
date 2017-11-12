<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Dummy;
use Doctrine\ORM\EntityRepository;

class DummyRepository extends EntityRepository
{
    public function remove(Dummy $dummy)
    {
        $this->_em->remove($dummy);
        $this->_em->flush();
    }

    public function save(Dummy $dummy)
    {
        $this->_em->persist($dummy);
        $this->_em->flush();
    }
}