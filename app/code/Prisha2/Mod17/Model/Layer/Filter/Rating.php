<?php

namespace Prisha2\Mod17\Model\Layer\Filter;

use Magento\Catalog\Model\Layer\Filter\AbstractFilter;
use Magento\Framework\Exception\LocalizedException;

class Rating extends AbstractFilter
{
    protected function _getItemsData()
    {
        $data = [];
        $ratings = [5, 4, 3, 2, 1]; // Ratings to filter by

        foreach ($ratings as $rating) {
            $data[] = [
                'label' => __("$rating Stars"),
                'value' => $rating,
                'count' => $this->getRatingCount($rating),
            ];
        }

        return $data;
    }

    private function getRatingCount($rating)
    {
        // Fetch product count based on rating using custom logic or database query
        // Simplified example:
        return rand(1, 100); // Replace with actual logic
    }

    protected function applyFilterToCollection($value)
    {
        if (!is_numeric($value)) {
            return $this;
        }

        $this->getLayer()
            ->getProductCollection()
            ->addAttributeToFilter('rating_summary', ['gteq' => $value * 20]);

        $this->getState()->addFilter($this->_createItem(__("$value Stars"), $value));

        return $this;
    }
}
