<?php

class MasteringMagento_Example_HelloController extends Mage_Core_Controller_Front_Action
{
	public function worldAction()
	{
		$this->loadLayout();	// loads the layout

		return $this->renderLayout();	// tell magento to render layout
	}
}