<?php

class MasteringMagento_Example_Block_Adminhtml_Event extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
    	// used by _prepareLayout for _blockGroup,_controller, grid. therefore master_example/adminhtml_event/grid
    	$this->_blockGroup = 'master_example';
    	$this->_controller = 'adminhtml_event';

    	// used by getHeaderHtml
    	$this->_headerText = Mage::helper('master_example')->__('Events');
    	$this->_addButtonLabel = Mage::helper('master_example')->__('Add New Event');

        parent::__construct();
    }
}