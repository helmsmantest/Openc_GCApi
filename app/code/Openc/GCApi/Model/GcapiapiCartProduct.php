<?php
class GcapiapiCartProduct implements GcapiapiCartProductInterface
{
    /**
     * Returns products info
     *
     * @param string[] $quoteId
     * @return \Openc\GCApi\Api\GcapiapiResponseProductInterface[]
     */
    public function items($quoteId = NULL)
    {
        $result = new GcapiapiResponseCartProduct();
        if($quoteId){
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $quoteModel = $objectManager->get('\Magento\Quote\Model\QuoteFactory')->create();
            $quote =  $quoteModel->load($quoteId);

        }
        return $result;
    }
}