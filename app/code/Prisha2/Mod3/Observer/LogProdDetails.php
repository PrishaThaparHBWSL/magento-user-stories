<?php
namespace Prisha2\Mod3\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
use Magento\InventorySalesApi\Api\GetProductSalableQtyInterface;


class LogProdDetails implements ObserverInterface
{
    protected $logger;
    protected $getProductSalableQty;
    public function __construct(LoggerInterface $logger, GetProductSalableQtyInterface $getProductSalableQty)
    {
        $this->logger = $logger;
        $this->getProductSalableQty = $getProductSalableQty;
    }
    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $sku=$product->getSku();
        $this->logger->info('Product SKU: ' . $sku);
        $this->logger->info("Product Price: " . $product->getPrice());
        $this->logger->info('Product Quantity per source: ' . $product->getExtensionAttributes()->getStockItem()->getQty());
        $this->logger->info('Salable Quantity: ' . $this->getProductSalableQty->execute($sku, 1));
        
    }
}
?>