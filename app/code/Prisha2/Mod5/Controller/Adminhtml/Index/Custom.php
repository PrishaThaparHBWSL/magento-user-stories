<?php

namespace Prisha2\Mod5\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Psr\Log\LoggerInterface;

class Custom extends Action
{
    const ADMIN_RESOURCE = 'Prisha2_Mod5::custom_access';

    protected $logger;
    public function __construct(Context $context, LoggerInterface $logger)
    {
        parent::__construct($context);
        $this->logger = $logger;
    }

    public function execute()
    {
        $accessParam = $this->getRequest()->getParam('access');
        $this->logger->info("Access param:" . $accessParam);
        if ($accessParam !== 'True') {
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('admin/dashboard/index');
            return $resultRedirect;
        }

        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        return $resultJson->setData(['message' => 'Hello Admin! You have access.']);
    }
}
