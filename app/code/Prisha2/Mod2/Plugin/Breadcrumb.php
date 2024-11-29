<?php
namespace Prisha2\Mod2\Plugin;

use Magento\Theme\Block\Html\Breadcrumbs;

class Breadcrumb
{
    public function aroundAddCrumb(Breadcrumbs $subject, callable $proceed, $crumbName, $crumbInfo)
    {
        // If "home" is being added, prepend the custom breadcrumb
        if ($crumbName === 'home') {
            $subject->addCrumb(
                'hbwsl',
                [
                    'label' => __('HBWSL'),
                    'link'  => '/'
                ]
            );
        }

        // Proceed with the original method
        return $proceed($crumbName, $crumbInfo);
    }
}
