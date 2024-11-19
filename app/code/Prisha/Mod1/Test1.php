<?php
namespace Prisha\Mod1;
// use Prisha\Mod1\Api\Data\CustomCategoryInterface;
class Test1
{
    protected $category;
    protected $dataArray;
    protected $textString;
    public function __construct(
        array $dataArray,
        string $textString
    ) {
        $this->dataArray = $dataArray;
        $this->textString = $textString;
    }
    public function displayParams()
    {
        echo "\nArray: ";
        print_r($this->dataArray);
        echo "String: " . $this->textString;
    }
}