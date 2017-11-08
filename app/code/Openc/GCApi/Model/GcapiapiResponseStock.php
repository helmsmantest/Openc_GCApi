<?php
namespace Openc\GCApi\Model;
use Openc\GCApi\Api\GcapiapiResponseStockInterface;

class GcapiapiResponseStock implements GcapiapiResponseStockInterface
{
    protected $productId;
    protected $_data = array();
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

    public function setQty($qty)
    {
        $this->_data['qty'] = $qty;
        return $this;
    }
    /**
     * Returns qty
     *
     * @return string
     */
    public function getQty()
    {
        return isset($this->_data['qty']) ? $this->_data['qty'] : false;
    }

    public function setIsInStock($isInStock)
    {
        $this->_data['is_in_stock'] = $isInStock;
        return $this;
    }
    /**
     * Returns is in stock
     *
     * @return bool
     */
    public function getIsInStock()
    {
        return isset($this->_data['is_in_stock']) ? 1 : 0;
    }
    public function setData($data)
    {
        $this->_data = $data;
        return $this;
    }
    /**
     * Returns data
     *
     * @return string[]
     */
    /*public function getData()
    {
        return $this->_data;
    }*/

}