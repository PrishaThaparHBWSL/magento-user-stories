<?php
declare (strict_types=1);

namespace MageMastery\Popup\Service;

use MageMastery\Popup\Api\Data\PopupInterface;
use MageMastery\Popup\Api\PopupManagementInterface;
use MageMastery\Popup\Model\ResourceModel\Popup\Collection;
use MageMastery\Popup\Model\ResourceModel\Popup\CollectionFactory;

class PopupManagement implements PopupManagementInterface
{
      /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * Constructor.
     *
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }
    /**
     * @return \MageMastery\Popup\Api\Data\PopupInterface
     */
    public function getApplicablePopup():PopupInterface
    {
        /**
         * @var PopupInterface $popup */
        $popup=$this->getCollection()
        ->addFieldToFilter('is_active', PopupInterface::STATUS_ENABLED)
        ->addOrder('popup_id')
        ->getFirstItem();

        return $popup;

    }

    private function getCollection():Collection
    {
        return $this->collectionFactory->create();
    }

}