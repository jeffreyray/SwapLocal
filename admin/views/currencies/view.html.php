<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class SwapLocalViewCurrencies extends JView
{

	function display($tpl = null) 
	{
		// Get data from the model
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign data to the view
		$this->items = $items;
		$this->pagination = $pagination;

		// Set the toolbar
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		$this->setDocument();
	}

	/**
	 * Setting the toolbar
	 */
	protected function addToolBar() 
	{
		$canDo = SwapLocalHelper::getActions();
		JToolBarHelper::title(JText::_('COM_SWAPLOCAL_MANAGER_CURRENCIES'), 'swaplocal');
		if ($canDo->get('core.create')) 
		{
			JToolBarHelper::addNew('currency.add', 'JTOOLBAR_NEW');
		}
		if ($canDo->get('core.edit')) 
		{
			JToolBarHelper::editList('currency.edit', 'JTOOLBAR_EDIT');
		}
		if ($canDo->get('core.delete')) 
		{
			JToolBarHelper::deleteList('', 'currency.delete', 'JTOOLBAR_DELETE');
		}
		if ($canDo->get('core.admin')) 
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_swaplocal');
		}
	}
	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_SWAPLOCAL_ADMINISTRATION'));
	}
}
