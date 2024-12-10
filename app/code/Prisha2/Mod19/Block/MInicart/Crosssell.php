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
        $items = $this->cart->getQuote()->getAllItems();
        $crossSellProducts = [];

        foreach ($items as $item) {
            $product = $item->getProduct();
            // Check if the product has cross-sell products
            $crossSells = $product->getCrossSellProducts();
            if ($crossSells) {
                foreach ($crossSells as $crossSellProduct) {
                    $crossSellProducts[] = $crossSellProduct;
                    $this->logger->info('Cross-sell product: ' . $crossSellProduct->getName());
                }
            }
        }

        return $crossSellProducts;
    }

    /**
     * Helper function to get the image URL for a product
     */
    // public function getImageUrl($product)
    // {
    //     return $this->_urlBuilder->getBaseUrl() . 'pub/media/catalog/product' . $product->getImage();
    // }
}
