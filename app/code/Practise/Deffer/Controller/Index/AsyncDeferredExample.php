<?php
namespace Practise\Deffer\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Psr\Log\LoggerInterface;

class Asyncdeferredexample extends Action
{
    protected $resultPageFactory;
    protected $logger;

    public function __construct(
        Context $context, 
        PageFactory $resultPageFactory, 
        LoggerInterface $logger
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->logger = $logger;
        parent::__construct($context); // Make sure to pass the context to the parent class constructor
    }    

    public function execute()
    {
        // Your logic for async/deferred operations
        // Example log output for testing:
        $this->logger->debug('AsyncDeferredExample controller action executed.');

        // Return the result page
        return $this->resultPageFactory->create();
    }
}
