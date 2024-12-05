<?php

namespace Prisha2\Mod14\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;

class Notify implements ObserverInterface
{
    protected $logger;

    public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $qty = $product->getExtensionAttributes()->getStockItem()->getQty();
        if($qty < 10){
            $this->logger->info("Product: " . $product->getName() . " is low on stock. Quantity: " . $qty);
        }
    }
}

?>