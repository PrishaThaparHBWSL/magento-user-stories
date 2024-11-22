<?php

namespace Vendor\Mod9\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $scopeConfig;
    protected $pageFactory;

    public function __construct(
        Context $context,
        ScopeConfigInterface $scopeConfig,
        PageFactory $pageFactory
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $isEnabled = $this->scopeConfig->getValue('mod9/general/enable', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $textToDisplay = $this->scopeConfig->getValue('mod9/general/text_to_display', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        if ($isEnabled) {
            echo htmlspecialchars($textToDisplay);
        } else {
            echo "The feature is disabled.";
        }
        exit();
    }
}