<?php


namespace AppBundle\Service;

interface DistributorTrackingInterface
{
    public function track($distributor, $country, $postCode);
}