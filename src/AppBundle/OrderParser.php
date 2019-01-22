<?php


namespace AppBundle;


class OrderParser
{

    public function fromJson($json): Order
    {
        return new Order();
    }
}