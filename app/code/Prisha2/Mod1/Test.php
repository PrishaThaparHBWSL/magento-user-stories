<?php
namespace Prisha2\Mod1;

use Psr\Log\LoggerInterface;

class Test 
{
    protected $dataArray;
    protected $textString;
    protected $logger;
    public function __construct(
        array $dataArray,
        string $textString,
        LoggerInterface $logger
    )
    {
        $this->dataArray = $dataArray;
        $this->textString = $textString;
        $this->logger = $logger;
    }
    public function displayParams()
    {
        $jsonData = json_encode($this->dataArray);

        $this->logger->info('Serialized Data: ' . $jsonData, ['file' => 'custom.log']);
        print_r($this->dataArray);
        echo $this->textString;
        echo $jsonData;
    }
}
?>