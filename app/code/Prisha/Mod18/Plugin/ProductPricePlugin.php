<?php

namespace Prisha\Mod18\Plugin;

use Magento\Catalog\Model\Product;

class ProductPricePlugin
{
    const PRICE_ADJUSTMENT = 1.79;

    /**
     * After getting the product price, we adjust it by adding $1.79
     *
     * @param Product $subject
     * @param float $result
     * @return float
     */
    public function afterGetPrice(Product $subject, $result)
    {
        return $result + self::PRICE_ADJUSTMENT;
    }

    /**
     * After getting the final price, we adjust it by adding $1.79
     *
     * @param Product $subject
     * @param float $result
     * @return float
     */
    public function afterGetFinalPrice(Product $subject, $result)
    {
        return $result + self::PRICE_ADJUSTMENT;
    }
}
