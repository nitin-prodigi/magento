<?php

class MasteringMagento_Example_Block_Adminhtml_Catalog_Product_Edit_Tab_Event extends Mage_Adminhtml_Block_Widget implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
	/*
	* constructor
	*/
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('example/product/edit/event.phtml');
	}

// overriding interface

	/*
	* get tab label
	*/
	public function getTabLabel()
	{
		return Mage::helper('master_example')->__('Event Information');
	}

    /**
     * Return Tab title
     */
    public function getTabTitle()
    {
    	return Mage::helper('master_example')->__('Tab Title');
    }

    /**
     * Can show tab in tabs
     */
    public function canShowTab()
    {
    	return true;
    }

    /**
     * Tab is hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
    	return false;
    }

// Event methods
	/*
	* retrieve product
	*/
	public function getProduct()
	{
		return Mage::registry('current_product');
	}   

	/* Retrieve add button label*/ 
	public function getAddButtonLabel()
	{
		$addButton = $this->getLayout()->createBlock('adminhtml/widget_button')
						->setData(array(
							'label' => Mage::helper('master_example')->__('Add new ticket'),
							'id' => 'add_ticket_item',
							'class' => 'add'
						));
		return $addButton->toHtml();
	}

	/* return array of ticket */
    public function getTicketData()
    {
        $ticketArr = array();
        // $tickets = $this->getProduct()->getTypeInstance(true)->getTickets($this->getProduct());
        // foreach ($tickets as $ticket) {
        //     $tmpTicketItem = array(
        //         'ticket_id' => $ticket->getId(),
        //         'title' => $this->escapeHtml($ticket->getTitle()),
        //         'price' => $this->getPriceValue($ticket->getPrice()),
        //         'sort_order' => $ticket->getSortOrder(),
        //     );
        //     $ticketArr[] = new Varien_Object($tmpTicketItem);
        // }
        return $ticketArr;
    }

	/*return formatted price */
	public function getPriceValue($value)
	{
		return number_format($value, 2, null, '');
	}

}