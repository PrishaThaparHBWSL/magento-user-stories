<?php

namespace Prisha\Mod8\Model\ResourceModel\Employee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Prisha\Mod8\Model\Employee as EmployeeModel;
use Prisha\Mod8\Model\ResourceModel\Employee as EmployeeResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(EmployeeModel::class, EmployeeResource::class);
    }
}