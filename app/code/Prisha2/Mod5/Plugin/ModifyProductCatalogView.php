<?php

namespace Prisha2\Mod5\Plugin;

use Magento\Catalog\Block\Product\View;

class ModifyProductCatalogView 
{
    public function afterToHtml(View $subject, $result){
        return $result . "<p>mod5 plugin text Prisha</p>";
    }
}

?>