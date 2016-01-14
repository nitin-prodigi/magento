<?php

/*Mage_core_Model_Resource_Setup*/
$installer = $this;
$installer->startSetup();

$tableName = $installer->getTable('master_example/event_ticket');

if($installer->getConnection()->isTableExists($tableName) != true){
	$table = $installer->getConnection()
		->newTable($tableName)
		->addColumn('ticket_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
			'identity' => true,
			'unsigned' => true,
			'nullable' => false,
			'primary' => true
		), 'Ticket Id')
		->addColumn('event_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
			'unsigned' => true
		), 'Event Id')
		->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
			'unsigned' => true
		), 'Product Id')
		->addColumn('title', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
		), 'Event Title')
		->addColumn('price', Varien_Db_Ddl_Table::TYPE_DECIMAL, '12,4', array(
        	'nullable'  => false,
        ), 'Price')
		->addColumn('sort_order', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
			'default'   => '0',
			'unsigned'  => true
		), 'Sort Order')
		->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		), 'Created Date')
		->addColumn('modified_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		), 'Modified Date');

	$installer->getConnection()->createTable($table);
}

$installer->endSetup();