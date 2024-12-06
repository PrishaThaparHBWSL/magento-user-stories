<?php

namespace Prisha2\Mod4\Observer;

use \Magento\Framework\App\ActionFactory;
use \Magento\Framework\App\ResponseInterface;
use \Magento\Framework\App\RequestInterface;

class Router implements RouterInterface
{
    protected $actionFactory;

    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }

    public function match(RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');
    }
}

?>