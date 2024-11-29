<?php
namespace Prisha2\Mod2\Plugin;

use Magento\Catalog\Api\Data\ProductInterface;

class Product{
    public function afterGetName(ProductInterface $subject, $result){
        $price=$subject->getPrice();
        if($price<50){
            $result.="!sale!";
        }
        return $result;
    }
}
?>