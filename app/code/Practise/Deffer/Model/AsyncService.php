<?php

namespace Practise\Deffer\Model;

use Practise\Deffer\Model\DeferredOperation;

class AsyncService
{
    public function executeHeavyOperation(): DeferredOperation
    {
        return new DeferredOperation(function () {
            sleep(3); // Simulating heavy operation
            return "Heavy Operation Result";
        });
    }
}
