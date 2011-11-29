<?php
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');

class SwapLocalModelSwaps extends JModelList
{
    protected function getListQuery() 
    {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        
        $query->select('*');
        
        $query->from('#__swaplocal_swaps');
        return $query;
    }
}
