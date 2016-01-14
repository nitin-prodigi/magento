<?php

class MasteringMagento_Example_Model_Product_Attribute_Source_Event extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
	// from Mage_Eav_Model_Entity_Attribute_Source_Interface
	public function getAllOptions()
	{
		$collection = Mage::getModel('master_example/event')->getCollection();
		$options = array();

		foreach($collection as $event){
			$options[] = array(
				'value' => $event->getId(),
				'label' => $event->getName()
			);
		}

		return $options;
	}
}