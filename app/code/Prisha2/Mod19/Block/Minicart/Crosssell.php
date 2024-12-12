<?php
namespace Prisha2\Mod19\Block\Minicart;

use Magento\Catalog\Api\ProductLinkRepositoryInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Block\Cart\Sidebar;
use Magento\Framework\View\Element\Template;
use Magento\Quote\Model\Quote\Item;
use Psr\Log\LoggerInterface;

class Crosssell extends Template
{
    protected $productRepository;
    protected $productLinkRepository;
    protected $cart;
    protected $logger;

    public function __construct(
        Template\Context $context,
        ProductRepositoryInterface $productRepository,
        ProductLinkRepositoryInterface $productLinkRepository,
        Sidebar $cart,
        LoggerInterface $logger,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        $this->productLinkRepository = $productLinkRepository;
        $this->cart = $cart;
        $this->logger = $logger;
        parent::__construct($context, $data);
    }

    public function getCrossSellProducts()
    {
        $this->logger->info('Fetching cross-sell products...');
    
        $items = $this->cart->getQuote()->getAllItems();
        if (empty($items)) {
            $this->logger->info('No items in cart.');
            return [];
        }
    
        $crossSellProducts = [];
        foreach ($items as $item) {
            try {
                $this->logger->info('Processing cart item: ' . $item->getName());
    
                $productId = $item->getProduct()->getId();
                $this->logger->info('Fetching product with ID: ' . $productId);
    
                $linkedProducts = $this->productLinkRepository->getList($productId, 'cross_sell');
                foreach ($linkedProducts as $link) {
                    $linkedProductId = $link->getLinkedProductSku();
                    $linkedProduct = $this->productRepository->get($linkedProductId);
                    $crossSellProducts[$productId][] = $linkedProduct;
                    $this->logger->info('Cross-sell product: ' . $linkedProduct->getName());
                }
            } catch (\Exception $e) {
                $this->logger->error('Error processing cart item: ' . $item->getName(), [
                    'exception' => $e->getMessage()
                ]);
            }
        }
    
        $this->logger->info('Finished fetching cross-sell products.');
    
        return $crossSellProducts;
    }

    public function getImageUrl($product)
    {
        return $this->_urlBuilder->getBaseUrl() . 'pub/media/catalog/product' . $product->getImage();
    }
}
