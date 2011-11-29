<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modeladmin');

class SwapLocalModelBill extends JModelAdmin
{
    protected function allowEdit($data = array(), $key = 'id')
    {
            return JFactory::getUser()->authorise('core.edit', 'com_swaplocal.bill.'.((int) isset($data[$key]) ? $data[$key] : 0)) or parent::allowEdit($data, $key);
    }

    public function getTable($type = 'Bill', $prefix = 'SwapLocalTable', $config = array()) 
    {
            return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true) 
    {
        
        
            // Get the form.
            JForm::addFieldPath(JPATH_COMPONENT . DS . 'models' . DS . 'fields');
            $form = $this->loadForm('com_swaplocal.bill', 'bill', array('control' => 'jform', 'load_data' => $loadData));
            
            if (empty($form)) 
            {
                    return false;
            }
            return $form;
    }

    public function getScript() 
    {
            return 'administrator/components/com_swaplocal/models/forms/bill.js';
    }
    
    protected function loadFormData() 
    {
            // Check the session for previously entered form data.
            $data = JFactory::getApplication()->getUserState('com_swaplocal.edit.bill.data', array());
            if (empty($data)) 
            {
                    $data = $this->getItem();
            }
            return $data;
    }
}
