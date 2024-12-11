<?php

namespace Prisha2\Mod19\Block\Minicart;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Block\Cart\Sidebar;
use Magento\Framework\View\Element\Template;
use Magento\Quote\Model\Quote\Item;
use Psr\Log\LoggerInterface;

class Crosssell extends Template
{
    protected $productRepository;
    protected $cart;
    protected $logger;

    public function __construct(
        Template\Context $context,
        ProductRepositoryInterface $productRepository,
        Sidebar $cart,
        Logger $logger,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        $this->cart = $cart;
        $this->logger = $logger;
        parent::__construct($context, $data);
    }

    /**
     * Fetch cross-sell products for each item in the cart.
     */
    public function getCrossSellProducts()
    {
        $this->logger->info('Fetching cross-sell products...');
    
        $items = $this->cart->getQuote()->getAllItems();
        if (empty($items)) {
            $this->logger->info('No items in cart.');
            return [];
        }
    
        $crossSellProducts = [];
        foreach ($items as $item) {
            try {
                $this->logger->info('Processing cart item: ' . $item->getName());
    
                $productId = $item->getProduct()->getId();
                $this->logger->info('Fetching product with ID: ' . $productId);
    
                $product = $this->productRepository->getById($productId);
                $this->logger->info('Product loaded: ' . $product->getName());
    
                $crossSells = $product->getCrossSellProducts();
                if ($crossSells) {
                    foreach ($crossSells as $crossSellProduct) {
                        $crossSellProducts[] = $crossSellProduct;
                        $this->logger->info('Cross-sell product: ' . $crossSellProduct->getName());
                    }
                } else {
                    $this->logger->info('No cross-sell products found for product: ' . $product->getName());
                }
            } catch (\Exception $e) {
                $this->logger->error('Error processing cart item: ' . $item->getName(), [
                    'exception' => $e->getMessage()
                ]);
            }
        }
    
        $this->logger->info('Finished fetching cross-sell products.');
    
        return $crossSellProducts;
    }
    

    /**
     * Helper function to get the image URL for a product
     */
    public function getImageUrl($product)
    {
        return $this->_urlBuilder->getBaseUrl() . 'pub/media/catalog/product' . $product->getImage();
    }
}
