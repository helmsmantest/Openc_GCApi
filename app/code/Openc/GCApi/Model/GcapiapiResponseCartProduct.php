<?php
class GcapiapiResponseCartProduct
{
    protected $_data = array();
    /**
     * Returns product id
     *
     * @return string
     */
    public function getProductId()
    {
        return isset($this->_data['product_id']) ? $this->_data['product_id'] : false;
    }

    /**
     * set product id
     *
     * @param string $productId
     * @return GcapiapiResponseCartProductInterface
     */
    public function setProductId($productId)
    {
        $this->_data['product_id'] = $productId;
    }

    /**
     * Returns sku
     *
     * @return string
     */
    public function getSku()
    {
        return isset($this->_data['sku']) ? $this->_data['sku'] : false;
    }

    /**
     * set sku
     *
     * @param string $sku
     * @return GcapiapiResponseCartProductInterface
     */
    public function setSku($sku)
    {
        $this->_data['sku'] = $sku;
    }

    /**
     * Returns name
     *
     * @return string
     */
    public function getName()
    {
        return isset($this->_data['name']) ? $this->_data['name'] : false;
    }

    /**
     * set name
     *
     * @param string $name
     * @return GcapiapiResponseCartProductInterface
     */
    public function setName($name)
    {
        $this->_data['name'] = $name;
    }

    /**
     * Returns set
     *
     * @return string
     */
    public function getSet()
    {
        return isset($this->_data['set']) ? $this->_data['set'] : false;
    }

    /**
     * set name
     *
     * @param string $set
     * @return GcapiapiResponseCartProductInterface
     */
    public function setSet($set)
    {
        $this->_data['set'] = $set;
    }
}