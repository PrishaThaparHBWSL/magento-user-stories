<?php

namespace Prisha\Mod18\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Checkout\Model\Cart;
use Magento\Quote\Model\Quote\Item;

class AdjustPriceObserver implements ObserverInterface
{
    const PRICE_ADJUSTMENT = 1.79;

    /**
     * Adjust price when a product is added to the cart or during checkout
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $cartItem = $observer->getEvent()->getData('quote_item'); // Cart item object
        if ($cartItem) {
            $originalPrice = $cartItem->getPrice();
            $adjustedPrice = $originalPrice + self::PRICE_ADJUSTMENT;
            $cartItem->setCustomPrice($adjustedPrice);  // Set custom price
            $cartItem->setOriginalCustomPrice($adjustedPrice); // Set original custom price
        }
    }
}
