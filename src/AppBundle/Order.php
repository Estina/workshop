<?php


namespace AppBundle;


class Order
{
    /** @var int */
    private $id;
    /** @var string */
    private $distributor;
    /** @var string */
    private $address;
    /** @var float */
    private $weight;


    public function getDistributor(): string
    {
        return 'ups';
    }

}