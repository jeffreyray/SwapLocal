<?php
defined('_JEXEC') or die;

jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldSeries extends JFormFieldList
{
	protected $type = 'Series';

	protected function getOptions($id=undef) 
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);;
		$query->select('id,series');
		$query->from('#__swaplocal_currencies');
		$query->where('id = 1');
		$db->setQuery((string)$query);
		
		$string = $db->loadObject();
		$values = preg_split("/\n/", $string->series );
		
		$options = array();
		if ($values)
		{
			foreach($values as $value) 
			{
				$options[] = JHtml::_('select.option', $value, $value );
			}
		}
		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
