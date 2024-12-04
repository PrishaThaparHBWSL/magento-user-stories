<?php
namespace Prisha2\Mod8\Model\ResourceModel\Employee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Prisha2\Mod8\Model\Employee as Model;
use Prisha2\Mod8\Model\ResourceModel\Employee as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}