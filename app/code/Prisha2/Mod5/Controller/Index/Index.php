<?php
namespace Prisha2\Mod5\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Store\Model\App\Emulation;

class Index extends Action
{
    protected $productRepository;
    protected $resultRedirectFactory;
    protected $emulation;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository,
        RedirectFactory $resultRedirectFactory,
        Emulation $emulation
    ) {
        $this->productRepository = $productRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->emulation = $emulation;
        parent::__construct($context);
    }

    public function execute()
    {
        $productId = 16;
        $product = $this->productRepository->getById($productId);
        $this->emulation->startEnvironmentEmulation(3,'frontend');
        $newName=$product->getName() . " (Modified)";
        $product->setName($newName);
        $this->productRepository->save($product);
        $this->emulation->stopEnvironmentEmulation();
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setUrl($product->getProductUrl());
        return $resultRedirect;
    }
}