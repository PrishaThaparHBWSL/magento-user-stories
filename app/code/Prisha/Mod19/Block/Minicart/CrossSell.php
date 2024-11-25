<?php
namespace Prisha\Mod19\Block\Minicart;

use Magento\Framework\View\Element\Template;
use Magento\Checkout\Model\Cart;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Registry;

class CrossSell extends Template
{
    protected $cart;
    protected $productFactory;
    protected $registry;

    public function __construct(
        Template\Context $context,
        Cart $cart,
        ProductFactory $productFactory,
        Registry $registry,
        array $data = []
    ) {
        $this->cart = $cart;
        $this->productFactory = $productFactory;
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    public function getCrossSellProducts()
    {
        $items = $this->cart->getQuote()->getAllItems();
        $crossSellProducts = [];

        // Loop through the cart items and get the first two cross-sell products
        foreach ($items as $item) {
            if (count($crossSellProducts) >= 2) {
                break;
            }

            $product = $item->getProduct();
            $crossSells = $product->getCrossSellProducts();

            // Get first two cross-sell products
            foreach ($crossSells as $crossSell) {
                if (count($crossSellProducts) < 2) {
                    $crossSellProducts[] = $crossSell;
                }
            }
        }

        return $crossSellProducts;
    }
}
