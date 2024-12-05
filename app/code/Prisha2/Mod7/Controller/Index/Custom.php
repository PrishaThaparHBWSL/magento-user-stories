<?php
namespace Prisha2\Mod7\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Custom extends Action
{
    protected $resultPageFactory;

    public function __construct(
        Context $context, 
        PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Custom Page'));
        return $resultPage;
    }
}