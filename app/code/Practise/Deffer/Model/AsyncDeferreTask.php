<?php
namespace Practise\Deffer\Model;

use Magento\Framework\Async\DeferredInterface;
use Magento\Framework\Async\ProxyDeferredFactory;
use Psr\Log\LoggerInterface;

class AsyncDeferredTask implements DeferredInterface
{
    private $logger;
    private $done = false;
    private $result;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function get()
    {
        if (!$this->done) {
            $this->logger->debug("Starting async task...");
            sleep(3); // Simulate long-running task
            $this->result = "Async task completed!";
            $this->done = true;
        }

        return $this->result;
    }

    public function isDone(): bool
    {
        return $this->done;
    }
}
