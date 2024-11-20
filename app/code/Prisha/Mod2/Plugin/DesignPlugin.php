<?php
namespace Prisha\Mod2\Plugin;

class DesignPlugin
{
    public function afterGetCopyright(\Magento\Theme\Block\Html\Footer $subject, $result)
    {
        return '© 2024 Prisha\'s Custom Store. All Rights Reserved.';
    }

    public function afterGetWelcome(\Magento\Theme\Block\Html\Header $subject, $result)
    {
        return 'Welcome to Prisha Custom Store!';
    }
}