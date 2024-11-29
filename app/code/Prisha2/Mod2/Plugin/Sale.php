<?php
namespace Prisha2\Mod2\Plugin;

use Magento\Catalog\Model\Product;
use Magento\Framework\UrlInterface;

class Sale
{
    private $urlBuilder;

    public function __construct(
        UrlInterface $urlBuilder
    ) {
        $this->urlBuilder = $urlBuilder;
    }
    public function afterGetName(Product $subject, $result)
    {
        $price = $subject->getPrice();

        if ($price < 20) {
            $saleImage = $this->urlBuilder->getBaseUrl(['_type' => UrlInterface::URL_TYPE_MEDIA]) . 'Prisha2/Mod2/logo.jpg';
            $saleHtml = sprintf('<img src="%s" alt="sale" style="width: 50px; height: 50px; margin-left: 10px;"/>', $saleImage);
            $result .= "  " . $saleHtml ;
        }
        return $result;
    }
}
