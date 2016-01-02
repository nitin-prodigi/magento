<?php

class MasteringMagento_Example_Block_Adminhtml_Event_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('master_example/event')->getCollection();

        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('name', array(
            'type' => 'text',
            'index' => 'name',
            'header' => $this->__('Name')
        ));

        $this->addColumn('start', array(
            'type' => 'date',
            'index' => 'start',
            'header' => $this->__('Start Date')
        ));

        $this->addColumn('end', array(
            'type' => 'date',
            'index' => 'end',
            'header' => $this->__('End Date')
        ));

        /* ading export functionality
        * addExportType in Mage_Adminhtml_Block_Widget_Grid expects url and label
        * app\design\adminhtml\default\default\template\widget\grid.phtml defines how it will render
        */
        $this->addExportType('*/*/exportCsv', Mage::helper('master_example')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('master_example')->__('Excel XML'));
        return parent::_prepareColumns();
    }

    // row url is passed current row
    public function getRowUrl($item)
    {
        return $this->getUrl('*/event/edit', array(
            'event_id' => $item->getId()
        ));
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('event_id');
        $this->getMassactionBlock()->setFormFieldName('event_ids');  // from Mage_Adminhtml_Block_Widget_Grid_Massaction_Abstract

        // to the mass action block for condition
        $this->getMassactionBlock()->addItem('delete_event', array(
            'label' => Mage::helper('master_example')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('catalog')->__('Are you sure?')
        ));        

        return $this; // because parent returns this
    }
}