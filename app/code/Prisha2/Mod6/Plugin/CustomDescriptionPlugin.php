<?php

namespace Prisha2\Mod6\Plugin;

use Magento\Catalog\Block\Product\View\Description;

class CustomDescriptionPlugin
{
    public function afterToHtml(Description $subject, $result){
        return '<p>Sample description(Prisha2_Mod6)</p>';
    }
}

?>