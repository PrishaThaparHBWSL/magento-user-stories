<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Prisha2\Mod1\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Prisha2\Mod1\Test;

/**
 * Home page. Needs to be accessible by POST because of the store switching.
 */
class Index extends Action 
{
    protected $test;
    public function __construct(
        Context $context,
        Test $test
    ) {
        $this->test = $test;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->test->displayParams();
    }
}
