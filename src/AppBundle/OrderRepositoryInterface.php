<?php

namespace AppBundle;


use AppBundle\Order;

interface OrderRepositoryInterface
{
    public function save(Order $order);

}