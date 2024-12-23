<?php

namespace Vendor\CatalogRuleExtension\Plugin;

use Magento\CatalogRule\Model\Rule\Condition\Combine;

class AddCustomConditionPlugin
{
    public function afterGetNewChildSelectOptions(Combine $subject, array $result)
    {
        $result[] = [
            'value' => \Vendor\CatalogRuleExtension\Model\Rule\Condition\CustomCondition::class,
            'label' => __('Custom Condition')
        ];
        return $result;
    }
}
