<?php

namespace Prisha2\Mod8\Model;

use Magento\Framework\Model\AbstractModel;
use Prisha2\Mod8\Model\ResourceModel\Employee as ResourceModel;
use Magento\Framework\Exception\LocalizedException;

class Employee extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    protected function _beforeSave()
    {
        parent::_beforeSave();
        if(strlen($this->getFirstName()) > 30) {
            throw new LocalizedException(__('First name is too long'));
        }
        if(strlen($this->getLastName()) > 30) {
            throw new LocalizedException(__('Last name is too long'));
        }
        if(strlen($this->getAddress()) < 30) {
            throw new LocalizedException(__('Address is too short'));
        }
        if(strlen($this->getPhoneNumber()) != 10 && !isDigit($this->getPhoneNumber())) {
            throw new LocalizedException(__('Phone number is not valid'));
        }
    }
}