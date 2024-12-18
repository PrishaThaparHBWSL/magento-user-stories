<?php

namespace Practise\Deffer\Model;

use Magento\Framework\Async\CallbackDeferred;
use Magento\Framework\Async\ProxyDeferredFactory;

class DeferredEntityRepository
{
    private $identityMap = [];
    private $requestedEntityIds = [];
    private $proxyDeferredFactory;

    public function __construct(ProxyDeferredFactory $proxyDeferredFactory)
    {
        $this->proxyDeferredFactory = $proxyDeferredFactory;
    }

    public function find(string $id)
    {
        $this->requestedEntityIds[] = $id;

        return $this->proxyDeferredFactory->createFor(
            \stdClass::class,
            new CallbackDeferred(function () use ($id) {
                if (empty($this->identityMap[$id])) {
                    $this->loadEntities($this->requestedEntityIds);
                    $this->requestedEntityIds = [];
                }
                return $this->identityMap[$id];
            })
        );
    }

    private function loadEntities(array $ids)
    {
        foreach ($ids as $id) {
            $this->identityMap[$id] = (object)['id' => $id, 'name' => 'Entity ' . $id];
        }
    }
}
