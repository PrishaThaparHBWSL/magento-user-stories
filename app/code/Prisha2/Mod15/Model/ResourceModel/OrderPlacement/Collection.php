<?php
namespace Prisha2\Mod15\Model\ResourceModel\Car;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Prisha2\Mod15\Model\OrderPlacement as Model;
use Prisha2\Mod15\Model\ResourceModel\OrderPlacement as ResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
