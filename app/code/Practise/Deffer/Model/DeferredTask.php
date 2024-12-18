<?php
namespace Practise\Deffer\Model;

use Magento\Framework\Async\DeferredInterface;
use Psr\Log\LoggerInterface;

class DeferredTask implements DeferredInterface
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
            $this->logger->debug("Starting deferred task...");
            sleep(3); // Simulate task
            $this->result = "Deferred task completed!";
            $this->done = true;
        }

        return $this->result;
    }

    public function isDone(): bool
    {
        return $this->done;
    }
}
