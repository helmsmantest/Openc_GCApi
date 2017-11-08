<?php
namespace Openc\GCApi\Api;

interface  GcapiapiResponseProductInterface
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
     * @return GcapiapiResponseProductInterface
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
     * @return GcapiapiResponseProductInterface
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
     * @return GcapiapiResponseProductInterface
     */
    public function setName($name);

    /**
     * Returns set
     *
     * @return string
     */
    public function getSet();

    /**
     * set set
     *
     * @param string $set
     * @return GcapiapiResponseProductInterface
     */
    public function setSet($set);

    /**
     * Returns enable
     *
     * @return string
     */
    public function getEnable();

    /**
     * set enable
     *
     * @param string $enable
     * @return GcapiapiResponseProductInterface
     */
    public function setEnable($enable);

    /**
     * Returns image
     *
     * @return string
     */
    public function getImage();

    /**
     * set image
     *
     * @param string $image
     * @return GcapiapiResponseProductInterface
     */
    public function setImage($image);
}