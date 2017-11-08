<?php
namespace Openc\GCApi\Model;
use Openc\GCApi\Api\GcapiapiResponseProductInterface;
class GcapiapiResponseProduct implements GcapiapiResponseProductInterface
{
    protected $_data = array();
    protected $_productId;


    /**
     * set product id
     *
     * @param string $productId
     * @return GcapiapiResponseProductInterface
     */
    public function setProductId($productId)
    {
        $this->_data['product_id'] = $productId;
        return $this;
    }
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
     * set sku
     *
     * @param string $sku
     * @return GcapiapiResponseProductInterface
     */
    public function setSku($sku)
    {
        $this->_data['sku'] = $sku;
        return $this;
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
     * set name
     *
     * @param string $name
     * @return GcapiapiResponseProductInterface
     */
    public function setName($name)
    {
        $this->_data['name'] = $name;
        return $this;
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
     * set set
     *
     * @param string $set
     * @return GcapiapiResponseProductInterface
     */
    public function setSet($set)
    {
        $this->_data['set'] = $set;
        return $this;
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
     * set enable
     *
     * @param string $enable
     * @return GcapiapiResponseProductInterface
     */
    public function setEnable($enable)
    {
        $this->_data['enable'] = $enable;
        return $this;
    }

    /**
     * Returns enable
     *
     * @return string
     */
    public function getEnable()
    {
        return isset($this->_data['enable']) ? $this->_data['enable'] : false;
    }

    /**
     * set image
     *
     * @param string $image
     * @return GcapiapiResponseProductInterface
     */
    public function setImage($image)
    {
        $this->_data['image'] = $image;
        return $this;
    }

    /**
     * Returns image
     *
     * @return string
     */
    public function getImage()
    {
        return isset($this->_data['image']) ? $this->_data['image'] : false;
    }

    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }

}