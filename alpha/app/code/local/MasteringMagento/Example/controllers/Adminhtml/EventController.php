<?php

class MasteringMagento_Example_Adminhtml_EventController extends Mage_Adminhtml_Controller_Action
{
	// display the form
	public function indexAction()
	{
		$this->loadLayout();
		$this->_setActiveMenu('master_example/event');

		$this->_addContent(
			$this->getLayout()->createBlock('master_example/adminhtml_event')
		);

		return $this->renderLayout();
	}

	// pointed by Add new event
	public function newAction()
	{
		$this->loadLayout();
		$this->_setActiveMenu('master_example/event');

		$this->_addContent(
			$this->getLayout()->createBlock('master_example/adminhtml_event_edit')
		);

		return $this->renderLayout();
	}

	// submit section of form
	public function saveAction()
	{
		$eventId = $this->getRequest()->getParam('event_id');
		$eventModel = Mage::getModel('master_example/event')->load($eventId);

		if($data = $this->getRequest()->getPost()){
			try{
				$eventModel->addData($data)
					->save();

				Mage::getSingleton('adminhtml/session')->addSuccess($this->__("your event has been saved"));
			} catch (Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}

		$this->_redirect('*/*/index');	
	}
}