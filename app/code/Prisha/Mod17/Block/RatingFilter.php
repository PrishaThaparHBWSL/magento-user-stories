<?php
namespace Prisha\Mod17\Block;

use Magento\Catalog\Model\Layer\Resolver;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;

class RatingFilter extends \Magento\Framework\View\Element\Template
{
    protected $layerResolver;
    protected $storeManager;

    public function __construct(
        Context $context,
        Resolver $layerResolver,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->layerResolver = $layerResolver;
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function getRatings()
    {
        $layer = $this->layerResolver->get();

        /** @var \Magento\CatalogSearch\Model\ResourceModel\Fulltext\Collection $productCollection */
        $productCollection = $layer->getProductCollection();

        $ratingOptions = [];

        // Fetch ratings options here (example)
        $ratings = [1, 2, 3, 4, 5]; // Example ratings (you may fetch dynamically)

        foreach ($ratings as $rating) {
            $count = 0; // Count products with this rating (implement logic to count)
            // Example logic to count products with this rating
            foreach ($productCollection as $product) {
                // Replace this with your actual rating attribute and value
                if ($product->getRatingSummary() == $rating) {
                    $count++;
                }
            }

            // Prepare URL and label for each rating filter option
            $url = $this->getUrl('catalog/category/index', ['rating' => $rating]); // Replace with your URL structure
            $label = __('Rating %1 (%2)', $rating, $count); // Example label format

            // Build array of rating filter options
            $ratingOptions[] = [
                'url' => $url,
                'label' => $label,
                'count' => $count, // Optional: include count for display
            ];
        }

        return $ratingOptions;
    }

    public function getUrl($route = '', $params = [])
    {
        return $this->_storeManager->getStore()->getUrl($route, $params);
    }
}