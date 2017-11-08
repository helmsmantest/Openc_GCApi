<?php
namespace Openc\GCApi\Api;
interface GcapiapiStockInterface
{
    /**
     * Returns greeting message to user
     *
     * @param string[] $products
     * @return \Openc\GCApi\Api\GcapiapiResponseStockInterface[]
     */
    public function list($products = NULL);

    /**
     * Returns greeting message to user
     *
     * @param string $productId
     * @param string[] $data
     * @return bool
     */
    public function update($productId = NULL, $data);

}
