<?php

namespace Practise\Deffer\Model;

use Magento\Framework\Async\DeferredInterface;

class DeferredOperation implements DeferredInterface
{
    private $isDone = false;
    private $result;

    public function __construct(callable $operation)
    {
        $this->operation = $operation;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }

    public function get()
    {
        if (!$this->isDone) {
            $this->result = call_user_func($this->operation);
            $this->isDone = true;
        }

        return $this->result;
    }
}
