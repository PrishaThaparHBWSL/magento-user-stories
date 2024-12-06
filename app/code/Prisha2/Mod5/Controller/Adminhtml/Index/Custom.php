<?php

namespace Prisha2\Mod5\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class Custom extends Action
{
    const ADMIN_RESOURCE = 'Prisha2_Mod5::custom_access';

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $accessParam = $this->getRequest()->getParam('access');
        if ($accessParam !== 'True') {
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('admin/dashboard/index');
            return $resultRedirect;
        }

        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        return $resultJson->setData(['message' => 'Hello Admin! You have access.']);
    }
}
