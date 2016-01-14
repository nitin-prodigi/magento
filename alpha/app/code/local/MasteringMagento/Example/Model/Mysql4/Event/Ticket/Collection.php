<?php

class MasteringMagento_Example_Model_Mysql4_Event_Ticket_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	// single underscore
	public function _construct()
	{
		$this->_init('master_example/event_ticket');

		// single underscore
		parent::_construct();
	}
}