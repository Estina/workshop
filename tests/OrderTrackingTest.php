<?php


namespace Tests;


use AppBundle\DistributorTrackingInterface;
use AppBundle\Order;
use AppBundle\OrderParser;
use AppBundle\OrderRepositoryInterface;
use AppBundle\OrderTracking;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as Mock;

/**
 * Class OrderTrackingTest
 */
class OrderTrackingTest extends TestCase
{

    /** @var OrderParser|Mock */
    private $orderParser;
    /** @var OrderRepositoryInterface|Mock */
    private $orderRepository;
    /** @var DistributorTrackingInterface|Mock */
    private $distributorTracking;
    /** @var OrderTracking */
    private $orderTracking;


    public function setUp()
    {
        $this->orderParser = $this->createMock(OrderParser::class);
        $this->orderRepository = $this->createMock(OrderRepositoryInterface::class);
        $this->distributorTracking = $this->createMock(DistributorTrackingInterface::class);
        $this->orderTracking = new OrderTracking($this->orderParser, $this->orderRepository, $this->distributorTracking);
    }

    /**
     * @test
     */
    public function shouldGetTrackingCode()
    {
        $order = new Order();
        $trackingCode = $this->orderTracking->getTrackingCode($order);

        $this->assertNotEmpty($trackingCode);
    }

}