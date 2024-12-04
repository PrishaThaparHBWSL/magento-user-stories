<?php

namespace Prisha2\Mod8\Model;

use Magento\Framework\Model\AbstractModel;
use Prisha2\Mod8\Model\ResourceModel\Employee as ResourceModel;

class Employee extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}