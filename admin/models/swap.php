<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modeladmin');

class SwapLocalModelSwap extends JModelAdmin
{
    protected function allowEdit($data = array(), $key = 'id')
    {
        return JFactory::getUser()->authorise('core.edit', 'com_swaplocal.swap.'.((int) isset($data[$key]) ? $data[$key] : 0)) or parent::allowEdit($data, $key);
    }

    public function getTable($type = 'Swap', $prefix = 'SwapLocalTable', $config = array()) 
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    public function getForm($data = array(), $loadData = true) 
    {
        $form = $this->loadForm('com_swaplocal.swap', 'swap', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form)) 
        {
                return false;
        }
        return $form;
    }

    public function getScript() 
    {
        return 'administrator/components/com_swaplocal/models/forms/swap.js';
    }

    protected function loadFormData() 
    {
        $data = JFactory::getApplication()->getUserState('com_swaplocal.edit.swap.data', array());
        if (empty($data)) 
        {
                $data = $this->getItem();
        }
        return $data;
    }
}
