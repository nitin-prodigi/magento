<?php

class MasteringMagento_Example_Model_Mysql4_Event_Ticket extends Mage_Core_Model_Mysql4_Abstract
{
	// single underscore
	public function _construct()
	{
		$this->_init('master_example/event_ticket', 'ticket_id');
	}
}