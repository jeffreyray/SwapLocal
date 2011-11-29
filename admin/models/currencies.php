<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class SwapLocalModelCurrencies extends JModelList
{
    protected function getListQuery() 
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        
        $query->select('*');
        
        $query->from('#__swaplocal_currencies');
        return $query;
    }
}
