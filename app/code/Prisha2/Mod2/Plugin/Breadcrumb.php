<?php
namespace Prisha2\Mod2\Plugin;

use Magento\Theme\Block\Html\Breadcrumbs;
use Psr\Log\LoggerInterface;

class Breadcrumb
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function aroundAddCrumb(Breadcrumbs $subject, callable $proceed, $crumbName, $crumbInfo)
    {
        $this->logger->info('Crumb name: ' . $crumbName);
        if ($crumbName === 'category3') {
            $subject->addCrumb(
                'prisha',
                [
                    'label' => __('PRISHA THAPAR'),
                    'link'  => '/'
                ]
            );
            $subject->addCrumb(
                'hbwsl',
                [
                    'label' => __('HBWSL'),
                    'link'  => '/'
                ]
            );
        }

        return $proceed($crumbName, $crumbInfo);
    }
}
