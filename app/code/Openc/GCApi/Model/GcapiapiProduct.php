<?php
namespace Openc\GCApi\Model;
use Openc\GCApi\Api\GcapiapiProductInterface;
class GcapiapiProduct implements GcapiapiProductInterface
{
    /**
     * Returns products list
     *
     * @param string[] $showEnabled
     * @param string[] $filters
     * @param string $store
     * @return \Openc\GCApi\Api\GcapiapiResponseProductInterface[]
     */
    public function list($showEnabled = NULL, $filters = NULL, $store = NULL)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
        $productCollection->addFieldToSelect('name');
        if(!is_null($showEnabled)){
            if($showEnabled === true){
                $productCollection->addFieldToFilter('status', 1);
            }
            else if($showEnabled === false){
                $productCollection->addFieldToFilter('status', 2);
            }
        }
        $productCollection->load();
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $result = array();
        foreach ($productCollection as $prod) {
            $product = $objectManager->create('Magento\Catalog\Model\Product')->load($prod->getId());
            $productImage = '';
            if($product->getImage() != 'no_selection'){
                $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
                $baseUrl = $storeManager->getStore()->getBaseUrl();
                $productImage = $baseUrl.'catalog/product'.$product->getImage();
            }
            $itemData = new GcapiapiResponseProduct();
            $itemData->setProductId($product->getId());
            $itemData->setSku($this->_formatSku($product->getSku()));
            $itemData->setName($product->getName());
            $itemData->setSet($product->getAttributeSetId());
            $itemData->setEnable($product->getStatus());
            $itemData->setImage($productImage);
            //$logger->info(print_r($itemData, true));
            $result[] = $itemData;
        }
        return $result;
    }

    /**
     * Returns greeting message to user
     *
     * @param string $productId
     * @param string[] $store
     * @param string[] $attributes
     * @param string[] $identifierType
     * @return \Openc\GCApi\Api\GcapiapiResponseProductInterface
     */
    public function info($productId, $store = null, $attributes = null, $identifierType = null)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productCollection = $objectManager->create('Magento\Catalog\Model\Product')->getCollection();
        $productCollection->addFieldToFilter('sku', GcapiapiStock::PRODUCT_SKU_PREFIX.$productId);
        if($productCollection->count()){
            $productArray = $productCollection->toArray();
            $product = current($productArray);
            if($product['entity_id']){
                $product = $objectManager->create('Magento\Catalog\Model\Product')->load($product['entity_id']);
                    $productImage = '';
                    if($product->getImage() != 'no_selection'){
                        $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
                        $baseUrl = $storeManager->getStore()->getBaseUrl();
                        $productImage = $baseUrl.'catalog/product'.$product->getImage();
                    }
                    $result = new GcapiapiResponseProduct();
                    $result->setProductId($product->getId());
                    $result->setName($product->getName());
                    $result->setSku($product->getSku());
                    $result->setSet($product->getAttributeSetId());
                    $result->setEnable($product->getStatus());
                    $result->setImage($productImage);
            }
        }
        return $result;
    }

    protected function _formatSku($origSku)
    {
        return preg_replace('/^'.GcapiapiStock::PRODUCT_SKU_PREFIX.'/','',$origSku);
    }
}