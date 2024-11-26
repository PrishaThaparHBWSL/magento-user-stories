<?php
namespace Prisha\Mod22\Model\ResourceModel\Popup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Prisha\Mod22\Model\Popup;
use Prisha\Mod22\Model\ResourceModel\Popup as PopupResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Popup::class, PopupResource::class);
    }
}