<?php

class MasteringMagento_Example_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		$this->loadLayout();	// loads the layout

		return $this->renderLayout();	// tell magento to render layout
	}
}