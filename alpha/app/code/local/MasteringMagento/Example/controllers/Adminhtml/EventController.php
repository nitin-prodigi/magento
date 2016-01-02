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
				Mage::getSingleton('adminhtml/session')->setEventFormData($data); // persist the values
				$this->_redirect('*/*/edit', array('_current' => true));
			}
		}

		$this->_redirect('*/*/index');	
	}

	// pointed by Add new event
	public function newAction()
	{
		$this->_forward('edit');
	}

	public function editAction()
	{
		if($eventId = $this->getRequest()->getParam('event_id')){
			Mage::register('current_event', Mage::getModel('master_example/event')->load($eventId));
		}

		$this->loadLayout();
		$this->_setActiveMenu('master_example/event');

		$this->_addContent(
			$this->getLayout()->createBlock('master_example/adminhtml_event_edit')
		);

		return $this->renderLayout();
	}

	// Mage_Adminhtml_Block_Widget_Form_Container@getDeleteUrl calls delete action
	public function deleteAction()
	{
		if($eventId = $this->getRequest()->getParam('event_id')){
			$eventModel = Mage::getModel('master_example/event')->load($eventId);

			try{
				$eventModel->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess($this->__("your event has been deleted"));			
			} catch(Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('_current' => true));
			}
		}
		$this->_redirect('*/*/index');
	}

	// called by _prepareMassaction of grid
	public function massDeleteAction()
	{
		if($eventIds = $this->getRequest()->getParam('event_ids')){
			try{
				foreach ($eventIds as $eventId) {
					$eventModel = Mage::getModel('master_example/event')->load($eventId);
					$eventModel->delete();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess($this->__("your events(%d) have been deleted", count($eventIds)));
			} catch(Exception $e){
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		} else{
			Mage::getSingleton('adminhtml/session')->addError('select some events');
		}
		$this->_redirect('*/*/index');
	}

	// export actions
	public function exportCsvAction()
	{
		$fileName   = 'event.csv';
		$grid       = $this->getLayout()->createBlock('master_example/adminhtml_event_grid');
		$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
	}

	public function exportXmlAction()
	{
		$fileName   = 'event.xls';
		$content    = $this->getLayout()->createBlock('master_example/adminhtml_event_grid')->getExcelFile();
		$this->_prepareDownloadResponse($fileName, $content);
	}
}