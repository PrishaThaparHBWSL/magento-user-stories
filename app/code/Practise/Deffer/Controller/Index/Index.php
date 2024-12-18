<?php
namespace Practise\Deffer\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
<?php

namespace Practise\Deffer\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Practise\Deffer\Model\AsyncService;
use Practise\Deffer\Model\DeferredEntityRepository;

class Index extends Action
{
    private $asyncService;
    private $entityRepository;

    public function __construct(
        Context $context,
        AsyncService $asyncService,
        DeferredEntityRepository $entityRepository
    ) {
        parent::__construct($context);
        $this->asyncService = $asyncService;
        $this->entityRepository = $entityRepository;
    }

    public function execute()
    {
        // Asynchronous operation
        $asyncOperation = $this->asyncService->executeHeavyOperation();

        // Deferred operation
        $deferredEntity = $this->entityRepository->find('123');
        $result = $deferredEntity->get();

        echo "Asynchronous Result: " . $asyncOperation->get() . PHP_EOL;
        echo "Deferred Result: " . json_encode($result) . PHP_EOL;
    }
}
