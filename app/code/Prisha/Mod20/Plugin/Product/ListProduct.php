<?php

namespace Prisha\Mod20\Plugin\Product;

class ListProduct
{
    public function afterGetAddToCartUrl(
        \Magento\Catalog\Block\Product\ListProduct $subject,
        $result
    ) {
        $product = $subject->getProduct();
        if ($product!==null && $product->getQty() <= 1) {
            echo "This stock is less";
        }
        return $result;
    }
}