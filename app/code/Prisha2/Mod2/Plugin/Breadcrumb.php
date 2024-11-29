<?php
namespace Prisha2\Mod2\Plugin;

use Magento\Theme\Block\Html\Breadcrumbs;

class Breadcrumb
{
    public function aroundAddCrumb(Breadcrumbs $subject, callable $proceed, $crumbName, $crumbInfo)
    {
        
        if ($crumbName === 'home') {
            $crumbInfo['label'] = 'Hummingbird   Home';
        }

        return $proceed($crumbName, $crumbInfo);
    }
}
?>