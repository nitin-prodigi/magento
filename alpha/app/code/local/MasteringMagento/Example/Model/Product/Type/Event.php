<?php

class MasteringMagento_Example_Model_Product_Type_Event extends Mage_Catalog_Model_Product_Type_Abstract
{
	public function getTickets($product = null)
    {
        $collection = Mage::getModel("master_example/event_ticket")->getCollection()
            ->addFieldToFilter('event_id', $product->getEventId())
            ->addFieldToFilter('product_id', $product->getId())
            ->setOrder('sort_order', 'asc');

        return $collection;
    }
}