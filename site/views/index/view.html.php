<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class SwapLocalViewIndex extends JView
{
	// Overwriting JView display method
	function display($tpl = null) 
	{
		// Assign data to the view
		//$this->item = $this->get('Item');
		//
		//// Check for errors.
		//if (count($errors = $this->get('Errors'))) 
		//{
		//	JError::raiseError(500, implode('<br />', $errors));
		//	return false;
		//}
		// Display the view
		parent::display($tpl);
	}
}
