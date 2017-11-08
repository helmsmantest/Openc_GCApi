<?php
namespace Openc\GCApi\Api;

interface  GcapiapiResponseCartProductInterface
{

    /**
     * Returns product id
     *
     * @return string
     */
    public function getProductId();

    /**
     * set product id
     *
     * @param string $productId
     * @return GcapiapiResponseCartProductInterface
     */
    public function setProductId($productId);

    /**
     * Returns sku
     *
     * @return string
     */
    public function getSku();

    /**
     * set sku
     *
     * @param string $sku
     * @return GcapiapiResponseCartProductInterface
     */
    public function setSku($sku);

    /**
     * Returns name
     *
     * @return string
     */
    public function getName();

    /**
     * set name
     *
     * @param string $name
     * @return GcapiapiResponseCartProductInterface
     */
    public function setName($name);

    /**
     * Returns set
     *
     * @return string
     */
    public function getSet();

    /**
     * set name
     *
     * @param string $set
     * @return GcapiapiResponseCartProductInterface
     */
    public function setSet($set);
}
