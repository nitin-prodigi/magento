<?php

$installer = $this;
$installer->startSetup();

$tableName = $installer->getTable('master_example/event');

if($installer->getConnection()->isTableExists($tableName) != true){
	$table = $installer->getConnection()
		->newTable($tableName)
		->addColumn('event_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
			'identity' => true,
			'unsigned' => true,
			'nullable' => false,
			'primary' => true
		), 'Event Id')
		->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
		), 'Name')
		->addColumn('start', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		), 'Start Date')
		->addColumn('end', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		), 'End Date')
		->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		), 'Created Date')
		->addColumn('modified_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		), 'Modified Date');

	$installer->getConnection()->createTable($table);
}

$installer->endSetup();