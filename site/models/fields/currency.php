<?php

defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldCurrency extends JFormFieldList
{
	protected $type = 'Currency';

	protected function getOptions() 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);;
		$query->select('id, name');
		$query->from('#__swaplocal_currencies');
		$db->setQuery((string)$query);
		
		$items = $db->loadObjectList();
		$options = array();
		if (items)
		{
			foreach($items as $item) 
			{
				$options[] = JHtml::_('select.option', $item->id, $item->name );
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		
		return $options;
	}
}
