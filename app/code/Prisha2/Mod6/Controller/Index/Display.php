<?php

namespace Prisha2\Mod6\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\LayoutFactory;

class Display extends Action
{
    protected $layoutFactory;  
    public function __construct(Context $context, LayoutFactory $layoutFactory)
    {
        parent::__construct($context);
        $this->layoutFactory = $layoutFactory;
    }

    public function execute()
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock(\Prisha\Mod6\Block\CustomBlock::class);
        $this->getResponse()->setBody($block->toHtml());
    }
}
?>