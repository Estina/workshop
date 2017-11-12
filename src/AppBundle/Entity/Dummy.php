<?php

namespace AppBundle\Entity;

class Dummy
{
    
    public function addAge(int $age)
    {
        $this->age = $age;
    }
    
    public function getAge()
    {
        return $this->age;
    }
}
