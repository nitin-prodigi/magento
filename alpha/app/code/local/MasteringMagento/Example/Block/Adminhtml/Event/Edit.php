<?php

/*
	Mage_Adminhtml_Block_Widget_Form_Container is used for creating forms
*/

class MasteringMagento_Example_Block_Adminhtml_Event_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	/*
		_objectId would be used for database object via event_id, also as there is _objectId, a delete button gets added
		_prepareLayout of parent class uses _blockGroup, _controller and _mode to create path to block that gets loaded, hence master_example/adminhtml_event/edit/ form
	*/
	public function __construct()
	{
		$this->_objectId = 'event_id';
		$this->_blockGroup = 'master_example';
		$this->_controller = 'adminhtml_event';

		parent::__construct();
	}

	public function getHeaderText()
	{
		return Mage::helper('master_example')->__('New Event');
	}

	/* submit url to form action */
	public function getSaveUrl()
	{
		return $this->getUrl('*/event/save', array('_current' => true)); 		// preserve current event id
	}

}