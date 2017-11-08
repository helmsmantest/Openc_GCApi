<?php
namespace Openc\GCApi\Api;
interface  GcapiapiProductInterface
{
    /**
     * Returns products info
     *
     * @param string[] $showEnabled
     * @param string[] $filters
     * @param string $store
     * @return \Openc\GCApi\Api\GcapiapiResponseProductInterface[]
     */
    public function list($showEnabled = false, $filters = array(), $store = NULL);

    /**
     * Returns product info
     *
     * @param string $productId
     * @param string[] $store
     * @param string[] $attributes
     * @param string[] $identifierType
     * @return \Openc\GCApi\Api\GcapiapiResponseProductInterface
     */
    public function info($productId, $store = null, $attributes = null, $identifierType = null);
}