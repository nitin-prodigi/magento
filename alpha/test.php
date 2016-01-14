<?php

ini_set("display_errors", 1);
require_once 'app/Mage.php';
Mage::init();

$collection = Mage::getModel('master_example/event_ticket')->getCollection();
foreach($collection as $coll){
	exit('yolo');
}
echo 'hs';