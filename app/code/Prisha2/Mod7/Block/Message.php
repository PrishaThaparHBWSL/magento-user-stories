<?php

namespace Prisha2\Mod7\Block;

use Magento\Framework\View\Element\Template;

class Message extends Template
{
    protected function _afterToHtml($html)
    {
        return $html . '<div>This is an additional message rendered via _afterToHtml()</div>';
    }
}
