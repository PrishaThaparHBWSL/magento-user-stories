<?php
namespace Practise\Deffer\Logger;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;
use Magento\Framework\Logger\Handler\AbstractHandler;

class Logger extends AbstractHandler
{
    const DEBUG_LOG = 'deffer.log';

    protected $loggerType = Logger::DEBUG;
    protected $fileName = '/var/log/deffer.log';

    public function __construct(Base $loggerHandler, $level = Logger::DEBUG)
    {
        parent::__construct($loggerHandler, $level);
    }
}
