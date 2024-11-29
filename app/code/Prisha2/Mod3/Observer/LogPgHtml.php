<?php
namespace Prisha2\Mod3\Observer;

use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\Event\Observer;

class LogPgHtml implements ObserverInterface
{
    protected $logger; 

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $html = $observer->getHtml();
        $this->logger->info('Page HTML: ' . $html);
    }
}
?>