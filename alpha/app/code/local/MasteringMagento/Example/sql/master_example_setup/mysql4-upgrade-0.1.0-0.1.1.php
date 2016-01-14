<?php

/*Mage_core_Model_Resource_Setup*/
$this->startSetup();

// catalog resource model has all EAV related functions
$catalogInstaller = new Mage_Catalog_Model_Resource_Setup($this->_resourceName);

$this->run(" Update `{$catalogInstaller->getTable('catalog/eav_attribute')}` 
	SET apply_to = CONCAT_WS(',', apply_to, 'event')
    WHERE `apply_to` LIKE '%simple%' AND `apply_to` NOT LIKE '%event';
");

// adding attributes
// add title for event
$catalogInstaller->addAttribute('catalog_product', 'event_title', array(
	'label' => 'Event Title',
	'required' => TRUE,
	'group' => 'Event Settings',
	'apply_to' => 'event' 	// for event product only
));

// add a select list for the event
$catalogInstaller->addAttribute('catalog_product', 'event_id', array(
	'label' => 'Event ID',
	'required' => TRUE,
	'group' => 'Event Settings',
	'input' => 'select',
	'source' => 'master_example/product_attribute_source_event',
	'apply_to' => 'event',
	'note' => 'Select your event from list'
));