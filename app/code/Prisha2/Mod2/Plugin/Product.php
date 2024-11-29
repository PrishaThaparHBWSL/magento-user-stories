<?php
namespace Prisha2\Mod2\Plugin;

use Magento\Catalog\Api\Data\ProductInterface;

class Product{
    public function afterGetName(ProductInterface $subject, $result){
        $price=$subject->getPrice();
        if($price<20){
            $result.="Whole Sale!!";
        }
        else if($price>=20 && $price<50){
            $result.="SuperSale!!";
            $discountedPrice=$price*0.85;
            $result.="(Discounted Price: ".$discountedPrice.")";
        }
        else if($price>=50){
            $result.="Premium!!";
        }
        return $result;
    }
}
?>