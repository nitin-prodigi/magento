<?php

/*
based on parameters given by MasteringMagento_Example_Block_Adminhtml_Event_Edit
*/
class MasteringMagento_Example_Block_Adminhtml_Event_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
	protected function _initFormValues()
    {
    	// existing event
    	if($event = Mage::registry('current_event')){
    		$data = $event->getData();
    		$this->getForm()->setValues($data);
    	}

    	// persisting post data
    	if($data = Mage::getSingleton('adminhtml/session')->getData('event_form_data', true)){		// true clears the value from session
    		$this->getForm()->setValues($data);
    	}

        return $this;
    }

	public function _prepareForm()
	{
		$form = new Varien_Data_Form(
			array(
				'id' => 'edit_form',
				'action' => $this->getData('action'), 	// calls getSaveUrl from edit
				'method' => 'post'
			)
		);

		$fieldset = $form->addFieldset('base_fieldset', array(
			'legend' => Mage::helper('master_example')->__('General Information'),
			'class' => 'fieldset-wide'
		));

		// here(Varien_Data_Form_Abstract) second param text will load Varien_Data_Form_Element_Text
		$fieldset->addField('name' ,'text', array(
			'name' => 'name',
			'label' => Mage::helper('master_example')->__('Event Name'),
			'title' => Mage::helper('master_example')->__('Event Name'),
			'required' => true
		));

		$dateFormatIso = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
		$fieldset->addField('start', 'date', array(
			'name' => 'start',
			'format' => $dateFormatIso,
			'image' => $this->getSkinUrl('images/grid-cal.gif'),
			'label' => Mage::helper('master_example')->__('Start Date'),
			'title' => Mage::helper('master_example')->__('Start Date'),
			'required' => true
		));

		$fieldset->addField('end', 'date', array(
			'name' => 'end',
			'format' => $dateFormatIso,
			'image' => $this->getSkinUrl('images/grid-cal.gif'),
			'label' => Mage::helper('master_example')->__('End Date'),
			'title' => Mage::helper('master_example')->__('End Date'),
			'required' => true
		));

		$form->setUseContainer(true);
		$this->setForm($form);
	}

}