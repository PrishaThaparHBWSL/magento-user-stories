<?php

namespace Practise\Defer\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class AsyncOperation implements ObserverInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->info("AsyncOperation: Start Time: " . microtime(true));

        // Simulating async logic (e.g., long-running API call)
        sleep(3); // Simulate a delay for async task

        $this->logger->info("AsyncOperation: End Time: " . microtime(true));
    }
}
