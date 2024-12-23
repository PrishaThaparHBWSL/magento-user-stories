<?php

namespace Vendor\CatalogRuleExtension\Model\Rule\Condition;

use Magento\Rule\Model\Condition\AbstractCondition;

class CustomCondition extends AbstractCondition
{
    public function loadAttributeOptions()
    {
        $this->setAttributeOption([
            'custom_attribute' => __('Custom Attribute')
        ]);
        return $this;
    }

    public function getInputType()
    {
        return 'string'; // Input type (e.g., string, numeric)
    }

    public function getValueElementType()
    {
        return 'text'; // Element type (e.g., text, select)
    }

    public function validate(\Magento\Framework\Model\AbstractModel $model)
    {
        $attributeValue = $model->getData($this->getAttribute());
        return $this->validateAttribute($attributeValue);
    }
}
