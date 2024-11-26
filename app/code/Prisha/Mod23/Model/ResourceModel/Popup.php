<?php
namespace Prisha\Mod22\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Popup extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('prisha_mod22_popup', 'popup_id');
    }
}