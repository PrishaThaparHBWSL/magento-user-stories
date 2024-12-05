<?php

namespace Prisha2\Mod15\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;
use Prisha2\Mod15\Model\OrderPlacementFactory;
//The factory respects the Magento DI lifecycle and ensures the model is created within the appropriate context, adhering to Magento's conventions.

class OrderPlacementObserver implements ObserverInterface
{
    protected $logger;
    protected $OrderPlacementFactory;

    public function __construct(
        LoggerInterface $logger , 
        OrderPlacementFactory $orderPlacementFactory
    ) {
        $this->logger = $logger;
        $this->orderPlacementFactory = $orderPlacementFactory;
    }
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $amount = $order->getGrandTotal();
        $customerGroupId = $order->getCustomerGroupId();
        $this->logger->info("Order Group ID: " . $customerGroupId);
        $this->logger->info("Order Amount: " . $amount);
            $orderPlace=$this->orderPlacementFactory->create();
        $orderPlace->setData([
            'customer_group_id' => $customerGroupId,
            'total_sales_amount' => $amount
        ]);
        $orderPlace->save();
    }
}

?>