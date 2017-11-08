<?php
namespace Openc\GCApi\Api;
interface GcapiapiResponseStockInterface
{
    /**
     * set product id
     *
     * @param string $productId
     * @return GcapiapiResponseInterface
     */
    public function setProductId($productId);

    /**
     * Returns product id
     *
     * @return string
     */
    public function getProductId();

    /**
     * set sku
     *
     * @param string $sku
     * @return GcapiapiResponseInterface
     */
    public function setSku($sku);

    /**
     * Returns sku
     *
     * @return string
     */
    public function getSku();

    /**
     * set qty
     *
     * @param string $qty
     * @return GcapiapiResponseInterface
     */
    public function setQty($qty);

    /**
     * Returns qty
     *
     * @return string
     */
    public function getQty();

    /**
     * set qty
     *
     * @param bool $isInStock
     * @return GcapiapiResponseInterface
     */
    public function setIsInStock($isInStock);

    /**
     * Returns is in stock
     *
     * @return string
     */
    public function getIsInStock();

    /**
     * set qty
     *
     * @param array[] $data
     * @return bool
     */
    public function setData($data);

    /**
     * Returns data
     *
     * @return string[]
     */
    //public function getData();

}