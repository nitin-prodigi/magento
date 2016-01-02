<?php

class MasteringMagento_Example_Model_Mysql4_Event extends Mage_Core_Model_Mysql4_Abstract
{
	// single underscore
	public function _construct()
	{
		$this->_init('master_example/event', 'event_id');
	}
}