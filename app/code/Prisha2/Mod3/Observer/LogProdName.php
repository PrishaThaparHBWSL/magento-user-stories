<?php
namespace Prisha2\Mod3\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;
class LogProdName implements ObserverInterface
{
    protected $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function execute(Observer $observer)
    {
        $product = $observer->getProduct()->getName();
        $this->logger->info('Product Name: ' . $product);
    }
}
?>