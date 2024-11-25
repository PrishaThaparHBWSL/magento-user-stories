<?php

namespace Prisha\Mod19\Plugin;

use Magento\Catalog\Model\ProductRepository;
use Magento\Checkout\Block\Cart\Sidebar as Minicart;

class MinicartCrossSellsPlugin
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function beforeSetItems(Minicart $subject, $items)
    {
        foreach ($items as &$item) {
            $product = $this->productRepository->getById($item->getProductId());
            $crossSellProducts = $product->getCrossSellProducts();

            // Limit to two cross-sell products
            $item->setCrossSellProducts(array_slice($crossSellProducts, 0, 2));
        }

        return [$items];
    }
}
