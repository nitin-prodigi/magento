<?php

class MasteringMagento_Example_Model_Observer
{
	public function controllerActionPredispatch($observer)
	{
		/* $observer is object of Mage_Core_Model_Observer class */
		$act = $observer->getEvent()->getControllerAction();

		//print_R($act->getRequest()->getParams());
		//exit('hi');
	}
}