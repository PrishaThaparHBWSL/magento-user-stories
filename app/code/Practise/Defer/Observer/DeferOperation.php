<?php

namespace Practise\Defer\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class DeferOperation implements ObserverInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->info("DeferOperation: Start Time: " . microtime(true));

        // Simulating deferred logic (e.g., heavy database operation)
        sleep(5); // Simulate a delay for deferred task

        $this->logger->info("DeferOperation: End Time: " . microtime(true));
    }
}
