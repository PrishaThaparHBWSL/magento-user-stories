<?php

namespace Prisha2\Mod6\Plugin;

use Magento\Catalog\Block\Product\View\Description;
use Psr\Log\LoggerInterface;

class CustomDescriptionPlugin
{
    protected $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function afterToHtml(Description $subject, $result){
        $this->logger->info('Sample description(Prisha2_Mod6)');
        return '<p>Sample description(Prisha2_Mod6)</p>';
    }
}

?>