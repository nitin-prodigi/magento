<?php

class MasteringMagento_Example_Model_Event extends Mage_Core_Model_Abstract
{
    // double underscore
	public function __construct()
	{
		$this->_init('master_example/event');
		parent::_construct();  // single underscore
	}
}