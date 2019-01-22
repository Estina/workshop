<?php


namespace AppBundle;

interface DistributorTrackingInterface
{
    public function track(string $distributor, string $country, string $postCode);
}