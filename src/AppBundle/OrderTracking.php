<?php


namespace AppBundle;


class OrderTracking
{
    /** @var OrderParser */
    private $orderParser;
    /** @var OrderRepositoryInterface */
    private $orderRepository;
    /** @var  DistributorTrackingInterface */
    private $distributorTracking;

    /**
     * OrderTracking constructor.
     *
     * @param OrderParser                  $orderParser
     * @param OrderRepositoryInterface     $orderRepository
     * @param DistributorTrackingInterface $distributorTracking
     */
    public function __construct(
            OrderParser $orderParser,
            OrderRepositoryInterface $orderRepository,
            DistributorTrackingInterface $distributorTracking
    )
    {
        $this->orderParser = $orderParser;
        $this->orderRepository = $orderRepository;
        $this->distributorTracking = $distributorTracking;
    }

    public function getTrackingCode(Order $order)
    {
        return '232423231';
    }


}