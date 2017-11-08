<?php
interface GcapiapiCartProductInterface
{

    /**
     * Returns products info
     *
     * @param string[] $quoteId
     * @return \Openc\GCApi\Api\GcapiapiResponseCartProductInterface[]
     */
    public function items($quoteId = NULL);
}