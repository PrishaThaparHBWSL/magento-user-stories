<?php
namespace Prisha2\Mod19\Plugin\Checkout\CustomerData;

class Cart {
    public function afterGetSectionData(\Magento\Checkout\CustomerData\Cart $subject, array $result)
    {
        $result['extra_data'] = $result['subtotalAmount'] * 10 / 100;
        return $result;
    }
}