<?php
namespace Openc\GCApi\Model;
use Openc\GCApi\Api\GcapiapiStockInterface;

class GcapiapiStock implements GcapiapiStockInterface
{

    const PRODUCT_SKU_PREFIX = 'GCM0#';
    /**
     * Returns greeting message to user
     *
     * @param string[] $products
     * @return \Openc\GCApi\Api\GcapiapiResponseStockInterface[]
     */
    public function list($products  = NULL)
    {
        $result = array();
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        if($products && is_array($products)){
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
            $productCollection->addIdFilter($products);
            $stockItemRepository =  $objectManager->create('Magento\CatalogInventory\Model\Stock\StockItemRepository');
            foreach($productCollection as $product){
                $productId = $product->getId();
                $productSku = $product->getSku();
                $productSku = $this->_formatSku($productSku);
                $stockItem = $stockItemRepository->get($productId);
                //$logger->info(print_r($stockItem->getData(), true));
                $responceObj = new GcapiapiResponseStock();
                $responceObj->setProductId($product->getId());
                $responceObj->setSku($productSku);
                $responceObj->setQty($stockItem->getQty());
                $responceObj->setQty((bool)$stockItem->getIsInStock());
                //$itemData = array('product_id' => $product->getId(), 'sku' => $productSku, 'qty' => $stockItem->getQty(), 'is_in_stock' => $stockItem->getIsInStock());
                //$responceObj->setData($itemData);
                //$logger->info(print_r($responceObj, true));
                $result[] = $responceObj;
            }
        }
        return $result;
    }

    protected function _formatSku($origSku)
    {
        return preg_replace('/^'.self::PRODUCT_SKU_PREFIX.'/','',$origSku);
    }

    /**
     * Returns greeting message to user
     *
     * @param string $productId
     * @param string[] $data
     * @return bool
     */
    public function update($productId = NULL, $data)
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        //$logger->info(print_r($productId, true));
        //$logger->info(print_r($data, true));
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        if($productId && is_array($data)){
            $product = $objectManager->create('Magento\Catalog\Model\Product')->load($productId);
            if($product->getId() && !empty($data)){
                $stockItemRepository =  $objectManager->create('Magento\CatalogInventory\Model\Stock\StockItemRepository');
                $stockItem = $stockItemRepository->get($productId);
                if (isset($data['qty'])) {
                    $stockItem->setQty($data['qty']);
                }
                if (isset($data['is_in_stock'])) {
                    $stockItem->setIsInStock($data['is_in_stock']);
                }
                if (isset($data['manage_stock'])) {
                    $stockItem->setManageStock($data['manage_stock']);
                }
                if (isset($data['use_config_manage_stock'])) {
                    $stockItem->setUseConfigManageStock($data['use_config_manage_stock']);
                }
                if (isset($data['use_config_backorders'])) {
                    $stockItem->setUseConfigBackorders($data['use_config_backorders']);
                }
                if (isset($data['backorders'])) {
                    $stockItem->setBackorders($data['backorders']);
                }
                try {
                    //$logger->info(print_r($stockItem->getData(), true));
                    $stockItem->save();
                } catch (Exception $e) {
                    return false;
                }
                return true;
            }
        }
        return false;
    }
}